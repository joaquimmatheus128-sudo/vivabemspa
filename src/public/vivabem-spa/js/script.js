$('.galeriaimg').slick({
  slidesToShow: 5,
  slidesToScroll: 1,
  autoplay: true,
  autoplaySpeed: 2000,
  responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 4
      }
    },
    {
      breakpoint: 769,
      settings: {
        slidesToShow: 2
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 1
      }
    }
  ]
});

$('.carrossel-serv').slick({
  slidesToShow: 5,
  slidesToScroll: 1,
  autoplay: true,
  autoplaySpeed: 2000,
  responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 4
      }
    },
    {
      breakpoint: 769,
      settings: {
        slidesToShow: 2
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 1
      }
    }
  ]
});

$('.slideDepoimentos').slick({
  slidesToShow: 3,
  slidesToScroll: 1,
  autoplay: true,
  autoplaySpeed: 3500,
  responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 2
      }
    },
    {
      breakpoint: 768,
      settings: {
        slidesToShow: 1
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 1
      }
    }
  ]
});

if ($('.carrossel-eventos').length && !$('.carrossel-eventos').hasClass('slick-initialized')) {
  $('.carrossel-eventos').slick({
    slidesToShow: 3,
    slidesToScroll: 1,
    autoplay: true,
    autoplaySpeed: 3200,
    responsive: [
      {
        breakpoint: 1024,
        settings: {
          slidesToShow: 2
        }
      },
      {
        breakpoint: 768,
        settings: {
          slidesToShow: 1
        }
      },
      {
        breakpoint: 480,
        settings: {
          slidesToShow: 1
        }
      }
    ]
  });
}

new WOW().init();

var abrirMenu = document.querySelector('.abrir-menu');
var fecharMenu = document.querySelector('.fechar-menu');
var linksMenu = document.querySelectorAll('.menu a');

function fecharMenuMobile() {
  document.body.classList.remove('menu-mobile');
}

if (abrirMenu && fecharMenu) {
  abrirMenu.addEventListener('click', function () {
    document.body.classList.add('menu-mobile');
  });

  fecharMenu.addEventListener('click', fecharMenuMobile);

  linksMenu.forEach(function (link) {
    link.addEventListener('click', fecharMenuMobile);
  });

  document.addEventListener('keydown', function (event) {
    if (event.key === 'Escape') {
      fecharMenuMobile();
    }
  });
}

function rolarParaDepoimentos() {
  var alvo = document.getElementById('depoimentos');

  if (!alvo) {
    return;
  }

  var topoFixo = document.getElementById('topoFixo');
  var offset = topoFixo ? topoFixo.offsetHeight + 24 : 24;
  var posicao = alvo.getBoundingClientRect().top + window.pageYOffset - offset;

  window.scrollTo({
    top: posicao,
    behavior: 'smooth'
  });
}

document.querySelectorAll('[data-scroll-target="depoimentos"]').forEach(function (link) {
  link.addEventListener('click', function (event) {
    var caminhoAtual = window.location.pathname.split('/').pop() || 'index.php';

    if (caminhoAtual === 'index.php') {
      event.preventDefault();
      rolarParaDepoimentos();
      window.history.replaceState(null, '', '#depoimentos');
      return;
    }

    sessionStorage.setItem('rolarParaDepoimentos', 'true');
  });
});

document.querySelectorAll('[data-telefone]').forEach(function (campo) {
  campo.addEventListener('input', function () {
    campo.value = campo.value.replace(/[^0-9()+\-\s]/g, '');
  });
});

var formCadastro = document.querySelector('.cadastro-form');
var senhaCadastro = document.getElementById('senha-cadastro');
var confirmarSenha = document.getElementById('confirmar-senha');

function validarConfirmacaoSenha() {
  if (!senhaCadastro || !confirmarSenha) {
    return;
  }

  if (confirmarSenha.value && senhaCadastro.value !== confirmarSenha.value) {
    confirmarSenha.setCustomValidity('As senhas precisam ser iguais.');
  } else {
    confirmarSenha.setCustomValidity('');
  }
}

if (senhaCadastro && confirmarSenha) {
  senhaCadastro.addEventListener('input', validarConfirmacaoSenha);
  confirmarSenha.addEventListener('input', validarConfirmacaoSenha);
}

if (formCadastro) {
  formCadastro.addEventListener('submit', function (event) {
    validarConfirmacaoSenha();

    if (!formCadastro.checkValidity()) {
      event.preventDefault();
      formCadastro.reportValidity();
    }
  });
}

window.addEventListener('load', function () {
  if (sessionStorage.getItem('rolarParaDepoimentos') === 'true') {
    sessionStorage.removeItem('rolarParaDepoimentos');
    setTimeout(function () {
      rolarParaDepoimentos();
      window.history.replaceState(null, '', '#depoimentos');
    }, 180);
  } else if (window.location.hash === '#depoimentos') {
    setTimeout(rolarParaDepoimentos, 180);
  }
});

window.onscroll = function () {
  var top = window.scrollY;
  var topoFixo = document.getElementById('topoFixo');

  if (!topoFixo) {
    return;
  }

  if (window.innerWidth <= 768) {
    topoFixo.classList.remove('menu-fixo', 'saindo');
    return;
  }

  if (top >= 1100) {
    topoFixo.classList.remove('saindo');
    topoFixo.classList.add('menu-fixo');
  } else if (topoFixo.classList.contains('menu-fixo') && !topoFixo.classList.contains('saindo')) {
    topoFixo.classList.add('saindo');
    topoFixo.addEventListener('animationend', function onMenuFixoOut(e) {
      if (e.animationName === 'menuFixoOut') {
        topoFixo.classList.remove('menu-fixo', 'saindo');
        topoFixo.removeEventListener('animationend', onMenuFixoOut);
      }
    });
  }
};

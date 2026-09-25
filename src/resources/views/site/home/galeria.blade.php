<section class="galeria wow animate__animated animate__fadeInUp">
    <header class="wow animate__animated animate__fadeInUp">
        <h2>Galeria</h2>
    </header>

    <div class="site galeriaimg wow animate__animated animate__fadeInUp" data-wow-delay="0.1s">
        @foreach ($listaGaleria as $galeriaimg)
            <div>
                <img src="{{ asset('vivabem-spa/assets/' . $galeriaimg->imagem_galeria) }}" alt="{{ $galeriaimg->nome_galeria }}">
            </div>
        @endforeach
    </div>
</section>
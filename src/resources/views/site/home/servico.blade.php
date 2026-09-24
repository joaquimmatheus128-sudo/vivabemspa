<section class="servico site wow animate__animated animate__fadeInUp">
    <header>
         <h2>Serviços</h2>
    </header>

    <div class="site carrossel-serv wow animate__animated animate__fadeInUp">
        @foreach ($listaServico as $servicoItem)
            <article>
                <a class="servico-card-link" 
                   href="{{ route('servico.show', $servicoItem->id_servico) }}" 
                   aria-label="Abrir serviço {{ $servicoItem->nome_servico }}">
                    
                    <img src="{{ asset('vivabem-spa/assets/' . $servicoItem->imagem_servico) }}" 
                         alt="{{ $servicoItem->nome_servico }}">
                    
                    <span class="servico-card-titulo">
                        {{ $servicoItem->nome_servico }}
                    </span>
                </a>
            </article>
        @endforeach
    </div>
</section>
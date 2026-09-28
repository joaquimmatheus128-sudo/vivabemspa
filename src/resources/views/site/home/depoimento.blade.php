<section class="depoimentos wow animate__animated animate__fadeInUp">
    <header id="depoimentos" class="wow animate__animated animate__fadeInUp">
        <h2>Depoimentos</h2>
    </header>

    <div class="site slideDepoimentos wow animate__animated animate__fadeInUp" data-wow-delay="0.1s">
        @forelse ($depoimentos as $depoimento)
            <article>
                <h4 aria-label="Nota {{ number_format($depoimento->nota_depoimento, 1, ',', '.') }} de 10">
                    {{ str_repeat('★', (int) round($depoimento->nota_depoimento / 2)) }}{{ str_repeat('☆', 5 - (int) round($depoimento->nota_depoimento / 2)) }}
                </h4>
                <h5>“{{ $depoimento->titulo_depoimento }}”</h5>
                <p>{{ $depoimento->descricao_depoimento }}</p>
                <div class="depoimento-conteudo">
                    <h6>{{ $depoimento->nome_cliente ?: 'Cliente' }}</h6>
                </div>
            </article>
        @empty
            <article>
                <p>Ainda não há depoimentos publicados.</p>
            </article>
        @endforelse
    </div>
</section>

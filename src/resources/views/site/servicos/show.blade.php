@extends('layout.site')

@section('content')
<main>
    <section class="pagina-servico-detalhe">
        <div class="site servico-detalhe-grid">
            <div class="servico-detalhe-imagem">
                <img src="{{ asset('vivabem-spa/assets/' . $servicoAtual->imagem_servico) }}" 
     alt="{{ $servicoAtual->nome_servico }}">
            </div>

            <article class="servico-detalhe-conteudo">
                <span class="servico-detalhe-kicker">VivaBem Spa</span>
                <h2>{{ $servicoAtual->nome_servico }}</h2>
                <p>{{ $servicoAtual->descricao_servico }}</p>

                @if(!empty($servicoAtual->indicacoes_servico))
                    <div class="servico-detalhe-lista">
                        <h3>Indicada para:</h3>
                        <ul>
                            @foreach ($servicoAtual->indicacoes_servico as $indicacao)
                                <li>{{ $indicacao }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="servico-detalhe-acoes">
                    <a href="{{ route('contato') }}" class="servico-detalhe-botao">Agendar atendimento</a>
                    <a href="{{ route('servico') }}" class="servico-detalhe-botao servico-detalhe-botao-secundario">Ver todos os serviços</a>
                </div>
            </article>
        </div>
    </section>
</main>
@endsection
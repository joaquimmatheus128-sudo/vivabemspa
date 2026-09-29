<section class="eventos wow animate__animated animate__fadeInUp">
            <header class="wow animate__animated animate__fadeInUp">
                <h2>Eventos</h2>
            </header>
 
            <div class="site carrossel-eventos">
             @foreach ($listaEventos as $eventos) 
                
                <article>
                    <img src="{{ asset('assets/' . $eventos->imagem_evento) }}" alt="{{ $eventos->nome_evento }}">
                    <h4>{{ $eventos->nome_evento}}</h4>
                    <p>{{ $eventos->descricao_evento}}</p>
                    <h6>{{$eventos->data_evento}}</h6>
                </article>
             @endforeach

            </div>
        </section>

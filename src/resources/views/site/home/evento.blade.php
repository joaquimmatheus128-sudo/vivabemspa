<section class="eventos wow animate__animated animate__fadeInUp">
  <header class="wow animate__animated animate__fadeInUp"><h2>Eventos</h2></header>
  <div class="site carrossel-eventos">
    @forelse($eventos as $evento)
      <article>
        <img src="{{ asset('vivabem-spa/assets/eventos/evento' . (($loop->index % 4) + 1) . '.png') }}" alt="{{ $evento->nome_evento }}">
        <h4>{{ $evento->nome_evento }}</h4>
        <p>{{ $evento->descricao_evento }}</p>
        <h6>{{ \Illuminate\Support\Carbon::parse($evento->data_evento)->format('d/m') }} às {{ substr($evento->horario_evento, 0, 5) }}</h6>
      </article>
    @empty
      <p class="text-center">Ainda não há eventos disponíveis.</p>
    @endforelse
  </div>
</section>

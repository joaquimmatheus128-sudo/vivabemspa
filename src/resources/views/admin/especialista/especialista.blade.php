@extends('layout.dashboard')

@section('content')
<main class="app-main">
  <div class="app-content-header">
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-6"><h1 class="mb-0 fs-3">Especialistas</h1></div>
        <div class="col-sm-6">
          <nav aria-label="breadcrumb"><ol class="breadcrumb float-sm-end">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Especialistas</li>
          </ol></nav>
        </div>
      </div>
    </div>
  </div>
  <div class="app-content">
    <div class="container-fluid">
      <div class="card mb-4">
        <div class="card-header">
          <div class="row g-2 align-items-center">
            <div class="col-12 col-md-4"><h3 class="card-title">Especialistas cadastrados</h3></div>
            <div class="col-12 col-md-8">
              <div class="d-flex flex-wrap justify-content-md-end gap-2">
                <div class="input-group input-group-sm w-auto">
                  <span class="input-group-text"><i class="bi bi-search" aria-hidden="true"></i></span>
                  <input type="search" id="especialista-search" class="form-control" placeholder="Pesquisar especialistas" aria-label="Pesquisar especialistas" style="width: 210px">
                </div>
                <select id="especialista-genero" class="form-select form-select-sm w-auto" aria-label="Filtrar por gênero">
                  <option value="all" selected>Todos os gêneros</option>
                  <option value="MASCULINO">Masculino</option><option value="FEMININO">Feminino</option><option value="OUTRO">Outro</option>
                </select>
              </div>
            </div>
          </div>
        </div>
        <div class="card-body p-0">
          <div class="table-responsive">
            <table class="table table-hover align-middle m-0">
              <thead><tr><th>Especialista</th><th>Gênero</th><th>Status</th><th>Cadastro</th><th>Última atualização</th><th class="text-end">Ações</th></tr></thead>
              <tbody>
                @forelse($especialistas as $especialista)
                  <tr data-genero="{{ $especialista->genero_especialista ?? '' }}">
                    <td><div class="d-flex align-items-center">
                      <span class="img-size-32 rounded-circle me-2 bg-primary text-white d-inline-flex align-items-center justify-content-center" aria-hidden="true">{{ mb_strtoupper(mb_substr($especialista->nome_especialista, 0, 1)) }}</span>
                      <span class="fw-medium">{{ $especialista->nome_especialista }}</span>
                    </div></td>
                    <td>{{ $especialista->genero_especialista ? ucfirst(mb_strtolower($especialista->genero_especialista)) : '—' }}</td>
                    <td>@php($status = $especialista->status_especialista ?? 'INATIVO')<span class="badge {{ $status === 'ATIVO' ? 'text-bg-success' : 'text-bg-secondary' }}">{{ ucfirst(mb_strtolower($status)) }}</span></td>
                    <td>{{ $especialista->data_criacao ? \Illuminate\Support\Carbon::parse($especialista->data_criacao)->format('d/m/Y') : '—' }}</td>
                    <td>{{ $especialista->data_atualizacao ? \Illuminate\Support\Carbon::parse($especialista->data_atualizacao)->format('d/m/Y') : '—' }}</td>
                    <td class="text-end"><div class="btn-group btn-group-sm">
                      <button type="button" class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#modal-edit-especialista" data-id="{{ $especialista->id_especialista }}" data-nome="{{ $especialista->nome_especialista }}" data-genero="{{ $especialista->genero_especialista }}" data-status="{{ $especialista->status_especialista }}" aria-label="Editar {{ $especialista->nome_especialista }}"><i class="bi bi-pencil" aria-hidden="true"></i></button>
                      <form class="d-inline m-0" method="POST" action="{{ route('admin.especialista.destroy', $especialista->id_especialista) }}" onsubmit="return confirm('Deseja remover este especialista? Esta ação não poderá ser desfeita.');">
                        @csrf @method('DELETE')
                        <button type="submit" class="btn btn-outline-danger rounded-start-0" aria-label="Remover {{ $especialista->nome_especialista }}"><i class="bi bi-trash" aria-hidden="true"></i></button>
                      </form>
                    </div></td>
                  </tr>
                @empty
                  <tr><td colspan="6" class="text-center py-4 text-body-secondary">Nenhum especialista cadastrado.</td></tr>
                @endforelse
              </tbody>
            </table>
          </div>
        </div>
        <div class="card-footer d-flex justify-content-between align-items-center gap-2">
          <div class="small text-body-secondary" id="especialistas-count">{{ $especialistas->count() }} especialistas</div>
          <ul class="pagination pagination-sm m-0" id="especialistas-pagination" aria-label="Paginação de especialistas"></ul>
        </div>
      </div>
      <div class="modal fade" id="modal-edit-especialista" tabindex="-1" aria-labelledby="modal-edit-especialista-label" aria-hidden="true">
        <div class="modal-dialog"><div class="modal-content">
          <form method="POST" id="form-edit-especialista" data-action-prefix="{{ url('/dashboard/especialistas') }}">
            @csrf @method('PUT')
            <div class="modal-header"><h5 class="modal-title" id="modal-edit-especialista-label">Editar especialista</h5><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button></div>
            <div class="modal-body">
              <div class="mb-3"><label for="edit-nome-especialista" class="form-label">Nome</label><input class="form-control" id="edit-nome-especialista" name="nome_especialista" maxlength="100" required></div>
              <div class="mb-3"><label for="edit-genero-especialista" class="form-label">Gênero</label><select class="form-select" id="edit-genero-especialista" name="genero_especialista"><option value="">Não informado</option><option value="FEMININO">Feminino</option><option value="MASCULINO">Masculino</option><option value="OUTRO">Outro</option></select></div>
              <div><label for="edit-status-especialista" class="form-label">Status</label><select class="form-select" id="edit-status-especialista" name="status_especialista" required><option value="ATIVO">Ativo</option><option value="INATIVO">Inativo</option></select></div>
            </div>
            <div class="modal-footer"><button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button><button type="submit" class="btn btn-primary">Salvar alterações</button></div>
          </form>
        </div></div>
      </div>
    </div>
  </div>
</main>
<script>
(() => {
  const search = document.getElementById('especialista-search');
  const genero = document.getElementById('especialista-genero');
  const rows = [...document.querySelectorAll('tbody tr[data-genero]')];
  const pager = document.getElementById('especialistas-pagination');
  const count = document.getElementById('especialistas-count');
  const editModal = document.getElementById('modal-edit-especialista');
  const editForm = document.getElementById('form-edit-especialista');
  editModal.addEventListener('show.bs.modal', event => {
    const button = event.relatedTarget;
    editForm.action = `${editForm.dataset.actionPrefix}/${button.dataset.id}`;
    document.getElementById('edit-nome-especialista').value = button.dataset.nome;
    document.getElementById('edit-genero-especialista').value = button.dataset.genero;
    document.getElementById('edit-status-especialista').value = button.dataset.status;
  });
  const pageSize = 10;
  let page = 1;
  function render() {
    const term = search.value.trim().toLocaleLowerCase('pt-BR');
    const filtered = rows.filter(row => row.textContent.toLocaleLowerCase('pt-BR').includes(term) && (genero.value === 'all' || row.dataset.genero === genero.value));
    const pages = Math.max(1, Math.ceil(filtered.length / pageSize));
    page = Math.min(page, pages);
    rows.forEach(row => row.hidden = true);
    filtered.slice((page - 1) * pageSize, page * pageSize).forEach(row => row.hidden = false);
    count.textContent = filtered.length ? `Exibindo ${(page - 1) * pageSize + 1}–${Math.min(page * pageSize, filtered.length)} de ${filtered.length} especialistas` : 'Nenhum especialista encontrado';
    pager.replaceChildren();
    for (let number = 1; number <= pages; number++) {
      const item = document.createElement('li'); item.className = `page-item${number === page ? ' active' : ''}`;
      const button = document.createElement('button'); button.type = 'button'; button.className = 'page-link'; button.textContent = number;
      button.addEventListener('click', () => { page = number; render(); }); item.append(button); pager.append(item);
    }
  }
  search.addEventListener('input', () => { page = 1; render(); });
  genero.addEventListener('change', () => { page = 1; render(); });
  render();
})();
</script>
@endsection

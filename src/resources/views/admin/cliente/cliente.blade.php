@extends('layout.dashboard')

@section('content')
      <!--begin::App Main-->
      <main class="app-main">
        <!--begin::App Content Header-->
        <div class="app-content-header">
          <!--begin::Container-->
          <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
              <div class="col-sm-6">
                <h1 class="mb-0 fs-3">Clientes</h1>
              </div>
              <div class="col-sm-6">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb float-sm-end">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Clientes</li>
                  </ol>
                </nav>
              </div>
            </div>
            <!--end::Row-->
          </div>
          <!--end::Container-->
        </div>
        <!--end::App Content Header-->
        <!--begin::App Content-->
        <div class="app-content">
          <!--begin::Container-->
          <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
              <div class="col-12">
                <!--begin::Card-->
                <div class="card mb-4">
                  <!--begin::Card Header-->
                  <div class="card-header">
                    <div class="row g-2 align-items-center">
                      <div class="col-12 col-md-4">
                        <h3 class="card-title">Clientes cadastrados</h3>
                      </div>
                      <div class="col-12 col-md-8">
                        <div class="d-flex flex-wrap justify-content-md-end gap-2">
                          <div class="input-group input-group-sm w-auto">
                            <span class="input-group-text">
                              <i class="bi bi-search" aria-hidden="true"></i>
                            </span>
                            <input
                              type="search"
                              id="cliente-search"
                              class="form-control"
                              placeholder="Pesquisar clientes"
                              aria-label="Pesquisar clientes"
                              style="width: 180px"
                            />
                          </div>
                          <select
                            id="cliente-gender-filter"
                            class="form-select form-select-sm w-auto"
                            aria-label="Filtrar por gênero"
                          >
                            <option value="all" selected>Todos os gêneros</option>
                            <option value="MASCULINO">Masculino</option>
                            <option value="FEMININO">Feminino</option>
                            <option value="OUTRO">Outro</option>
                          </select>
                          <button
                            type="button"
                            class="btn btn-sm btn-primary"
                            data-bs-toggle="modal"
                            data-bs-target="#modal-add-user"
                          >
                            <i class="bi bi-person-plus-fill me-1" aria-hidden="true"> </i>
                            Novo cliente
                          </button>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!--end::Card Header-->
                  <!--begin::Card Body-->
                  <div class="card-body p-0">
                    <div class="table-responsive">
                      <table class="table table-hover align-middle m-0">
                        <thead>
                          <tr>
                            <th>Cliente</th>
                            <th>E-mail</th>
                            <th>Gênero</th>
                            <th>Status</th>
                            <th>Cadastro</th>
                            <th>Condição de saúde</th>
                          </tr>
                        </thead>
                        <tbody>
                          @forelse($clientes as $cliente)
                            <tr data-gender="{{ $cliente->genero_cliente ?? '' }}">
                              <td>
                                <div class="d-flex align-items-center">
                                  <span class="img-size-32 rounded-circle me-2 bg-primary text-white d-inline-flex align-items-center justify-content-center" aria-hidden="true">{{ mb_strtoupper(mb_substr($cliente->nome_cliente, 0, 1)) }}</span>
                                  <span class="fw-medium">{{ $cliente->nome_cliente }}</span>
                                </div>
                              </td>
                              <td>{{ $cliente->email_cliente }}</td>
                              <td>{{ $cliente->genero_cliente ? ucfirst(mb_strtolower($cliente->genero_cliente)) : '—' }}</td>
                              <td>
                                @php($status = $cliente->status_cliente ?? 'INATIVO')
                                <span class="badge {{ $status === 'ATIVO' ? 'text-bg-success' : 'text-bg-secondary' }}">{{ ucfirst(mb_strtolower($status)) }}</span>
                              </td>
                              <td>{{ $cliente->data_criacao ? \Illuminate\Support\Carbon::parse($cliente->data_criacao)->format('d/m/Y') : '—' }}</td>
                              <td>{{ $cliente->condicao_saude ?: '—' }}</td>
                            </tr>
                          @empty
                            <tr><td colspan="6" class="text-center py-4 text-body-secondary">Nenhum cliente cadastrado.</td></tr>
                          @endforelse
                        </tbody>
                      </table>
                    </div>
                    <!-- /.table-responsive -->
                  </div>
                  <!--end::Card Body-->
                  <!--begin::Card Footer-->
                  <div class="card-footer d-flex flex-wrap justify-content-between align-items-center gap-2">
                    <div class="small text-body-secondary" id="clientes-count">{{ $clientes->count() }} clientes</div>
                    <ul class="pagination pagination-sm m-0" id="clientes-pagination" aria-label="Paginação de clientes"></ul>
                  </div>
                  <!--end::Card Footer-->
                </div>
                <!--end::Card-->
              </div>
              <!-- /.col -->
            </div>
            <!--end::Row-->

            <!--begin::Add User Modal-->
            <div
              class="modal fade"
              id="modal-add-user"
              tabindex="-1"
              aria-labelledby="modal-add-user-label"
              aria-hidden="true"
            >
              <div class="modal-dialog">
                <div class="modal-content">
                  <form>
                    <div class="modal-header">
                      <h5 class="modal-title" id="modal-add-user-label">Add new user</h5>
                      <button
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="modal"
                        aria-label="Close"
                      ></button>
                    </div>
                    <div class="modal-body">
                      <div class="mb-3">
                        <label for="new-user-name" class="form-label"> Full name </label>
                        <input
                          type="text"
                          class="form-control"
                          id="new-user-name"
                          placeholder="e.g. Jane Doe"
                          required
                        />
                      </div>
                      <div class="mb-3">
                        <label for="new-user-email" class="form-label"> Email address </label>
                        <input
                          type="email"
                          class="form-control"
                          id="new-user-email"
                          placeholder="name@example.com"
                          required
                        />
                        <div class="form-text">The invitation will be sent to this address.</div>
                      </div>
                      <div class="mb-3">
                        <label for="new-user-role" class="form-label"> Role </label>
                        <select id="new-user-role" class="form-select">
                          <option selected>Subscriber</option>
                          <option>Author</option>
                          <option>Editor</option>
                          <option>Administrator</option>
                        </select>
                      </div>
                      <div class="form-check">
                        <input
                          class="form-check-input"
                          type="checkbox"
                          id="new-user-welcome"
                          checked
                        />
                        <label class="form-check-label" for="new-user-welcome">
                          Send a welcome email with login details
                        </label>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        Cancel
                      </button>
                      <button type="submit" class="btn btn-primary">Create user</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <!--end::Add User Modal-->

            <!--begin::Delete User Modal-->
            <div
              class="modal fade"
              id="modal-delete-user"
              tabindex="-1"
              aria-labelledby="modal-delete-user-label"
              aria-hidden="true"
            >
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="modal-delete-user-label">Delete user</h5>
                    <button
                      type="button"
                      class="btn-close"
                      data-bs-dismiss="modal"
                      aria-label="Close"
                    ></button>
                  </div>
                  <div class="modal-body">
                    <p class="mb-0">
                      Are you sure you want to delete this user? All content owned by the account
                      will be reassigned to the site administrator. This action cannot be undone.
                    </p>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                      Cancel
                    </button>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">
                      Delete user
                    </button>
                  </div>
                </div>
              </div>
            </div>
            <!--end::Delete User Modal-->
          </div>
          <!--end::Container-->
        </div>
        <!--end::App Content-->
      </main>
      <!--end::App Main-->

<script>
document.addEventListener('DOMContentLoaded', () => {
  const table = document.querySelector('.table-responsive table');
  const body = table?.tBodies[0];
  const search = document.getElementById('cliente-search');
  const gender = document.getElementById('cliente-gender-filter');
  const pager = document.getElementById('clientes-pagination');
  const count = document.getElementById('clientes-count');
  if (!body || !search || !gender || !pager || !count) return;
  const rows = Array.from(body.rows).filter(row => row.dataset.gender !== undefined);
  const pageSize = 10;
  let page = 1;
  const render = () => {
    const query = search.value.trim().toLocaleLowerCase('pt-BR');
    const filtered = rows.filter(row => {
      const matchesText = row.innerText.toLocaleLowerCase('pt-BR').includes(query);
      return matchesText && (gender.value === 'all' || row.dataset.gender === gender.value);
    });
    const pages = Math.max(1, Math.ceil(filtered.length / pageSize));
    page = Math.min(page, pages);
    const start = (page - 1) * pageSize;
    body.replaceChildren(...filtered.slice(start, start + pageSize));
    count.textContent = filtered.length ? `Exibindo ${start + 1}–${Math.min(start + pageSize, filtered.length)} de ${filtered.length} clientes` : 'Nenhum cliente encontrado';
    pager.replaceChildren();
    const addPage = (label, target, disabled, active = false) => {
      const item = document.createElement('li');
      item.className = `page-item${disabled ? ' disabled' : ''}${active ? ' active' : ''}`;
      const button = document.createElement('button');
      button.type = 'button'; button.className = 'page-link'; button.textContent = label; button.disabled = disabled;
      button.addEventListener('click', () => { page = target; render(); });
      item.append(button); pager.append(item);
    };
    addPage('‹', page - 1, page === 1);
    for (let number = 1; number <= pages; number++) addPage(String(number), number, false, number === page);
    addPage('›', page + 1, page === pages);
  };
  search.addEventListener('input', () => { page = 1; render(); });
  gender.addEventListener('change', () => { page = 1; render(); });
  render();
});
</script>
@endsection

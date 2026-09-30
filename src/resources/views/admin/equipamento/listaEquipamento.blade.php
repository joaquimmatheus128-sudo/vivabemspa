<main class="app-main">
    <!--begin::App Content Header-->
    <div class="app-content-header">
        <!--begin::Container-->
        <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
                <div class="col-sm-6">
                    <h1 class="mb-0 fs-3">Equipamentos</h1>
                </div>
                <div class="col-sm-6">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb float-sm-end">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Equipamentos</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <!--end::Row-->

            {{-- ALERTAS SUCESSO --}}
            @if (session('sucesso'))
                <div class="alert alert-success" role="alert">
                    <i class="bi bi-check-circle-fill"></i>
                    {{ session('sucesso') }}
                </div>
            @endif

            {{-- ALERTAS ERRO --}}
            @if (session('erro'))
                <div class="alert alert-danger" role="alert">
                    <i class="bi bi-exclamation-circle-fill"></i>
                    {{ session('erro') }}
                </div>
            @endif

            {{-- ERROS DE VALIDAÇÃO ($request->validate) --}}
            @if ($errors->any())
                <div class="alert alert-danger" role="alert">
                    <i class="bi bi-exclamation-circle-fill"></i>
                    Verifique os dados do formulário: preencha os campos obrigatórios e envie imagens de até 4MB.
                </div>
            @endif

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
                                    <h3 class="card-title">Tabela de Equipamentos</h3>
                                </div>
                                <div class="col-12 col-md-8">
                                    <div class="d-flex flex-wrap justify-content-md-end gap-2">
                                        <div class="input-group input-group-sm w-auto">
                                            <span class="input-group-text">
                                                <i class="bi bi-search" aria-hidden="true"></i>
                                            </span>
                                            <input type="search" id="pesquisar-equipamento" class="form-control"
                                                placeholder="Pesquisar equipamento" aria-label="Pesquisar equipamento"
                                                style="width: 180px" />
                                        </div>
                                        <select id="equipamento-status-filter" class="form-select form-select-sm w-auto"
                                            aria-label="Filtrar por status">
                                            <option value="all" selected>Todos os equipamentos</option>
                                            <option value="ativo">Ativo</option>
                                            <option value="inativo">Inativo</option>
                                        </select>
                                        <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                            data-bs-target="#modal-add-equipamento">
                                            <i class="bi bi-plus-lg me-1" aria-hidden="true"></i>
                                            Novo equipamento
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
                                            <th style="width: 15%">ID</th>

                                            <th style="width: 25%">NOME</th>

                                            <th style="width: 35%">DESCRIÇÃO</th>

                                            <th>STATUS</th>

                                            <th class="text-end">
                                                AÇÕES
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($listaEquipamento as $equipamento)
                                            <tr>
                                                {{-- ID --}}
                                                <td>
                                                    {{ $equipamento->id_equipamento }}
                                                </td>
                                                {{-- Nome --}}
                                                <td>
                                                    {{ $equipamento->nome_equipamento }}
                                                </td>
                                                {{-- Descrição --}}
                                                <td>
                                                    {{ $equipamento->descricao_equipamento }}
                                                </td>
                                                {{-- Status --}}
                                                <td>
                                               @if ($equipamento->status_equipamento === 'ATIVO')
                                                        <span class="badge text-bg-success">
                                                            Ativo
                                                        </span>
                                                    @else
                                                        <span class="badge text-bg-warning">
                                                            Inativo
                                                        </span>
                                                    @endif
                                                </td>
                                                {{-- Ações --}}
                                                <td class="text-end">
                                                    <div class="btn-group btn-group-sm">

                                                        {{-- EDITAR: os data-* levam os dados da linha para o modal --}}
                                                        <button type="button" class="btn btn-outline-secondary"
                                                            data-bs-toggle="modal" data-bs-target="#modal-edit-equipamento"
                                                            data-nome="{{ $equipamento->nome_equipamento }}"
                                                            data-descricao="{{ $equipamento->descricao_equipamento }}"
                                                            data-status="{{ $equipamento->status_equipamento }}"
                                                            data-url="{{ route('admin.equipamento.update', $equipamento->id_equipamento) }}"
                                                            aria-label="Editar">

                                                            <i class="bi bi-pencil" aria-hidden="true"> </i>
                                                        </button>

                                                        {{-- EXCLUIR: abre o modal de confirmação --}}
                                                        <button type="button" class="btn btn-outline-danger"
                                                            data-bs-toggle="modal" data-bs-target="#modal-delete-equipamento"
                                                            data-nome="{{ $equipamento->nome_equipamento }}"
                                                            data-url="{{ route('admin.equipamento.destroy', $equipamento->id_equipamento) }}"
                                                            aria-label="Deletar">

                                                            <i class="bi bi-trash" aria-hidden="true"> </i>
                                                        </button>

                                                    </div>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="5" class="text-center py-4 text-muted">
                                                    Nenhum equipamento cadastrado.
                                                </td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!--end::Card Body-->
                        <!--begin::Card Footer-->
                        <div class="card-footer clearfix">
                            <div class="float-start pt-1 fs-7 text-body-secondary">
                                Total de equipamentos:
                                <strong>
                                    {{ $listaEquipamento->total() }}
                                </strong>
                            </div>
                            {{-- PAGINAÇÃO (10 por página) --}}
                            <ul class="pagination pagination-sm m-0 float-end">
                                <li class="page-item {{ $listaEquipamento->onFirstPage() ? 'disabled' : '' }}">
                                    <a class="page-link" href="{{ $listaEquipamento->previousPageUrl() ?? '#' }}" aria-label="Previous"> &laquo; </a>
                                </li>
                                @foreach ($listaEquipamento->getUrlRange(1, $listaEquipamento->lastPage()) as $pagina => $url)
                                    <li class="page-item {{ $pagina == $listaEquipamento->currentPage() ? 'active' : '' }}">
                                        <a class="page-link" href="{{ $url }}">{{ $pagina }}</a>
                                    </li>
                                @endforeach
                                <li class="page-item {{ $listaEquipamento->hasMorePages() ? '' : 'disabled' }}">
                                    <a class="page-link" href="{{ $listaEquipamento->nextPageUrl() ?? '#' }}" aria-label="Next"> &raquo; </a>
                                </li>
                            </ul>
                        </div>
                        <!--end::Card Footer-->
                    </div>
                    <!--end::Card-->
                </div>
                <!-- /.col -->
            </div>     
            <!--end::Row-->

            {{-- INICIO - MODAL CADASTRO EQUIPAMENTO --}}
            <div class="modal fade" id="modal-add-equipamento" tabindex="-1"
                aria-labelledby="modal-add-equipamento-label" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">

                        {{-- FORM DE CADASTRO --}}
                        <form action="{{ route('admin.equipamento.store') }}" method="POST">
                            @csrf

                            <div class="modal-header">
                                <h5 class="modal-title" id="modal-add-equipamento-label">Cadastrar novo equipamento</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>

                            <div class="modal-body">

                                <div class="mb-3">
                                    <label for="new-equipamento-nome" class="form-label"> Nome </label>
                                    <input type="text" class="form-control" id="new-equipamento-nome"
                                        placeholder="Maca de Massagem" required name="nome_equipamento" />
                                </div>

                                <div class="mb-3">
                                    <label for="new-equipamento-descricao" class="form-label"> Descrição </label>
                                    <textarea class="form-control" id="new-equipamento-descricao" rows="3"
                                        name="descricao_equipamento"></textarea>
                                </div>

                                <div class="mb-3">
                                    <label for="new-equipamento-status" class="form-label"> Status </label>
                                    <select id="new-equipamento-status" class="form-select" name="status_equipamento">
                                        <option value="ATIVO">Ativo</option>
                                        <option value="INATIVO">Inativo</option>
                                    </select>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                    Cancelar
                                </button>
                                <button type="submit" class="btn btn-primary">Salvar</button>
                            </div>
                        </form>
                        {{-- FIM FORM DE CADASTRO --}}
                    </div>
                </div>
            </div>
            {{-- FIM - MODAL CADASTRO EQUIPAMENTO --}}


            {{-- INICIO - MODAL EDITAR EQUIPAMENTO --}}
            <div class="modal fade" id="modal-edit-equipamento" tabindex="-1"
                aria-labelledby="modal-edit-equipamento-label" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">

                        {{-- FORM DE EDITAR (o action é preenchido pelo JavaScript) --}}
                        <form id="form-edit-equipamento" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="modal-header">
                                <h5 class="modal-title" id="modal-edit-equipamento-label">Editar equipamento</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>

                            <div class="modal-body">

                                <div class="mb-3">
                                    <label for="edit-equipamento-nome" class="form-label"> Nome </label>
                                    <input type="text" class="form-control" id="edit-equipamento-nome" required
                                        name="nome_equipamento" />
                                </div>

                                <div class="mb-3">
                                    <label for="edit-equipamento-descricao" class="form-label"> Descrição </label>
                                    <textarea class="form-control" id="edit-equipamento-descricao" rows="3"
                                        name="descricao_equipamento"></textarea>
                                </div>

                                <div class="mb-3">
                                    <label for="edit-equipamento-status" class="form-label"> Status </label>
                                    <select id="edit-equipamento-status" class="form-select" name="status_equipamento">
                                        <option value="ATIVO">Ativo</option>
                                        <option value="INATIVO">Inativo</option>
                                    </select>
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                    Cancelar
                                </button>
                                <button type="submit" class="btn btn-primary">Atualizar equipamento</button>
                            </div>

                        </form>
                        {{-- FIM FORM DE EDITAR --}}
                    </div>
                </div>
            </div>
            {{-- FIM - MODAL EDITAR EQUIPAMENTO --}}


            {{-- INICIO - MODAL EXCLUIR EQUIPAMENTO --}}
            <div class="modal fade" id="modal-delete-equipamento" tabindex="-1"
                aria-labelledby="modal-delete-equipamento-label" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">

                        {{-- FORM DE EXCLUIR (o action é preenchido pelo JavaScript) --}}
                        <form id="form-delete-equipamento" method="POST">
                            @csrf
                            @method('DELETE')

                            <div class="modal-header">
                                <h5 class="modal-title" id="modal-delete-equipamento-label">Excluir equipamento</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>

                            <div class="modal-body">
                                <p class="mb-0">
                                    Tem certeza de que deseja excluir <strong id="delete-equipamento-nome"></strong>?
                                    Esta ação não poderá ser desfeita.
                                </p>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                    Cancelar
                                </button>

                                <button type="submit" class="btn btn-danger">
                                    Excluir
                                </button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
            {{-- FIM - MODAL EXCLUIR EQUIPAMENTO --}}

        </div>
        <!--end::Container-->
    </div>
    <!--end::App Content-->

</main>


{{-- Editar equipamento --}}
<script>
    const modalEditarEquipamento = document.getElementById('modal-edit-equipamento');
    const formEditEquipamento = document.getElementById('form-edit-equipamento');
    const editNome = document.getElementById('edit-equipamento-nome');
    const editDescricao = document.getElementById('edit-equipamento-descricao');
    const editStatus = document.getElementById('edit-equipamento-status');

    // Carregar as informações no modal
    modalEditarEquipamento.addEventListener('show.bs.modal', function(event) {

        const botao = event.relatedTarget;

        // Form Action
        formEditEquipamento.action = botao.getAttribute('data-url');

        // Preencher
        editNome.value = botao.getAttribute('data-nome');
        editDescricao.value = botao.getAttribute('data-descricao');
        editStatus.value = botao.getAttribute('data-status');

    });
</script>


{{-- Excluir equipamento --}}
<script>
    const modalDeleteEquipamento = document.getElementById('modal-delete-equipamento');
    const formDeleteEquipamento = document.getElementById('form-delete-equipamento');
    const deleteNomeEquipamento = document.getElementById('delete-equipamento-nome');

    modalDeleteEquipamento.addEventListener('show.bs.modal', function(event) {

        const botao = event.relatedTarget;

        // Form Action
        formDeleteEquipamento.action = botao.getAttribute('data-url');

        // Nome no texto de confirmação
        deleteNomeEquipamento.textContent = botao.getAttribute('data-nome');

    });
</script>


{{-- Tempo para o alerta sumir --}}
<script>
    setTimeout(() => {

        const alertas = document.querySelectorAll('.alert');

        alertas.forEach(function(alerta) {

            const instancia = bootstrap.Alert.getOrCreateInstance(alerta);

            instancia.close();

        });

    }, 5000);
</script>

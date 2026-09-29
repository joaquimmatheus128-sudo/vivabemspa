<main class="app-main">
    <!--begin::App Content Header-->
    <div class="app-content-header">
        <!--begin::Container-->
        <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
                <div class="col-sm-6">
                    <h1 class="mb-0 fs-3">Galeria</h1>
                </div>
                <div class="col-sm-6">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb float-sm-end">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Galeria</li>
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
                                    <h3 class="card-title">Tabela de Imagens</h3>
                                </div>
                                <div class="col-12 col-md-8">
                                    <div class="d-flex flex-wrap justify-content-md-end gap-2">
                                        <div class="input-group input-group-sm w-auto">
                                            <span class="input-group-text">
                                                <i class="bi bi-search" aria-hidden="true"></i>
                                            </span>
                                            <input type="search" id="pesquisar-galeria" class="form-control"
                                                placeholder="Pesquisar imagem" aria-label="Pesquisar imagem"
                                                style="width: 180px" />
                                        </div>
                                        <select id="galeria-status-filter" class="form-select form-select-sm w-auto"
                                            aria-label="Filtrar por status">
                                            <option value="all" selected>Todas as imagens</option>
                                            <option value="ativo">Ativo</option>
                                            <option value="inativo">Inativo</option>
                                        </select>
                                        <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                            data-bs-target="#modal-add-galeria">
                                            <i class="bi bi-plus-lg me-1" aria-hidden="true"></i>
                                            Nova imagem
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

                                            <th style="width: 15%">IMAGEM</th>

                                            <th style="width: 25%">NOME</th>

                                            <th style="width: 20%">CATEGORIA</th>

                                            <th>STATUS</th>

                                            <th class="text-end">
                                                AÇÕES
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($listaGaleria as $galeria)
                                            <tr>
                                                {{-- ID --}}
                                                <td>
                                                    {{ $galeria->id_galeria }}
                                                </td>
                                                {{-- Imagem (mesmo caminho usado no site) --}}
                                                <td>
                                                    @if ($galeria->imagem_galeria)
                                                        <img src="{{ asset('vivabem-spa/assets/' . $galeria->imagem_galeria) }}"
                                                            alt="{{ $galeria->nome_galeria }}" class="rounded"
                                                            style="width: 64px; height: 40px; object-fit: cover;">
                                                    @else
                                                        <span class="text-muted">
                                                            Sem imagem
                                                        </span>
                                                    @endif
                                                </td>
                                                {{-- Nome --}}
                                                <td>
                                                    {{ $galeria->nome_galeria }}
                                                </td>
                                                {{-- Categoria --}}
                                                <td>
                                                    {{ $galeria->categoria_galeria }}
                                                </td>
                                                {{-- Status --}}
                                                <td>
                                                    @if ($galeria->status_galeria === 'ATIVO')
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
                                                            data-bs-toggle="modal" data-bs-target="#modal-edit-galeria"
                                                            data-nome="{{ $galeria->nome_galeria }}"
                                                            data-categoria="{{ $galeria->categoria_galeria }}"
                                                            data-descricao="{{ $galeria->descricao_galeria }}"
                                                            data-status="{{ $galeria->status_galeria === 'ATIVO' ? 'ATIVO' : 'INATIVO' }}"
                                                            data-image="{{ asset('vivabem-spa/assets/' . $galeria->imagem_galeria) }}"
                                                            data-url="{{ route('admin.galeria.update', $galeria->id_galeria) }}"
                                                            aria-label="Editar">

                                                            <i class="bi bi-pencil" aria-hidden="true"> </i>
                                                        </button>

                                                        {{-- EXCLUIR: abre o modal de confirmação --}}
                                                        <button type="button" class="btn btn-outline-danger"
                                                            data-bs-toggle="modal" data-bs-target="#modal-delete-galeria"
                                                            data-nome="{{ $galeria->nome_galeria }}"
                                                            data-url="{{ route('admin.galeria.destroy', $galeria->id_galeria) }}"
                                                            aria-label="Deletar">

                                                            <i class="bi bi-trash" aria-hidden="true"> </i>
                                                        </button>

                                                    </div>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="6" class="text-center py-4 text-muted">
                                                    Nenhuma imagem cadastrada.
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
                                Total de imagens:
                                <strong>
                                    {{ $listaGaleria->total() }}
                                </strong>
                            </div>
                            {{-- PAGINAÇÃO (10 por página) --}}
                            <ul class="pagination pagination-sm m-0 float-end">
                                <li class="page-item {{ $listaGaleria->onFirstPage() ? 'disabled' : '' }}">
                                    <a class="page-link" href="{{ $listaGaleria->previousPageUrl() ?? '#' }}" aria-label="Previous"> &laquo; </a>
                                </li>
                                @foreach ($listaGaleria->getUrlRange(1, $listaGaleria->lastPage()) as $pagina => $url)
                                    <li class="page-item {{ $pagina == $listaGaleria->currentPage() ? 'active' : '' }}">
                                        <a class="page-link" href="{{ $url }}">{{ $pagina }}</a>
                                    </li>
                                @endforeach
                                <li class="page-item {{ $listaGaleria->hasMorePages() ? '' : 'disabled' }}">
                                    <a class="page-link" href="{{ $listaGaleria->nextPageUrl() ?? '#' }}" aria-label="Next"> &raquo; </a>
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

            {{-- INICIO - MODAL CADASTRO GALERIA --}}
            <div class="modal fade" id="modal-add-galeria" tabindex="-1" aria-labelledby="modal-add-galeria-label"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">

                        {{-- FORM DE CADASTRO (enctype é obrigatório para enviar arquivo) --}}
                        <form action="{{ route('admin.galeria.store') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf

                            <div class="modal-header">
                                <h5 class="modal-title" id="modal-add-galeria-label">Cadastrar nova imagem</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>

                            <div class="modal-body">

                                <div class="mb-3">
                                    <label for="new-galeria-nome" class="form-label"> Nome </label>
                                    <input type="text" class="form-control" id="new-galeria-nome"
                                        placeholder="Sala de Relaxamento" required name="nome_galeria" />
                                </div>

                                <div class="mb-3">
                                    <label for="img-galeria" class="form-label"> Selecione uma imagem </label>
                                    <input type="file" class="form-control" id="img-galeria"
                                        name="imagem_galeria" accept="image/*" required />

                                    <img id="ver-galeria" src="" alt="Pré-visualização da imagem"
                                        class="img-fluid rounded mt-2 d-none" style="max-height: 180px;">
                                </div>

                                <div class="mb-3">
                                    <label for="new-galeria-categoria" class="form-label"> Categoria </label>
                                    <input type="text" class="form-control" id="new-galeria-categoria"
                                        placeholder="Ambiente, Terapias..." name="categoria_galeria" />
                                </div>

                                <div class="mb-3">
                                    <label for="new-galeria-descricao" class="form-label"> Descrição </label>
                                    <textarea class="form-control" id="new-galeria-descricao" rows="3"
                                        name="descricao_galeria"></textarea>
                                </div>

                                <div class="mb-3">
                                    <label for="new-galeria-status" class="form-label"> Status </label>
                                    <select id="new-galeria-status" class="form-select" name="status_galeria">
                                        <option value="ATIVO">Ativo (aparece no site)</option>
                                        <option value="INATIVO">Inativo (escondida do site)</option>
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
            {{-- FIM - MODAL CADASTRO GALERIA --}}


            {{-- INICIO - MODAL EDITAR GALERIA --}}
            <div class="modal fade" id="modal-edit-galeria" tabindex="-1" aria-labelledby="modal-edit-galeria-label"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">

                        {{-- FORM DE EDITAR (o action é preenchido pelo JavaScript) --}}
                        <form id="form-edit-galeria" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="modal-header">
                                <h5 class="modal-title" id="modal-edit-galeria-label">Editar imagem</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>

                            <div class="modal-body">

                                <div class="mb-3">
                                    <label for="edit-galeria-nome" class="form-label"> Nome </label>
                                    <input type="text" class="form-control" id="edit-galeria-nome" required
                                        name="nome_galeria" />
                                </div>

                                <div class="mb-3">
                                    <label for="edit-galeria-imagem" class="form-label"> Trocar imagem </label>
                                    <input type="file" class="form-control" id="edit-galeria-imagem"
                                        name="imagem_galeria" accept="image/*" />
                                    <div class="form-text">Deixe vazio para manter a imagem atual</div>

                                    <img id="edit-galeria-mostrar" src="" alt="Imagem atual"
                                        class="img-fluid rounded mt-2" style="max-height: 180px;">
                                </div>

                                <div class="mb-3">
                                    <label for="edit-galeria-categoria" class="form-label"> Categoria </label>
                                    <input type="text" class="form-control" id="edit-galeria-categoria"
                                        name="categoria_galeria" />
                                </div>

                                <div class="mb-3">
                                    <label for="edit-galeria-descricao" class="form-label"> Descrição </label>
                                    <textarea class="form-control" id="edit-galeria-descricao" rows="3"
                                        name="descricao_galeria"></textarea>
                                </div>

                                <div class="mb-3">
                                    <label for="edit-galeria-status" class="form-label"> Status </label>
                                    <select id="edit-galeria-status" class="form-select" name="status_galeria">
                                        <option value="ATIVO">Ativo (aparece no site)</option>
                                        <option value="INATIVO">Inativo (escondida do site)</option>
                                    </select>
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                    Cancelar
                                </button>
                                <button type="submit" class="btn btn-primary">Atualizar imagem</button>
                            </div>

                        </form>
                        {{-- FIM FORM DE EDITAR --}}
                    </div>
                </div>
            </div>
            {{-- FIM - MODAL EDITAR GALERIA --}}


            {{-- INICIO - MODAL EXCLUIR GALERIA --}}
            <div class="modal fade" id="modal-delete-galeria" tabindex="-1"
                aria-labelledby="modal-delete-galeria-label" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">

                        {{-- FORM DE EXCLUIR (o action é preenchido pelo JavaScript) --}}
                        <form id="form-delete-galeria" method="POST">
                            @csrf
                            @method('DELETE')

                            <div class="modal-header">
                                <h5 class="modal-title" id="modal-delete-galeria-label">Excluir imagem</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>

                            <div class="modal-body">
                                <p class="mb-0">
                                    Tem certeza de que deseja excluir <strong id="delete-galeria-nome"></strong>?
                                    Esta ação não poderá ser desfeita. A imagem também será apagada da pasta e sairá do site.
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
            {{-- FIM - MODAL EXCLUIR GALERIA --}}

        </div>
        <!--end::Container-->
    </div>
    <!--end::App Content-->

</main>


{{-- Carregando a foto do modal cadastrar --}}
<script>
    const inputGaleria = document.getElementById('img-galeria');
    const previewGaleria = document.getElementById('ver-galeria');

    inputGaleria.addEventListener('change', function() {

        const arquivo = this.files[0];

        if (arquivo) {

            previewGaleria.src = URL.createObjectURL(arquivo);
            previewGaleria.classList.remove('d-none');

        }

    });
</script>


{{-- Editar galeria --}}
<script>
    const modalEditarGaleria = document.getElementById('modal-edit-galeria');
    const formEditGaleria = document.getElementById('form-edit-galeria');
    const editNome = document.getElementById('edit-galeria-nome');
    const editCategoria = document.getElementById('edit-galeria-categoria');
    const editDescricao = document.getElementById('edit-galeria-descricao');
    const editStatus = document.getElementById('edit-galeria-status');
    const editImagem = document.getElementById('edit-galeria-imagem');
    const editMostrar = document.getElementById('edit-galeria-mostrar');

    // Carregar as informações no modal
    modalEditarGaleria.addEventListener('show.bs.modal', function(event) {

        const botao = event.relatedTarget;

        // Form Action
        formEditGaleria.action = botao.getAttribute('data-url');

        // Preencher
        editNome.value = botao.getAttribute('data-nome');
        editCategoria.value = botao.getAttribute('data-categoria');
        editDescricao.value = botao.getAttribute('data-descricao');
        editStatus.value = botao.getAttribute('data-status');
        editMostrar.src = botao.getAttribute('data-image');

        editImagem.value = '';

    });

    // VER FOTO PARA EDITAR
    editImagem.addEventListener('change', function() {

        const arquivo = this.files[0];

        if (arquivo) {

            editMostrar.src = URL.createObjectURL(arquivo);

        }

    });
</script>


{{-- Excluir imagem --}}
<script>
    const modalDeleteGaleria = document.getElementById('modal-delete-galeria');
    const formDeleteGaleria = document.getElementById('form-delete-galeria');
    const deleteNomeGaleria = document.getElementById('delete-galeria-nome');

    modalDeleteGaleria.addEventListener('show.bs.modal', function(event) {

        const botao = event.relatedTarget;

        // Form Action
        formDeleteGaleria.action = botao.getAttribute('data-url');

        // Nome no texto de confirmação
        deleteNomeGaleria.textContent = botao.getAttribute('data-nome');

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

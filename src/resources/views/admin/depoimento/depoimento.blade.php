@extends('layout.dashboard')

@section('content')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tabulator-tables@6.4.0/dist/css/tabulator_bootstrap5.min.css" crossorigin="anonymous" />
      <main class="app-main">
        <div class="app-content-header">
          <div class="container-fluid">
            <div class="row">
              <div class="col-sm-6">
                <h1 class="mb-0 fs-3">Depoimentos</h1>
              </div>
              <div class="col-sm-6">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb float-sm-end">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Tables</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Data</li>
                  </ol>
                </nav>
              </div>
            </div>
          </div>
        </div>
        <div class="app-content">
          <div class="container-fluid">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Depoimentos cadastrados</h3>
                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 16rem">
                    <span class="input-group-text">
                      <i class="bi bi-search" aria-hidden="true"></i>
                    </span>
                    <input
                      id="table-filter"
                      type="search"
                      class="form-control"
                      placeholder="Filter rows&hellip;"
                      aria-label="Filter rows"
                    />
                  </div>
                </div>
              </div>
              <div class="card-body">
                <div id="depoimentos-table"></div>
              </div>
            </div>
          </div>
        </div>
      </main>

<script src="https://cdn.jsdelivr.net/npm/tabulator-tables@6.4.0/dist/js/tabulator.min.js" crossorigin="anonymous"></script>
<script>
document.addEventListener('DOMContentLoaded', () => {
  if (typeof Tabulator === 'undefined') return;
  const data = @json($depoimentos);
  const badgeFormatter = cell => {
    const status = cell.getValue() || 'PENDENTE';
    const color = { APROVADO: 'success', PENDENTE: 'warning', REJEITADO: 'danger' }[status] || 'secondary';
    return `<span class="badge text-bg-${color}">${status.charAt(0) + status.slice(1).toLowerCase()}</span>`;
  };
  const table = new Tabulator('#depoimentos-table', {
    data,
    layout: 'fitColumns',
    responsiveLayout: 'collapse',
    pagination: true,
    paginationSize: 10,
    paginationSizeSelector: [10, 25, 50, 100],
    movableColumns: true,
    placeholder: 'Nenhum depoimento cadastrado.',
    columns: [
      { title: '#', field: 'id', width: 75, headerFilter: 'input' },
      { title: 'Cliente', field: 'cliente', headerFilter: 'input', minWidth: 150 },
      { title: 'Título', field: 'titulo', headerFilter: 'input', minWidth: 150 },
      { title: 'Depoimento', field: 'descricao', headerFilter: 'input', minWidth: 240, variableHeight: true },
      { title: 'Nota', field: 'nota', hozAlign: 'center', width: 90, sorter: 'number', headerFilter: 'input' },
      { title: 'Status', field: 'status', formatter: badgeFormatter, hozAlign: 'center', width: 130, headerFilter: 'list', headerFilterParams: { values: ['', 'APROVADO', 'PENDENTE', 'REJEITADO'] } },
      { title: 'Data', field: 'data', sorter: 'string', width: 150, formatter: cell => { const value = cell.getValue(); return value ? value.slice(0, 10).split('-').reverse().join('/') : '—'; } },
    ],
  });
  document.getElementById('table-filter').addEventListener('input', event => {
    const value = event.target.value.trim().toLocaleLowerCase('pt-BR');
    if (!value) return table.clearFilter(true);
    table.setFilter(row => Object.values(row).some(field => String(field ?? '').toLocaleLowerCase('pt-BR').includes(value)));
  });
  document.getElementById('export-csv').addEventListener('click', () => table.download('csv', 'depoimentos.csv'));
  document.getElementById('export-json').addEventListener('click', () => table.download('json', 'depoimentos.json'));
  document.getElementById('print-table').addEventListener('click', () => table.print(false, true));
});
</script>
@endsection

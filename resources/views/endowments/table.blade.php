@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
@endsection
<div class="table-responsive">
    <table class="table table-hover shadow mb-5 rounded" id="endowmentTable">
        <thead>
            <tr>
                <th>Empleado</th>
                <th>Cargo</th>
                <th>Dotaciones entregadas</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($contracts->sortBy('employe.name') as $contract)
            @if ($contract->employe->work_position != 'Pendiente')
            <tr>
                <td>
                    {{ $contract->employe->name }}
                    <br>
                    <small style="color: #69C5A0"><strong>{{ $contract->employe->dni }}</strong></small>
                <td>{{ $contract->employe->work_position }}</td>
                <td class="text-center"><strong>{{ $contract->endowment->count() }}</strong></td>
                <td width="120">
                    <div class='btn-group'>
                        @can('show_cards')
                        <a href="{{ route('endowment.employe', $contract->employe->id) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye" style="color: #13A4DA"></i>
                        </a>
                        @endcan
                    </div>
                </td>
            </tr>
            @endif
            @endforeach
        </tbody>
    </table>
    @section('js')
        <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
        <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>

        <script>
            new DataTable('#endowmentTable', {
                language: {
                    search: '<Strong style="color: #69C5A0">Buscar</Strong>',
                    info: '<strong>Página</strong> <strong>_PAGE_</strong> <strong>de</strong> <strong>_PAGES_</strong>',
                    lengthMenu: '<strong style="color: #69C5A0">Mostrar _MENU_</Strong>',
                    infoEmpty: '',
                    infoFiltered: 'Filtrado de _MAX_ registros totales',
                    zeroRecords: 'No se encontraron resultados',
                    paginate: {
                        previous: 'Anterior',
                        next: 'Siguiente'
                    }
                }
            });
        </script>
    @endsection
</div>
<style>
    .pagination .page-item.active .page-link {
        background-color: #69C5A0;
        border-color: #69C5A0;
        color: white;
    }

    .dataTables_wrapper .dataTables_filter input {
        border-radius: 10px; 
        margin-top: 10px;
        margin-right: 4px;
    }

    .dataTables_length select {
        border-radius: 10px; 
        margin-top: 10px;
    }
</style>
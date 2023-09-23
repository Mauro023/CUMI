@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
@endsection
<div class="table-responsive">
    <table class="table table-hover shadow mb-5 rounded" id="medicinesTable">
        <thead>
        <tr>
            <th>Fecha ingreso</th>
            <th># Acta</th>
            <th>Nombre generico</th>
            <th>Registro sanitario</th>
            <th>Cantidad</th>
            <th>Fecha vencimiento</th>
            <th>Estado</th>
            <th class="text-center">Acciones</th>
        </tr>
        </thead>
        <tbody>
        @foreach($medicines as $medicine)
            <tr>
                <td>{{ $medicine->admission_date->format('Y-m-d') }}</td>
                <td class="text-center">{{ $medicine->act_number }}</td>
                <td>{{ $medicine->generic_name }}
                    <br>
                    <small style="color: #69C5A0"><strong>{{ $medicine->concentration }}</strong></small>
                    <small style="color: #69C5A0"><strong>{{ $medicine->pharmaceutical_form }}</strong></small></td>
                <td><small>{{ $medicine->invima_registrations_id ? $medicine->invima_registration->health_register : 'Sin ID'}}</small>
                <br>
                <small style="color: #69C5A0"><strong>
                    {{ $medicine->manufacturer_laboratory }}</strong></small>
                </td>
                <td class="text-center">{{ $medicine->received_amount }}</td>
                <td>{{ $medicine->expiration_date->format('Y-m-d') }}</td>
                <td>{{ $medicine->state }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['medicines.destroy', $medicine->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('medicines.show', [$medicine->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye" style="color: #13A4DA"></i>
                        </a>
                        <a href="{{ route('medicines.edit', [$medicine->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-edit" style="color: #6c6d77"></i>
                        </a>
                        {!! Form::button('<i class="far fa-trash-alt" style="color: #da1b1b"></i>', ['type' => 'submit', 'class' => 'btn btn-default btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    @section('js')
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>

    <script>
        new DataTable('#medicinesTable', {
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
    .custom-title {
        color: #14ABE3;
        /* Cambia el color del título a rojo */
    }

    .custom-icon::before {
        color: #cf33ff;
        /* Cambia el color del icono a rojo */
    }

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

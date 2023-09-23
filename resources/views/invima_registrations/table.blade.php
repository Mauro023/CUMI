@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
@endsection
<div class="table-responsive">
    <table class="table table-hover shadow mb-5 rounded" id="invimaTable">
        <thead>
        <tr>
            <th>Registro sanitario</th>
            <th>Vigencia de registro</th>
            <th>Laboratorio fabricante</th>
            <th class="text-center">Acciones</th>
        </tr>
        </thead>
        <tbody>
        @foreach($invimaRegistrations as $invimaRegistration)
            <tr>
                <td>{{ $invimaRegistration->health_register }}</td>
            <td>{{ $invimaRegistration->validity_registration }}</td>
            <td>{{ $invimaRegistration->laboratory_manufacturer }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['invimaRegistrations.destroy', $invimaRegistration->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('invimaRegistrations.show', [$invimaRegistration->id]) }}"
                           class='btn btn-default btn-xs' style="color: #13A4DA">
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('invimaRegistrations.edit', [$invimaRegistration->id]) }}"
                           class='btn btn-default btn-xs' style="color: #6c6d77">
                            <i class="far fa-edit"></i>
                        </a>
                        {!! Form::button('<i class="far fa-trash-alt" style="color: #da1b1b"></i>', ['type' => 'submit', 'class' => 'btn btn-default btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@section('js')
<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>

<script>
    new DataTable('#invimaTable', {
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

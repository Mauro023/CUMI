@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
@endsection
<div class="table-responsive">
    <table class="table table-hover shadow mb-5 rounded" id="calendarsTable">
        <thead>
            <tr>
                <th>#</th>
                <th>Empleado</th>
                <th>Calendario laboral</th>
                <th style="text-align: center">Horario laboral</th>
                <th>Piso</th>
                @canany(['show_calendars', 'update_calendars', 'destroy_calendars'])
                <th>Acciones</th>
                @endcan
            </tr>
        </thead>
        <tbody>
            @php
            $contador = 0;
            @endphp
            @foreach($calendars as $calendar)
            @php
            $contador = $contador + 1;
            @endphp
            <tr>
                <td><strong>{{$contador}}</strong></td>
                <td>
                    {{ $calendar->employe_id ? $calendar->employe->name : 'Sin ID' }}
                    <br>
                    <small style="color: #69C5A0"><strong>{{ $calendar->employe->work_position }}</strong></small>
                </td>
                <td style="vertical-align: middle">
                    <small>{{ $calendar->start_date->format('Y-m-d') }} - {{ $calendar->end_date->format('Y-m-d')
                        }}</small>
                </td>
                <td style="text-align: center">
                    <span class="badge text-black" style="background-color:#E0E0E0">{{ $calendar->entry_time }}</span>
                    <br><span class="badge text-white" style="background-color:#FF8A65;">{{ $calendar->departure_time
                        }}</span>
                </td>
                <td style="vertical-align: middle">{{ $calendar->floor }}</td>

                <td>
                    <div class='btn-group'>
                        @can('show_calendars')
                        <a href="{{ route('calendars.show', [$calendar->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye" style="color: #13A4DA"></i>
                        </a>
                        @endcan
                        @can('update_calendars')
                        <a href="{{ route('calendars.edit', [$calendar->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-edit" style="color: #6c6d77"></i>
                        </a>
                        @endcan
                        @can('destroy_calendars')
                        {!! Form::open(['route' => ['calendars.destroy', $calendar->id], 'method' => 'delete']) !!}
                        {!! Form::button('<i class="far fa-trash-alt" style="color: #da1b1b"></i>', ['type' => 'submit',
                        'class' => 'btn btn-default btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                        {!! Form::close() !!}
                        @endcan
                    </div>
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
            new DataTable('#calendarsTable', {
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
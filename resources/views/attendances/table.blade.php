@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
@endsection
<div class="table-responsive">
    <table class="table table-hover mb-0" id="attendancesTable">
        <thead>
            <tr>
                <th>#</th>
                <th>Empleado</th>
                <th>Día de trabajo</th>
                <th>Entrada - Salida</th>
                @canany(['show_attendances', 'update_attendances', 'destroy_attendances'])
                <th>Acciones</th>
                @endcan
            </tr>
        </thead>
        <tbody>
            @php
            $contador = 0;
            @endphp
            @foreach($attendances as $attendance)
            @php
            $contador = $contador + 1;
            @endphp
            <tr>
                <td><strong>{{$contador}}</strong></td>
                <td>
                    {{ $attendance->employe_id ? $attendance->employe->name : 'Sin ID'}}
                    <br>
                    <small style="color: #69C5A0"><strong>{{ $attendance->employe->work_position }}</strong></small>
                </td>
                <td style="vertical-align: middle">{{ $attendance->workday->format('Y-m-d') }}</td>
                <td style="vertical-align: middle">
                    <span class="badge text-black" style="background-color:#E0E0E0">{{ $attendance->aentry_time
                        }}</span>
                    - <span class="badge text-white" style="background-color:#FF8A65;">{{ $attendance->adeparture_time
                        }}</span>
                </td>
                <td>
                    <div class='btn-group'>
                        @can('show_attendances')
                        <a href="{{ route('attendances.show', [$attendance->id]) }}" 
                        class='btn btn-default btn-xs'>
                            <i class="far fa-eye" style="color: #13A4DA"></i>
                        </a>
                        @endcan
                        @can('update_attendances')
                        <a href="{{ route('attendances.edit', [$attendance->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-edit" style="color: #6c6d77"></i>
                        </a>
                        @endcan
                        @can('destroy_attendances')
                        {!! Form::open(['route' => ['attendances.destroy', $attendance->id], 'method' => 'delete']) !!}
                        {!! Form::button('<i class="far fa-trash-alt" style="color: #da1b1b"></i>', ['type' => 'submit',
                        'class' => 'btn
                        btn-default btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
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
            new DataTable('#attendancesTable', {
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
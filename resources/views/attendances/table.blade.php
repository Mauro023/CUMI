<div class="table-responsive">
    <table class="table table-hover" id="attendances-table">
        <thead>
            <tr>
                <th>Empleado</th>
                <th>Fecha</th>
                <th>Hora de entrada</th>
                <th>Hora de salida</th>
                @canany(['show_attendances', 'update_attendances', 'destroy_attendances'])
                <th colspan="3">Acciones</th>
                @endcan
            </tr>
        </thead>
        <tbody>
            @foreach($attendances as $attendance)
            <tr>
                <td>{{ $attendance->employe_id ? $attendance->employe->name : 'Sin ID'}}</td>
                <td>{{ $attendance->workday->format('Y-m-d') }}</td>
                <td>{{ $attendance->aentry_time }}</td>
                <td>{{ $attendance->adeparture_time }}</td>
                <td>
                    {!! Form::open(['route' => ['attendances.destroy', $attendance->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        @can('show_attendances')
                        <a href="{{ route('attendances.show', [$attendance->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        @endcan
                        @can('update_attendances')
                        <a href="{{ route('attendances.edit', [$attendance->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-edit"></i>
                        </a>
                        @endcan
                        @can('destroy_attendances')
                        {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn
                        btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                        @endcan
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<div class="card-footer mr-auto">
    {{ $attendances->links() }}
</div>
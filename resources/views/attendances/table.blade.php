<div class="table-responsive">
    <table class="table" id="attendances-table">
        <thead>
        <tr>
        <th>Empleado</th>
        <th>Fecha</th>
        <th>Hora de entrada</th>
        <th>Hora de salida</th>
            <th colspan="3">Acciones</th>
        </tr>
        </thead>
        <tbody>
        @foreach($attendances as $attendance)
            <tr>
            <td>{{ $attendance->id_employe ? $attendance->employe->name : 'Sin ID'}}</td>
            <td>{{ $attendance->workday }}</td>
            <td>{{ $attendance->entry_time }}</td>
            <td>{{ $attendance->departure_time }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['attendances.destroy', $attendance->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('attendances.show', [$attendance->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('attendances.edit', [$attendance->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-edit"></i>
                        </a>
                        {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

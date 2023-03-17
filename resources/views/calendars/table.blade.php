<div class="table-responsive">
    <table class="table" id="calendars-table">
        <thead>
        <tr>
            <th>Empleado</th>
            <th>Calendario</th>
            <th>Hora de entrada</th>
            <th>Hora de salida</th>
            <th>Piso</th>
            <th colspan="3">Acciones</th>
        </tr>
        </thead>
        <tbody>
        @foreach($calendars as $calendar)
            <tr>
                <td>{{ $calendar->id_employe ? $calendar->employe->name : 'Sin ID' }}</td>    
                <td>{{ implode(', ', explode(', ', $calendar->workday)) }}</td>
                <td>{{ $calendar->entry_time }}</td>
                <td>{{ $calendar->departure_time }}</td>
                <td>{{ $calendar->floor }}</td>
            
                <td width="120">
                    {!! Form::open(['route' => ['calendars.destroy', $calendar->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('calendars.show', [$calendar->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('calendars.edit', [$calendar->id]) }}"
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

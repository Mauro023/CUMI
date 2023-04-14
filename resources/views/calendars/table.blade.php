<div class="table-responsive">
    <table class="table table-hover" id="calendars-table">
        <thead>
        <tr>
            <th>Empleado</th>
            <th>Calendario laboral</th>
            <th>Horario laboral</th>
            <th>Piso</th>
            @canany(['show_calendars', 'update_calendars', 'destroy_calendars'])
                <th colspan="3">Acciones</th>
            @endcan
        </tr>
        </thead>
        <tbody>
        @foreach($calendars as $calendar)
            <tr>
                <td>{{ $calendar->employe_id ? $calendar->employe->name : 'Sin ID' }}</td>
                <td>{{ $calendar->start_date->format('Y-m-d') }} - {{ $calendar->end_date->format('Y-m-d') }}</td>
                <td><span class="badge bg-green">{{ $calendar->entry_time }}</span> - <span class="badge bg-danger">{{ $calendar->departure_time }}</span></td>
                <td>{{ $calendar->floor }}</td>
            
                <td>
                    {!! Form::open(['route' => ['calendars.destroy', $calendar->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        @can('show_calendars')
                            <a href="{{ route('calendars.show', [$calendar->id]) }}"
                            class='btn btn-default btn-xs'>
                                <i class="far fa-eye"></i>
                            </a>
                        @endcan
                        @can('update_calendars')
                            <a href="{{ route('calendars.edit', [$calendar->id]) }}"
                            class='btn btn-default btn-xs'>
                                <i class="far fa-edit"></i>
                            </a>
                        @endcan
                        @can('destroy_calendars')
                            {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
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
    {{ $calendars->links() }}
</div>

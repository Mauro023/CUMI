<div class="table-responsive">
    <table class="table" id="calendars-table">
        <thead>
        <tr>
            <th>Workday</th>
        <th>Entry Time</th>
        <th>Departure Time</th>
        <th>Floor</th>
        <th>Id Employe</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($calendars as $calendar)
            <tr>
                <td>{{ $calendar->workday }}</td>
            <td>{{ $calendar->entry_time }}</td>
            <td>{{ $calendar->departure_time }}</td>
            <td>{{ $calendar->floor }}</td>
            <td>{{ $calendar->id_employe }}</td>
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

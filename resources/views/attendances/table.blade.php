<div class="table-responsive">
    <table class="table" id="attendances-table">
        <thead>
        <tr>
            <th>Workday</th>
        <th>Entry Time</th>
        <th>Departure Time</th>
        <th>Minutes</th>
        <th>Id Employe</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($attendances as $attendance)
            <tr>
            <td>{{ $attendance->workday }}</td>
            <td>{{ $attendance->entry_time }}</td>
            <td>{{ $attendance->departure_time }}</td>
            <td>{{ $attendance->minutes }}</td>
            <td>{{ $attendance->id_employe }}</td>
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

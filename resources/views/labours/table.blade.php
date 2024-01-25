<div class="table-responsive">
    <table class="table table-hover shadow mb-3 rounded" id="labours-table">
        <thead>
            <tr>
                <th>Cargo</th>
                <th>Salario</th>
                <th>Valor minuto</th>
                <th colspan="2">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($labours as $labour)
            <tr>
                <td>{{ $labour->position }}</td>
                <td>{{ $labour->salary }}</td>
                <td>{{ $labour->labor_value }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['labours.destroy', $labour->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('labours.edit', [$labour->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-edit" style="color: #6c6d77"></i>
                        </a>
                        {!! Form::button('<i class="far fa-trash-alt" style="color: #da1b1b"></i>', ['type' => 'submit', 'class' => 'btn
                        btn-default btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
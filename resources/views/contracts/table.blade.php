<div class="table-responsive">
    <table class="table" id="contracts-table">
        <thead>
            <tr>
            <th>Empleado</th>
            <th>Salario</th>
            <th>Inicio de contrato</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($contracts as $contracts)
            <tr>
                <td>{{ $contracts->employe_id ? $contracts->employe->name : 'Sin ID' }}</td>
                <td>{{ $contracts->salary }}</td>
                <td>{{ $contracts->start_date_contract }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['contracts.destroy', $contracts->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('contracts.show', [$contracts->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('contracts.edit', [$contracts->id]) }}"
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

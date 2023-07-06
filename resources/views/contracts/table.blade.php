<div class="table-responsive">
    <table class="table" id="contracts-table">
        <thead>
            <tr>
                <th>Empleado</th>
                <th>Salario</th>
                <th>Inicio de contrato</th>
                <th>Deshabilitado</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($contracts as $contract)
            <tr>
                <td>{{ $contract->employe_id ? $contract->employe->name : 'Sin ID' }}</td>
                <td>{{ $contract->salary }}</td>
                <td>{{ $contract->start_date_contract->format('Y-m-d') }}</td>
                <td class="text-center">{{ $contract->disable }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['contracts.destroy', $contract->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        @can('show_contracts')
                        <a href="{{ route('contracts.show', [$contract->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye" style="color: #13A4DA"></i>
                        </a>
                        @endcan
                        @can('update_contracts')
                        <a href="{{ route('contracts.edit', [$contract->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-edit" style="color: #6c6d77"></i>
                        </a>
                        @endcan
                        @can('destroy_contracts')
                        {!! Form::button('<i class="far fa-trash-alt" style="color: #da1b1b"></i>', ['type' => 'submit', 'class' => 'btn
                        btn-default btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                        @endcan
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<div class="card-footer mr-auto" style="background-color: white">
    {{ $contracts->links() }}
</div>
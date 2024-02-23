<div class="table-responsive">
    <table class="table table-hover shadow mb-3 rounded" id="msurgeryProcedures-table">
        <thead>
        <tr>
            <th># servicio</th>
            <th>Procedimiento</th>
            <th>Tipo</th>
            <th>Cantidad</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($msurgeryProcedures as $msurgeryProcedure)
            <tr>
                <td>{{ $msurgeryProcedure->cod_surgical_act }}</td>
                <td>{{ $msurgeryProcedure->code_procedure ? $msurgeryProcedure->procedures->description : 'Sin ID' }}</td>
                <td>{{ $msurgeryProcedure->type }}</td>
                <td>{{ $msurgeryProcedure->amount }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['msurgeryProcedures.destroy', $msurgeryProcedure->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('msurgeryProcedures.show', [$msurgeryProcedure->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye" style="color: #13A4DA"></i>
                        </a>
                        <a href="{{ route('msurgeryProcedures.edit', [$msurgeryProcedure->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-edit" style="color: #6c6d77"></i>
                        </a>
                        {!! Form::button('<i class="far fa-trash-alt" style="color: #da1b1b"></i>', ['type' => 'submit', 'class' => 'btn btn-default btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

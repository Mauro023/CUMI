<div class="table-responsive">
    <table class="table" id="msurgeryProcedures-table">
        <thead>
        <tr>
            <th>Amount</th>
        <th>Type</th>
        <th>Mcod Surgical Act</th>
        <th>Code Procedure</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($msurgeryProcedures as $msurgeryProcedure)
            <tr>
                <td>{{ $msurgeryProcedure->amount }}</td>
            <td>{{ $msurgeryProcedure->type }}</td>
            <td>{{ $msurgeryProcedure->cod_surgical_act }}</td>
            <td>{{ $msurgeryProcedure->code_procedure }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['msurgeryProcedures.destroy', $msurgeryProcedure->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('msurgeryProcedures.show', [$msurgeryProcedure->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('msurgeryProcedures.edit', [$msurgeryProcedure->id]) }}"
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

<div class="table-responsive">
    <table class="table" id="logOperationCosts-table">
        <thead>
        <tr>
            <th>Percentage Uvr</th>
        <th>Time Procedure</th>
        <th>Doctor Percentage</th>
        <th>Doctor Fees</th>
        <th>Anest Percentage</th>
        <th>Anest Fees</th>
        <th>Total Uvr</th>
        <th>Room Cost</th>
        <th>Gases</th>
        <th>Labour</th>
        <th>Cod Surgical Act</th>
        <th>Code Procedure</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($logOperationCosts as $logOperationCost)
            <tr>
                <td>{{ $logOperationCost->percentage_uvr }}</td>
            <td>{{ $logOperationCost->time_procedure }}</td>
            <td>{{ $logOperationCost->doctor_percentage }}</td>
            <td>{{ $logOperationCost->doctor_fees }}</td>
            <td>{{ $logOperationCost->anest_percentage }}</td>
            <td>{{ $logOperationCost->anest_fees }}</td>
            <td>{{ $logOperationCost->total_uvr }}</td>
            <td>{{ $logOperationCost->room_cost }}</td>
            <td>{{ $logOperationCost->gases }}</td>
            <td>{{ $logOperationCost->labour }}</td>
            <td>{{ $logOperationCost->cod_surgical_act }}</td>
            <td>{{ $logOperationCost->code_procedure }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['logOperationCosts.destroy', $logOperationCost->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('logOperationCosts.show', [$logOperationCost->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('logOperationCosts.edit', [$logOperationCost->id]) }}"
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

<div class="table-responsive">
    <table class="table table table-hover shadow mb-3 rounded" id="logOperationCosts-table">
        <thead>
        <tr>
            <th>N servicio</th>
            <th>Procedimiento</th>
            <th>%Uvr</th>
            <th>Tiempo</th>
            <th>Médico</th>
            <th>Anestesiologo</th>
            <th>Derecho sala</th>
            <th>Gases</th>
            <th>Mano obra</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($logOperationCosts as $logOperationCost)
            <tr>
                <td>{{ $logOperationCost->cod_surgical_act }}</td>
                <td>{{ $logOperationCost->code_procedure }}</td>
                <td>{{ $logOperationCost->percentage_uvr }}%</td>
                <td>{{ $logOperationCost->time_procedure }}</td>
                <td>{{ number_format($logOperationCost->doctor_fees, 0, ',', '.'); }}
                    <br>
                    <small style="color: #69C5A0"><strong>{{ $logOperationCost->doctor_percentage }}%</strong></small>
                </td>
                <td>{{ number_format($logOperationCost->anest_fees, 0, ',', '.'); }}
                    <br>
                    <small style="color: #69C5A0"><strong>{{ $logOperationCost->anest_percentage }}%</strong></small>
                </td>
                <td>{{ number_format($logOperationCost->room_cost, 0, ',', '.'); }}</td>
                <td>{{ number_format($logOperationCost->gases, 0, ',', '.'); }}</td>
                <td>{{ number_format($logOperationCost->labour, 0, ',', '.'); }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['logOperationCosts.destroy', $logOperationCost->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('logOperationCosts.show', [$logOperationCost->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye" style="color: #13A4DA"></i>
                        </a>
                        <a href="{{ route('logOperationCosts.edit', [$logOperationCost->id]) }}"
                           class='btn btn-default btn-xs' style="color: #6c6d77">
                            <i class="far fa-edit"></i>
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

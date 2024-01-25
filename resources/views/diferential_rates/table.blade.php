<div class="table-responsive">
    <table class="table table-hover shadow mb-3 rounded" id="diferentialRates-table">
        <thead>
            <tr>
                <th>Médico</th>
                <th>Procedimiento</th>
                <th>Pago fijo</th>
                <th>Disponibilidad pago</th>
                <th>Valor 1</th>
                <th>Valor 2</th>
                <th colspan="2">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($diferentialRates as $diferentialRate)
            <tr>
                <td>{{ $diferentialRate->id_doctor}}</td>
                <td>{{ $diferentialRate->id_procedure ? $diferentialRate->procedures->description : 'Sin ID' }}</td>
                <td>{{ $diferentialRate->fixed_amount }}</td>
                <td>{{ $diferentialRate->payment_availability }}</td>
                <td>{{ $diferentialRate->value1 }}</td>
                <td>{{ $diferentialRate->value2 }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['diferentialRates.destroy', $diferentialRate->id], 'method' =>
                    'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('diferentialRates.show', [$diferentialRate->id]) }}"
                            class='btn btn-default btn-xs'>
                            <i class="far fa-eye" style="color: #13A4DA"></i>
                        </a>
                        <a href="{{ route('diferentialRates.edit', [$diferentialRate->id]) }}"
                            class='btn btn-default btn-xs'>
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
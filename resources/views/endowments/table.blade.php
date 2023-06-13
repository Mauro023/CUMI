<div class="table-responsive">
    <table class="table" id="endowments-table">
        <thead>
            <tr>
                <th>Empleado</th>
                <th>Dotacion</th>
                <th>Fecha e entrega</th>
                <th>Firma del empleado</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($endowments as $endowment)
            <tr>
                <td>{{ $endowment->contract_id ? $endowment->contracts->employe->name : 'SIN ID'}}</td>
                <td>
                    @php
                        $items = json_decode($endowment->item);
                        if (is_array($items)) {
                            echo implode(', ', $items);
                        } else {
                            echo $items;
                        }
                    @endphp
                </td>
                <td>{{ $endowment->deliver_date->format('Y-m-d') }}</td>
                <td><img src="{{ $endowment->employe_signature }}" alt="Firma del empleado"></td>
                <td width="120">
                    {!! Form::open(['route' => ['endowments.destroy', $endowment->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('endowments.show', [$endowment->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('endowments.edit', [$endowment->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-edit"></i>
                        </a>
                        {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn
                        btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
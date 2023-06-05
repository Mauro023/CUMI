<div class="table-responsive">
    <table class="table" id="endowments-table">
        <thead>
            <tr>
                <th>Item</th>
                <th>Deliver Date</th>
                <th>Employe Signature</th>
                <th>Contract Id</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($endowments as $endowment)
            <tr>
                <td>{{ $endowment->item }}</td>
                <td>{{ $endowment->deliver_date }}</td>
                <td>{{ $endowment->employe_signature }}</td>
                <td>{{ $endowment->contract_id }}</td>
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
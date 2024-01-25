<div class="table-responsive">
    <table class="table" id="generalCosts-table">
        <thead>
            <tr>
                <th>Descripcion</th>
                <th>Valor</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($generalCosts as $generalCosts)
            <tr>
                <td>{{ $generalCosts->description }}</td>
                <td>{{ $generalCosts->value}}</td>
                <td width="120">
                    {!! Form::open(['route' => ['generalCosts.destroy', $generalCosts->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('generalCosts.show', [$generalCosts->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('generalCosts.edit', [$generalCosts->id]) }}" class='btn btn-default btn-xs'>
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
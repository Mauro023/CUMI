<div class="table-responsive">
    <table class="table" id="employes-table">
        <thead>
        <tr>
            <th>Identificacion</th>
        <th>Nombre</th>
        <th>Cargo</th>
            <th colspan="3">Acciones</th>
        </tr>
        </thead>
        <tbody>
        @foreach($employes as $employe)
            <tr>
                <td>{{ $employe->dni }}</td>
            <td>{{ $employe->name }}</td>
            <td>{{ $employe->work_position }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['employes.destroy', $employe->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('employes.show', [$employe->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('employes.edit', [$employe->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-edit"></i>
                        </a>
                        {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Se necesita confirmacion para realizar este proceso')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

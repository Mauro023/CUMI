<div class="table-responsive">
    <table class="table" id="invimaRegistrations-table">
        <thead>
        <tr>
            <th>Registro sanitario</th>
            <th>Vigencia de registro</th>
            <th>Laboratorio fabricante</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($invimaRegistrations as $invimaRegistration)
            <tr>
                <td>{{ $invimaRegistration->health_register }}</td>
            <td>{{ $invimaRegistration->validity_registration }}</td>
            <td>{{ $invimaRegistration->laboratory_manufacturer }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['invimaRegistrations.destroy', $invimaRegistration->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('invimaRegistrations.show', [$invimaRegistration->id]) }}"
                           class='btn btn-default btn-xs' style="color: #13A4DA">
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('invimaRegistrations.edit', [$invimaRegistration->id]) }}"
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

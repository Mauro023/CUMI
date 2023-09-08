<div class="table-responsive">
    <table class="table" id="medicines-table">
        <thead>
        <tr>
            <th>Fecha ingreso</th>
            <th># Acta</th>
            <th>Nombre generico</th>
            <th>Numero lote</th>
            <th>Registro sanitario</th>
            <th>Ingresado por</th>
            <th>Estado</th>
            <th colspan="3">Acciones</th>
        </tr>
        </thead>
        <tbody>
        @foreach($medicines as $medicine)
            <tr>
                <td>{{ $medicine->admission_date->format('Y-m-d') }}</td>
                <td class="text-center">{{ $medicine->act_number }}</td>
                <td>{{ $medicine->generic_name }}
                    <br>
                    <small style="color: #69C5A0"><strong>{{ $medicine->concentration }}</strong></small>
                    <small style="color: #69C5A0"><strong>{{ $medicine->pharmaceutical_form }}</strong></small></td>
                <td>{{ $medicine->lot_number }}</td>
                <td>{{ $medicine->invima_registrations_id ? $medicine->invima_registration->health_register : 'Sin ID'}}
                <br>
                <small style="color: #69C5A0"><strong>
                    {{ $medicine->invima_registrations_id ? $medicine->invima_registration->laboratory_manufacturer : 'Sin ID'}}</strong></small>
                </td>
                <td>{{ $medicine->entered_by }}</td>
                <td>{{ $medicine->state }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['medicines.destroy', $medicine->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('medicines.show', [$medicine->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye" style="color: #13A4DA"></i>
                        </a>
                        <a href="{{ route('medicines.edit', [$medicine->id]) }}"
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

<div class="table-responsive">
    <table class="table" id="medicationTemplates-table">
        <thead>
        <tr>
            <th>Template Name</th>
        <th>Generic Namet</th>
        <th>Tradenamet</th>
        <th>Concentrationt</th>
        <th>Pharmaceutical Formt</th>
        <th>Presentationt</th>
        <th>Registration Validityt</th>
        <th>Manufacturer Laboratoryt</th>
        <th>Received Amountt</th>
        <th>Samplet</th>
        <th>Invima Registrations Id</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($medicationTemplates as $medicationTemplate)
            <tr>
                <td>{{ $medicationTemplate->template_name }}</td>
            <td>{{ $medicationTemplate->generic_namet }}</td>
            <td>{{ $medicationTemplate->tradenamet }}</td>
            <td>{{ $medicationTemplate->concentrationt }}</td>
            <td>{{ $medicationTemplate->pharmaceutical_formt }}</td>
            <td>{{ $medicationTemplate->presentationt }}</td>
            <td>{{ $medicationTemplate->registration_validityt }}</td>
            <td>{{ $medicationTemplate->manufacturer_laboratoryt }}</td>
            <td>{{ $medicationTemplate->received_amountt }}</td>
            <td>{{ $medicationTemplate->samplet }}</td>
            <td>{{ $medicationTemplate->invima_registrations_id }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['medicationTemplates.destroy', $medicationTemplate->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('medicationTemplates.show', [$medicationTemplate->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('medicationTemplates.edit', [$medicationTemplate->id]) }}"
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

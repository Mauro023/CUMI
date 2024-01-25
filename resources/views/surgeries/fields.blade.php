<!-- Start Time Field -->
<div class="form-group col-sm-6">
    {!! Form::label('start_time', 'Hora inicio:') !!}
    {!! Form::text('start_time', null, ['class' => 'form-control','id'=>'start_time']) !!}
</div>

@push('page_scripts')
<script type="text/javascript">
    $('#start_time').datetimepicker({
            format: 'HH:mm:ss',
            useCurrent: true,
            sideBySide: true
        })
</script>
@endpush

<!-- End Time Field -->
<div class="form-group col-sm-6">
    {!! Form::label('end_time', 'Hora final:') !!}
    {!! Form::text('end_time', null, ['class' => 'form-control','id'=>'end_time']) !!}
</div>

@push('page_scripts')
<script type="text/javascript">
    $('#end_time').datetimepicker({
            format: 'HH:mm:ss',
            useCurrent: true,
            sideBySide: true
        })
</script>
@endpush

<!-- Operating Room Field -->
<div class="form-group col-sm-6">
    {!! Form::label('operating_room', 'Quirofano:') !!}
    {!! Form::select('operating_room', [
        '1' => 'Quirofano 1', 
        '2' => 'Quirofano 2', 
        '3' => 'Quirofano 3', 
        '4' => 'Quirofano 4', 
        '5' => 'Quirofano 5'
    ], null, ['class' => 'form-control custom-select',
    'placeholder' => 'Seleccione el quirofano']) !!}
</div>


<!-- Cod Surgical Act Field -->
<div class="form-group col-sm-6">
    {!! Form::label('cod_surgical_act', 'Código acto quirurgico:') !!}
    {!! Form::text('cod_surgical_act', null, ['class' => 'form-control']) !!}
</div>

<!-- Study Number Field -->
<div class="form-group col-sm-6">
    {!! Form::label('study_number', 'Número de estúdio:') !!}
    {!! Form::number('study_number', null, ['class' => 'form-control']) !!}
</div>

<!-- Patient Field -->
<div class="form-group col-sm-6">
    {!! Form::label('patient', 'Paciente:') !!}
    {!! Form::number('patient', null, ['class' => 'form-control']) !!}
</div>

<!-- Name Patient Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name_patient', 'Nombre paciente:') !!}
    {!! Form::text('name_patient', null, ['class' => 'form-control']) !!}
</div>

<!-- Id Labours Field -->
<div class="form-group col-sm-6">
    {!! Form::label('labours', 'Mano de obra:') !!}
    {!! Form::text('labours', $labours, null, ['class' => 'form-control custom-select', 'placeholder' => 'Seleccione la mano de obra']) !!}
</div>

<!-- Id Doctor Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id_doctor', 'Médico:') !!}
    {!! Form::select('id_doctor', $doctors, null, ['class' => 'form-control custom-select', 'placeholder' => 'seleccione el médico']) !!}
</div>

<!-- Id Doctor Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id_doctor2', 'Médico 2:') !!}
    {!! Form::select('id_doctor2', $doctors, null, ['class' => 'form-control custom-select', 'placeholder' => 'seleccione el médico']) !!}
</div>

<!-- Id Anesthesiologist Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id_anesthesiologist', 'Anestesiologo:') !!}
    {!! Form::select('id_anesthesiologist', $anesthesiologists, null, ['class' => 'form-control custom-select', 'placeholder' => 'Seleccione el anestesiologo']) !!}
</div>

<!-- Id Procedures Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id_procedures', 'Procedimiento:') !!}
    {!! Form::select('id_procedures', $procedures, null, ['class' => 'form-control custom-select', 'placeholder' => 'Seleccione el procedimiento']) !!}
</div>
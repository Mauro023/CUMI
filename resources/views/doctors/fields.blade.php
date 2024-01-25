<!-- Dni Field -->
<div class="form-group col-sm-6">
    {!! Form::label('dni', 'Dni:') !!}
    {!! Form::text('dni', null, ['class' => 'form-control']) !!}
</div>

<!-- Full Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('full_name', 'Nombre:') !!}
    {!! Form::text('full_name', null, ['class' => 'form-control']) !!}
</div>

<!-- Specialty Field -->
<div class="form-group col-sm-6">
    {!! Form::label('specialty', 'Especialidad:') !!}
    {!! Form::text('specialty', null, ['class' => 'form-control']) !!}
</div>

<!-- Id Rates Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id_rates', 'Tarifa diferencial:') !!}
    {!! Form::select('id_rates', $rates, null, ['class' => 'form-control custom-select']) !!}
</div>


<!-- Id Fees Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id_fees', 'Honorario médico:') !!}
    {!! Form::select('id_fees', $fees, null, ['class' => 'form-control custom-select']) !!}
</div>
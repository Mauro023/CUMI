<!-- Employe Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('dni', 'Identificacion:') !!}
    {!! Form::text('dni', null, ['class' => 'form-control']) !!}
</div>

<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Nombre:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Work Position Field -->
<div class="form-group col-sm-6">
    {!! Form::label('work_position', 'Cargo:') !!}
    {!! Form::text('work_position', null, ['class' => 'form-control']) !!}
</div>
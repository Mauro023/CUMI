<!-- manual_type Field -->
<div class="form-group col-sm-6">
    {!! Form::label('manual_type', 'Tipo de manual:') !!}
    {!! Form::text('manual_type', null, ['class' => 'form-control']) !!}
</div>

<!-- Description Field -->
<div class="form-group col-sm-6">
    {!! Form::label('description', 'Descripcion:') !!}
    {!! Form::text('description', null, ['class' => 'form-control']) !!}
</div>

<!-- Cups Field -->
<div class="form-group col-sm-6">
    {!! Form::label('cups', 'Cups:') !!}
    {!! Form::text('cups', null, ['class' => 'form-control']) !!}
</div>

<!-- Uvr Field -->
<div class="form-group col-sm-6">
    {!! Form::label('uvr', 'Uvr:') !!}
    {!! Form::number('uvr', null, ['class' => 'form-control']) !!}
</div>

<!-- Procedure Value Field -->
<div class="form-group col-sm-6">
    {!! Form::label('procedure_value', 'Valor:') !!}
    {!! Form::number('procedure_value', null, ['class' => 'form-control']) !!}
</div>
<!-- code Field -->
<div class="form-group col-sm-6">
    {!! Form::label('code', 'Código:') !!}
    {!! Form::text('code', null, ['class' => 'form-control']) !!}
</div>

<!-- manual_type Field -->
<div class="form-group col-sm-6">
    {!! Form::label('manual_type', 'Tipo de manual:') !!}
    {!! Form::select('manual_type', [
        "256" => "256",
        "SOAT" => "SOAT",
        "ins" => "ins",
        "INF" => "INF"
    ] ,null, ['class' => 'form-control custom-select', 'placeholder' => 'Seleccione un tipo de manual']) !!}
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

<!-- Uvr Field -->
<div class="form-group col-sm-6">
    {!! Form::label('uvt', 'Uvt:') !!}
    {!! Form::number('uvt', null, ['class' => 'form-control']) !!}
</div>

<!-- Procedure Value Field -->
{{-- <div class="form-group col-sm-6">
    {!! Form::label('procedure_value', 'Valor:') !!}
    {!! Form::number('procedure_value', null, ['class' => 'form-control']) !!}
</div> --}}
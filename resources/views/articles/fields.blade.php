<!-- Item Code Field -->
<div class="form-group col-sm-6">
    {!! Form::label('item_code', 'Codigo:') !!}
    {!! Form::number('item_code', null, ['class' => 'form-control']) !!}
</div>

<!-- Description Field -->
<div class="form-group col-sm-6">
    {!! Form::label('description', 'Descripcion:') !!}
    {!! Form::text('description', null, ['class' => 'form-control']) !!}
</div>

<!-- Type Field -->
<div class="form-group col-sm-6">
    {!! Form::label('type', 'Tipo:') !!}
    {!! Form::text('type', null, ['class' => 'form-control']) !!}
</div>

<!-- Average Cost Field -->
<div class="form-group col-sm-6">
    {!! Form::label('average_cost', 'Costo promedio:') !!}
    {!! Form::number('average_cost', null, ['class' => 'form-control']) !!}
</div>

<!-- Last Cost Field -->
<div class="form-group col-sm-6">
    {!! Form::label('last_cost', 'Ultimo costo:') !!}
    {!! Form::number('last_cost', null, ['class' => 'form-control']) !!}
</div>
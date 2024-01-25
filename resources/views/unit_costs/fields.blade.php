<!-- Room Cost Field -->
<div class="form-group col-sm-6">
    {!! Form::label('room_cost', 'Derecho de sala:') !!}
    {!! Form::number('room_cost', null, ['class' => 'form-control']) !!}
</div>

<!-- Gas Field -->
<div class="form-group col-sm-6">
    {!! Form::label('gas', 'Gas:') !!}
    {!! Form::number('gas', null, ['class' => 'form-control']) !!}
</div>

<!-- Labour Field -->
<div class="form-group col-sm-6">
    {!! Form::label('labour', 'Mano de obra:') !!}
    {!! Form::number('labour', null, ['class' => 'form-control']) !!}
</div>

<!-- Basket Field -->
<div class="form-group col-sm-6">
    {!! Form::label('basket', 'Canasta:') !!}
    {!! Form::number('basket', null, ['class' => 'form-control']) !!}
</div>

<!-- Medical Fees Field -->
<div class="form-group col-sm-6">
    {!! Form::label('medical_fees', 'Honorarios médicos:') !!}
    {!! Form::number('medical_fees', null, ['class' => 'form-control']) !!}
</div>

<!-- Id Consumables Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id_consumables', 'Consumibles:') !!}
    {!! Form::select('id_consumables', $consumables, null, ['class' => 'form-control custom-select']) !!}
</div>

<!-- Cod Surgical Act Field -->
<div class="form-group col-sm-6">
    {!! Form::label('cod_surgical_act', 'Codigo acto quirurgico:') !!}
    {!! Form::select('cod_surgical_act', $surgical_acts, null, ['class' => 'form-control custom-select']) !!}
</div>

<!-- Total Value Field -->
<div class="form-group col-sm-6">
    {!! Form::label('total_value', 'Valor total:') !!}
    {!! Form::number('total_value', null, ['class' => 'form-control']) !!}
</div>
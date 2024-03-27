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

<!-- Cod Surgical Act Field -->
<div class="form-group col-sm-6">
    {!! Form::label('cod_surgical_act', 'Codigo acto quirurgico:') !!}
    {!! Form::select('cod_surgical_act', $surgical_acts, null, ['class' => 'form-control custom-select']) !!}
</div>
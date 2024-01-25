<!-- Honorary Code Field -->
<div class="form-group col-sm-6">
    {!! Form::label('honorary_code', 'Código honorario:') !!}
    {!! Form::number('honorary_code', null, ['class' => 'form-control']) !!}
</div>

<!-- Payment Manual Field -->
<div class="form-group col-sm-6">
    {!! Form::label('payment_manual', 'Manual de pago:') !!}
    {!! Form::text('payment_manual', null, ['class' => 'form-control']) !!}
</div>
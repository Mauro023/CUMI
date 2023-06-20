<!-- Delivery Date Card Field -->
<div class="form-group col-sm-3">
    {!! Form::label('delivery_date_card', 'Fecha de entrega:') !!}
    {!! Form::text('delivery_date_card', null, ['class' => 'form-control','id'=>'delivery_date_card']) !!}
</div>

@push('page_scripts')
<script type="text/javascript">
    $('#delivery_date_card').datetimepicker({
            format: 'YYYY-MM-DD',
            useCurrent: true,
            sideBySide: true
        })
</script>
@endpush

<!-- Employe Id Field -->
<div class="form-group col-sm-3">
    {!! Form::label('employe_id', 'Empleado:') !!}
    {!! Form::select('employe_id', $employes, null, ['class' => 'form-control custom-select', 'placeholder' =>
    'Seleccione un empleado']) !!}
</div>

<!-- Card Item Field -->
<div class="form-group col-sm-6">
    {!! Form::hidden('card_item', 'Tarjeta', ['class' => 'form-control']) !!}
</div>

<div id="app">
    <div class="form-group col-sm-3">
        <template>
            {!! Form::label('signature', 'Firma del empleado:') !!}
            <signature-pad :initial-signature='@json($signature ?? null)' ref="signaturePad"></signature-pad>
        </template>
    </div>
</div>

<script src="{{ mix('js/app.js') }}"></script>
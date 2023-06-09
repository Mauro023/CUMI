<!-- Contract id Field -->
<div class="form-group col-sm-3">
    {!! Form::label('contract_id', 'Empleado:') !!}
    {!! Form::select('contract_id', $contracts->pluck('employe.name', 'id'), null, ['class' => 'form-control
    custom-select', 'placeholder' => 'Seleccione un empleado']) !!}
</div>

<!-- Deliver Date Field -->
<div class="form-group col-sm-3">
    {!! Form::label('deliver_date', 'Fecha de entrega:') !!}
    {!! Form::text('deliver_date', now()->format('Y-m-d'), ['class' => 'form-control','id'=>'deliver_date']) !!}
</div>

@push('page_scripts')
<script type="text/javascript">
    $('#deliver_date').datetimepicker({
        format: 'YYYY-MM-DD',
        useCurrent: true,
        sideBySide: true
    })
</script>
@endpush

<div id="app">
    <div class="form-group col-sm-3">
        {!! Form::label('Item', 'Item:') !!}
        {!! Form::hidden('checkboxInput', null, ['class' => 'form-control d-none', 'v-model' => 'checkboxInput']) !!}
        <input-component v-model="checkboxInput" :selected-items='@json($selectedItems ?? [])'></input-component>
    </div>
    <div class="form-group col-sm-3">
        <template>
            {!! Form::label('signature', 'Firma del empleado:') !!}
            {!! Form::hidden('employe_signature', null, ['class' => 'form-control d-none', 'v-model' =>
            'signatureInput']) !!}
            <signature-pad ref="signaturePad" v-model="signatureInput"></signature-pad>
        </template>
    </div>
</div>

<script src="{{ mix('js/app.js') }}"></script>
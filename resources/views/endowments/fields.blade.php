<!-- Contract id Field -->
<div class="form-group col-sm-3">
    {!! Form::label('contract_id', 'Empleado:') !!}
    {!! Form::select('contract_id', $contracts->pluck('employe.name', 'id'), null, ['class' => 'form-control
    custom-select', 'placeholder' => 'Seleccione un empleado']) !!}
</div>

<!-- Deliver Date Field -->
<div class="form-group col-sm-3">
    {!! Form::label('deliver_date', 'Fecha de entrega:') !!}
    {!! Form::text('deliver_date', null, ['class' => 'form-control','id'=>'deliver_date']) !!}
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
        <input-component :selected-items='@json($selectedItems ?? [])'></input-component>
    </div>
    <div class="form-group col-sm-3">
        <template>
            {!! Form::label('signature', 'Firma del empleado:') !!}
            <signature-pad :initial-signature='@json($signature ?? null)' ref="signaturePad"></signature-pad>
        </template>
    </div>
</div>

<script src="{{ asset('js/app.js') }}"></script>

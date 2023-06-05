<!-- Item Field -->
<div class="form-group col-sm-6">
    <div class="form-check">
        {!! Form::hidden('zapatos', 0, ['class' => 'form-check-input']) !!}
        {!! Form::checkbox('zapatos', '1', null, ['class' => 'form-check-input']) !!}
        {!! Form::label('zapatos', 'Zapatos', ['class' => 'form-check-label']) !!}
    </div>

    <div class="form-check">
        {!! Form::hidden('pantalon', 0, ['class' => 'form-check-input']) !!}
        {!! Form::checkbox('pantalon', '1', null, ['class' => 'form-check-input']) !!}
        {!! Form::label('pantalon', 'Pantalon', ['class' => 'form-check-label']) !!}
    </div>

    <div class="form-check">
        {!! Form::hidden('camisa', 0, ['class' => 'form-check-input']) !!}
        {!! Form::checkbox('camisa', '1', null, ['class' => 'form-check-input']) !!}
        {!! Form::label('camisa', 'Camisa', ['class' => 'form-check-label']) !!}
    </div>
</div>

<!-- Deliver Date Field -->
<div class="form-group col-sm-6">
    {!! Form::label('deliver_date', 'Deliver Date:') !!}
    {!! Form::text('deliver_date', null, ['class' => 'form-control','id'=>'deliver_date']) !!}
</div>

@push('page_scripts')
    <script type="text/javascript">
        $('#deliver_date').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: true,
            sideBySide: true
        })
    </script>
@endpush

<!-- Contract id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('contract_id', 'Contract Id:') !!}
    {!! Form::select('contract_id', $contracts->pluck('employe.name', 'id'), null, ['class' => 'form-control custom-select', 'placeholder' => 'Seleccione un contrato']) !!}
</div>


<!-- Employe Signature Field -->
<div class="form-group col-sm-6">
    {!! Form::label('employe_signature', 'Employe Signature:') !!}
    {!! Form::text('employe_signature', null, ['class' => 'form-control']) !!}
</div>
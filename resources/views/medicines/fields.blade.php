<div class="form-group row">
    <!-- Admission Date Field -->
    <div class="form-group col-sm-3">
        {!! Form::label('admission_date', 'Fecha de ingreso:') !!}
        {!! Form::text('admission_date', $today ?? '', ['class' => 'form-control','id'=>'admission_date']) !!}
    </div>
    <!-- Act Number Field -->
    <div class="form-group col-sm-3">
        {!! Form::label('act_number', 'Número de acta:') !!}
        {!! Form::number('act_number', $lastActNumber ?? '', ['class' => 'form-control']) !!}
    </div>
</div>

@push('page_scripts')
<script type="text/javascript">
    $('#admission_date').datetimepicker({
            format: 'YYYY-MM-DD',
            useCurrent: true,
            sideBySide: true
        })
</script>
@endpush

<!-- Medicine Field -->
<div id="app">
    <template>
        <reception-medicines :data='@json($plantilla ?? null)' :invima='@json($invima ?? null)' :medicine='@json($medicine ?? null)'></reception-medicines>
    </template>
</div>

<script src="{{ asset('js/app.js') }}"></script>

<div class="form-group row">
    <!-- Expiration Date Field -->
</div>

@push('page_scripts')
<script type="text/javascript">
    $('#expiration_date').datetimepicker({
        format: 'YYYY-MM-DD',
            useCurrent: true,
            sideBySide: true
        })
</script>
@endpush

<!-- Lot Number Field -->
<div class="form-group row">
    <div class="col-sm-3">
        {!! Form::label('expiration_date', 'Fecha de vencimiento:') !!}
        {!! Form::text('expiration_date', null, ['class' => 'form-control','id'=>'expiration_date']) !!}
    </div>
    <div class="col-sm-3">
        {!! Form::label('lot_number', 'Número de lote:') !!}
        {!! Form::text('lot_number', null, ['class' => 'form-control']) !!}
    </div>
    <!-- Supplier Field -->
    <div class="col-sm-3">
        {!! Form::label('supplier', 'Proveedor:') !!}
        {!! Form::text('supplier', null, ['class' => 'form-control']) !!}
    </div>
    <!-- Invoice Number Field -->
    <div class="col-sm-3">
        {!! Form::label('invoice_number', 'Número de factura:') !!}
        {!! Form::text('invoice_number', $lastFact ?? '', ['class' => 'form-control']) !!}
    </div>
</div>

@push('page_scripts')
<script type="text/javascript">
    $('#registration_validity').datetimepicker({
            format: 'YYYY-MM-DD',
            useCurrent: true,
            sideBySide: true
        })
</script>
@endpush

<!-- Purchase Order Field -->
<div class="form-group row">
    <div class="col-sm-8">
        <table class="table table-borderless table-centered">
            <thead>
                <tr>
                    <th></th>
                    <th>Cumple</th>
                    <th>No cumple</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        {!! Form::label('purchase_order', 'Comparacion con la orden de compra:') !!}
                    </td>
                    <td>
                        <div class="form-check">
                            {!! Form::radio('purchase_order', 'Cumple', True, ['class' => 'form-check-input']) !!}
                        </div>
                    </td>
                    <td>
                        <div class="form-check">
                            {!! Form::radio('purchase_order', 'No cumple', null, ['class' => 'form-check-input']) !!}
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<!-- Sample Field -->
<div class="form-group row">
    <!-- Arrival Temperature Field -->
    <div class="col-sm-3">
        {!! Form::label('arrival_temperature', 'Temperatura de llegada (°C):') !!}
        {!! Form::text('arrival_temperature', $temperature ?? '', ['class' => 'form-control']) !!}
    </div>
    <!-- Observations Field -->
    <div class="col-sm-3">
        {!! Form::label('observations', 'Observaciones:') !!}
        {!! Form::textArea('observations', null, ['class' => 'form-control', 'style' => 'height:40px']) !!}
    </div>
    <!-- Entered By Field -->
    <div class="col-sm-3">
        {!! Form::label('entered_by', 'Ingresado por:') !!}
        {!! Form::text('entered_by', Auth::user()->name, ['class' => 'form-control', 'readonly' => 'readonly']) !!}
    </div>
</div>

<!-- State Field -->
<div class="form-group row">
    <div class="col-sm-8">
        <table class="table table-centered table-borderless">
            <thead>
                <tr>
                    <th></th>
                    <th>Aceptado</th>
                    <th>Rechazado</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{!! Form::label('state', 'Estado:', ['class' => 'col-sm-6 col-form-label']) !!}</td>
                    <td>
                        <div class="form-check">
                            {!! Form::radio('state', 'Aceptado', true, ['class' => 'form-check-input']) !!}
                    </td>
    </div>
    <td>
        <div class="form-check">
            {!! Form::radio('state', 'Rechazado', null, ['class' => 'form-check-input']) !!}
    </td>
</div>
</tr>
</tbody>
</table>
</div>
</div>
<div class="form-group row">
    <!-- Admission Date Field -->
    {!! Form::label('admission_date', 'Fecha de ingreso:', ['class' => 'col-sm-2 col-form-label']) !!}
    <div class="col-sm-3">
        {!! Form::text('admission_date', now()->format('Y-m-d'), ['class' => 'form-control','id'=>'admission_date']) !!}
    </div>
    <!-- Act Number Field -->
    {!! Form::label('act_number', 'Número de acta:', ['class' => 'col-sm-2 col-form-label']) !!}
    <div class="col-sm-3">
        {!! Form::number('act_number', null, ['class' => 'form-control']) !!}
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

<div class="form-group row">
    <!-- Generic Name Field -->
    {!! Form::label('generic_name', 'Nombre generico:', ['class' => 'col-sm-2 col-form-label']) !!}
    <div class="col-sm-3">
        {!! Form::text('generic_name', null, ['class' => 'form-control']) !!}
    </div>
    <!-- Tradename Field -->
    {!! Form::label('tradename', 'Nombre comercial:', ['class' => 'col-sm-2 col-form-label']) !!}
    <div class="col-sm-3">
        {!! Form::text('tradename', null, ['class' => 'form-control']) !!}
    </div>
</div>

<!-- Concentration Field -->
<div class="form-group row">
    {!! Form::label('concentration', 'Concentracion:', ['class' => 'col-sm-2 col-form-label']) !!}
    <div class="col-sm-3">
        {!! Form::text('concentration', null, ['class' => 'form-control']) !!}
    </div>
</div>

<!-- Medicine Field -->
<div id="app">
    <template>
        <reception-medicines></reception-medicines>
    </template>
</div>

<script src="{{ mix('js/app.js') }}"></script>

<div class="form-group row">
    <!-- Expiration Date Field -->
    {!! Form::label('expiration_date', 'Fecha de vencimiento:', ['class' => 'col-sm-2 col-form-label']) !!}
    <div class="col-sm-3">
        {!! Form::text('expiration_date', null, ['class' => 'form-control','id'=>'expiration_date']) !!}
    </div>
    <!-- Presentation Field -->
    {!! Form::label('presentation', 'Presentacion:', ['class' => 'col-sm-2 col-form-label']) !!}
    <div class="col-sm-3">
        {!! Form::text('presentation', null, ['class' => 'form-control']) !!}
    </div>
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
    {!! Form::label('lot_number', 'Número de lote:', ['class' => 'col-sm-2 col-form-label']) !!}
    <div class="col-sm-3">
        {!! Form::text('lot_number', null, ['class' => 'form-control']) !!}
    </div>
    <!-- Health Register Field -->
    {!! Form::label('health_register', 'Registro sanitario:', ['class' => 'col-sm-2 col-form-label']) !!}
    <div class="col-sm-3">
        {!! Form::text('health_register', null, ['class' => 'form-control']) !!}
    </div>
</div>

<div class="form-group row">
    <!-- Registration Validity Field -->
    {!! Form::label('registration_validity', 'Vigencia de registro:', ['class' => 'col-sm-2 col-form-label']) !!}
    <div class="col-sm-3">
        {!! Form::text('registration_validity', null, ['class' => 'form-control','id'=>'registration_validity']) !!}
    </div>
    <!-- Observation Record -->
    {!! Form::label('observation_record', 'Observacion de registro:', ['class' => 'col-sm-2 col-form-label']) !!}
    <div class="col-sm-3">
        {!! Form::textArea('observation_record', null, ['class' => 'form-control', 'style' => 'height:40px']) !!}
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

<div class="form-group row">
    <!-- Manufacturer Laboratory Field -->
    {!! Form::label('manufacturer_laboratory', 'Laboratorio fabricante:', ['class' => 'col-sm-2 col-form-label']) !!}
    <div class="col-sm-3">
        {!! Form::text('manufacturer_laboratory', null, ['class' => 'form-control']) !!}
    </div>
    <!-- Supplier Field -->
    {!! Form::label('supplier', 'Proveedor:', ['class' => 'col-sm-2 col-form-label']) !!}
    <div class="col-sm-3">
        {!! Form::text('supplier', null, ['class' => 'form-control']) !!}
    </div>
</div>

<div class="form-group row">
    <!-- Invoice Number Field -->
    {!! Form::label('invoice_number', 'Número de factura:', ['class' => 'col-sm-2 col-form-label']) !!}
    <div class="col-sm-3">
        {!! Form::text('invoice_number', null, ['class' => 'form-control']) !!}
    </div>
    <!-- Received Amount Field -->
    {!! Form::label('received_amount', 'Cantidad recibida:', ['class' => 'col-sm-2 col-form-label']) !!}
    <div class="col-sm-3">
        {!! Form::number('received_amount', null, ['class' => 'form-control']) !!}
    </div>
</div>

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
    {!! Form::label('sample', 'Muestras recibidas:', ['class' => 'col-sm-2 col-form-label']) !!}
    <div class="col-sm-3">
        {!! Form::number('sample', null, ['class' => 'form-control']) !!}
    </div>
    <!-- Arrival Temperature Field -->
    {!! Form::label('arrival_temperature', 'Temperatura de llegada (°C):', ['class' => 'col-sm-2 col-form-label']) !!}
    <div class="col-sm-3">
        {!! Form::text('arrival_temperature', null, ['class' => 'form-control']) !!}
    </div>
</div>

<!-- Observations Field -->
<div class="form-group row">
    {!! Form::label('observations', 'Observaciones:', ['class' => 'col-sm-2 col-form-label']) !!}
    <div class="col-sm-3">
        {!! Form::textArea('observations', null, ['class' => 'form-control', 'style' => 'height:40px']) !!}
    </div>
    <!-- Entered By Field -->
    {!! Form::label('entered_by', 'Ingresado por:', ['class' => 'col-sm-2 col-form-label']) !!}
    <div class="col-sm-3">
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
                            {!! Form::radio('state', 'Aceptado', true, ['class' => 'form-check-input']) !!}</td>
                        </div>
                    <td>
                        <div class="form-check">
                            {!! Form::radio('state', 'Rechazado', null, ['class' => 'form-check-input']) !!}</td>
                        </div>
                </tr>
            </tbody>
        </table>
    </div>
</div>
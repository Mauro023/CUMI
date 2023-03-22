<!-- start date Field -->
<div class="form-group col-sm-6">
    {!! Form::label('start_date', 'Fecha de inicio:') !!}
    {!! Form::text('start_date', null, ['class' => 'form-control','id'=>'start_date']) !!}
</div>

@push('page_scripts')
    <script type="text/javascript">
        $('#start_date').datetimepicker({
            format: 'YYYY-MM-DD',
            useCurrent: true,
            sideBySide: true
        })
    </script>
@endpush

<!-- end date Field -->
<div class="form-group col-sm-6">
    {!! Form::label('end_date', 'Fecha de fin:') !!}
    {!! Form::text('end_date', null, ['class' => 'form-control','id'=>'end_date']) !!}
</div>

@push('page_scripts')
    <script type="text/javascript">
        $('#end_date').datetimepicker({
            format: 'YYYY-MM-DD',
            useCurrent: true,
            sideBySide: true
        })
    </script>
@endpush

<!-- Entry time Field -->
<div class="form-group col-sm-6">
    {!! Form::label('entry_time', 'Hora de entrada:') !!}
    {!! Form::time('entry_time', null, ['class' => 'form-control']) !!}
</div>

<!-- Departure time Field -->
<div class="form-group col-sm-6">
    {!! Form::label('departure_time', 'Hora de salida:') !!}
    {!! Form::time('departure_time', null, ['class' => 'form-control']) !!}
</div>

<!-- Floor Field -->
<div class="form-group col-sm-6">
    {!! Form::label('floor', 'Piso:') !!}
    {!! Form::text('floor', null, ['class' => 'form-control']) !!}
</div>

<!-- Id Employe Field -->
<div class="form-group col-sm-6">
    {!! Form::label('employe_id', 'Nombre del empleado:') !!}
    {!! Form::select('employe_id', $employes, null, ['class' => 'form-control custom-select']) !!}
</div>

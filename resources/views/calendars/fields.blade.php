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
    {!! Form::select('floor', 
        [
            1 => 'Piso 1', 
            2 => 'Piso 2', 
            3 => 'Piso 3', 
            4 => 'Piso 4', 
            5 => 'Piso 5', 
            6 => 'Piso 6', 
            7 => 'Piso 7', 
            8 => 'Piso 8', 
            9 => 'Piso 9', 
            10 => 'Piso 10', 
            11 => 'Piso 11'
        ], null, ['class' => 'form-control']) !!}
</div>

<!-- Id Employe Field -->
<div class="form-group col-sm-6">
    {!! Form::label('employe_id', 'Nombre del empleado:') !!}
    {!! Form::select('employe_id', $employes, null, ['class' => 'form-control custom-select']) !!}
</div>

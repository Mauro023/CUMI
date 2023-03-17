<!-- Workday Field -->
<div class="form-group col-sm-6">
    {!! Form::label('workday', 'Calendario:') !!}
    {!! Form::text('workday[]', null, ['class' => 'form-control','id'=>'workday']) !!}
    
</div>

@push('page_scripts')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script type="text/javascript">
        flatpickr('#workday', {
            dateFormat: "Y-m-d",
            mode: "multiple",
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
    {!! Form::label('id_employe', 'Nombre del empleado:') !!}
    {!! Form::select('id_employe', $employes, null, ['class' => 'form-control custom-select']) !!}
</div>

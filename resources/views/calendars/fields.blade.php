<!-- Workday Field -->
<div class="form-group col-sm-6">
    {!! Form::label('workday', 'Workday:') !!}
    {!! Form::text('workday', null, ['class' => 'form-control','id'=>'workday']) !!}
</div>

@push('page_scripts')
    <script type="text/javascript">
        $('#workday').datetimepicker({
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
    {!! Form::label('floor', 'Floor:') !!}
    {!! Form::text('floor', null, ['class' => 'form-control']) !!}
</div>

<!-- Id Employe Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id_employe', 'Id Employe:') !!}
    {!! Form::select('id_employe', $employes, null, ['class' => 'form-control custom-select']) !!}
</div>
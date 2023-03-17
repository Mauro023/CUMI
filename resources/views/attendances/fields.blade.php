
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
    {!! Form::time('entry_time', date('H:i'), ['class' => 'form-control', 'disabled' => 'disabled']) !!}
</div>

<!-- Departure time Field -->
<div class="form-group col-sm-6">
    {!! Form::label('departure_time', 'Hora de salida:') !!}
    {!! Form::time('departure_time', null, ['class' => 'form-control']) !!}
</div>
<!-- Id Employe Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id_employe', 'Id Employe:') !!}
    {!! Form::select('id_employe', [], null, ['class' => 'form-control custom-select']) !!}
</div>

<!-- Workday Field -->
<div class="form-group col-sm-6">
    {!! Form::label('workday', 'Workday:') !!}
    {!! Form::text('workday', date('Y-m-d'), ['class' => 'form-control','id'=>'workday', 'disabled' => 'disabled']) !!}
</div>

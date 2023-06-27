<!-- Salary Field -->
<div class="form-group col-sm-6">
    {!! Form::label('salary', 'Salary:') !!}
    {!! Form::number('salary', null, ['class' => 'form-control']) !!}
</div>

<!-- Start Date Contract Field -->
<div class="form-group col-sm-6">
    {!! Form::label('start_date_contract', 'Start Date Contract:') !!}
    {!! Form::text('start_date_contract', null, ['class' => 'form-control','id'=>'start_date_contract']) !!}
</div>

<!-- Disable -->
<div class="form-group col-sm-6">
    {!! Form::label('disable', 'Disable:') !!}
    {!! Form::text('disable', null, ['class' => 'form-control']) !!}
</div>

@push('page_scripts')
    <script type="text/javascript">
        $('#start_date_contract').datetimepicker({
            format: 'YYYY-MM-DD',
            useCurrent: true,
            sideBySide: true
        })
    </script>
@endpush

<!-- Employe Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('employe_id', 'Employe Id:') !!}
    {!! Form::select('employe_id', $employes, null, ['class' => 'form-control custom-select']) !!}
</div>

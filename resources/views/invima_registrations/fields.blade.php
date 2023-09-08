<!-- Health Register Field -->
<div class="form-group col-sm-6">
    {!! Form::label('health_register', 'Registro sanitario:') !!}
    {!! Form::text('health_register', null, ['class' => 'form-control']) !!}
</div>

<!-- Validity Registration Field -->
<div class="form-group col-sm-6">
    {!! Form::label('validity_registration', 'Vigencia de registro:') !!}
    {!! Form::text('validity_registration', null, ['class' => 'form-control','id'=>'registration']) !!}
</div>

<!-- Laboratory Manufacturer Field -->
<div class="form-group col-sm-6">
    {!! Form::label('laboratory_manufacturer', 'Laboratorio fabricante:') !!}
    {!! Form::text('laboratory_manufacturer', null, ['class' => 'form-control']) !!}
</div>

@push('page_scripts')
    <script type="text/javascript">
        $('#registration').datetimepicker({
            format: 'YYYY-MM-DD',
            useCurrent: true,
            sideBySide: true
        })
    </script>
@endpush
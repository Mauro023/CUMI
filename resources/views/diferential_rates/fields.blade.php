<!-- Id Procedure Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id_doctor', 'Médico:') !!}
    {!! Form::select('id_doctor', $doctors, null, ['class' => 'form-control custom-select', 'placeholder' => 'Seleccione médico','id' => 'doctor']) !!}
</div>

<!-- Id Procedure Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id_procedure', 'Procedimiento:') !!}
    {!! Form::select('id_procedure', $procedures, null, ['class' => 'form-control custom-select', 'placeholder' => 'Seleccione procedimiento','id' => 'procedure']) !!}
</div>

<!-- Rate Code Field -->
<div class="form-group col-sm-6">
    {!! Form::label('fixed_amount', 'Pago fijo:') !!}
    {!! Form::number('fixed_amount', null, ['class' => 'form-control']) !!}
</div>

<!-- Value Field -->
<div class="form-group col-sm-6">
    {!! Form::label('payment_availability', 'Pago disponibilidad:') !!}
    {!! Form::number('payment_availability', null, ['class' => 'form-control']) !!}
</div>

<!-- Value Field -->
<div class="form-group col-sm-6">
    {!! Form::label('value1', 'Valor 1:') !!}
    {!! Form::number('value1', null, ['class' => 'form-control']) !!}
</div>

<!-- Value Field -->
<div class="form-group col-sm-6">
    {!! Form::label('value2', 'Valor 2:') !!}
    {!! Form::number('value2', null, ['class' => 'form-control']) !!}
</div>

<!-- Rate Description Field -->
<div class="form-group col-sm-6">
    {!! Form::label('observation_rates', 'Observacion:') !!}
    {!! Form::text('observation_rates', null, ['class' => 'form-control']) !!}
</div>
@push('page_scripts')
    <script type="text/javascript">
        $(document).ready(function() {
            $('#doctor').select2({
                placeholder: 'Seleccione un cargo',
                allowClear: true,
                width: '100%',
                theme: 'bootstrap4',
                language: {
                    noResults: function() {
                        return "No se encontraron resultados";
                    },
                    searching: function() {
                        return "Buscando...";
                    },
                }
            });
        });

        $(document).ready(function() {
            $('#procedure').select2({
                placeholder: 'Seleccione un servicio',
                allowClear: true,
                width: '100%',
                theme: 'bootstrap4',
                language: {
                    noResults: function() {
                        return "No se encontraron resultados";
                    },
                    searching: function() {
                        return "Buscando...";
                    },
                }
            });
        });
    </script>
@endpush
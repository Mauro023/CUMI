<!-- Consumable Quantity Field -->
<div class="form-group col-sm-6">
    {!! Form::label('consumable_quantity', 'Cantidad:') !!}
    {!! Form::text('consumable_quantity', null, ['class' => 'form-control']) !!}
</div>

<!-- Surgery Type Field -->
<div class="form-group col-sm-6">
    {!! Form::label('level', 'Nivel de cirugia:') !!}
    {!! Form::number('level', null, ['class' => 'form-control']) !!}
</div>

<!-- Id Article Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id_article', 'Articulo:') !!}
    {!! Form::select('id_article', $articles, null, ['class' => 'form-control custom-select', 'placeholder' => 'Seleccione el articulo','id' => 'article_id']) !!}
</div>

@push('page_scripts')
    <script type="text/javascript">
        $(document).ready(function() {
            $('#article_id').select2({
                placeholder: 'Seleccione un articulo',
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
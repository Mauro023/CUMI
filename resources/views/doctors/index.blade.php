@extends('layouts.app')

@section('content')
<div class="content px-3 mt-2">
    <div class="container-fluid">
        <div class="card shadow-none border-0">
            <div class="card-header d-flex justify-content-between align-items-center"
                style="background-color: white; padding: 0 0;">
                <h3 class="card-title m-0" style="color: #69C5A0; font-size: 25px;"><strong>Médicos</strong></h3>
                <div class="ml-auto d-flex align-items-center gap-2">
                    @can('create_doctors')
                    <a class="btn btn-default" data-bs-toggle="modal" data-bs-target="#prefactura"
                        title="Hacer prefactura">
                        <span class="fas fa-file-invoice" style="color: #69C5A0"></span>
                    </a>
                    <a href="{{ route('doctors.create') }}" class="btn btn-default" title="Agregar empleado">
                        <span class="fas fa-plus" style="color: #69C5A0"></span>
                    </a>
                    <a href="{{ route('get.doctors') }}" id="loaddoctorsBtn" class="btn btn-default"
                        title="Actualizar doctores">
                        <span class="fas fa-sync-alt" style="color: #69C5A0"></span>
                    </a>
                    @endcan
                </div>
            </div>
            <div class="card-body p-0">
                <form action="{{ route('doctors.index') }}" method="GET"
                    class="d-flex justify-content-between align-items-center">
                    <!-- Selector de registros por página (Mostrar) a la izquierda -->
                    <div class="form-group mb-3 mt-2">
                        <label for="perPageSelect" class="mr-2" style="color: #69C5A0">Mostrar:</label>
                        <select id="perPageSelect" name="per_page" class="form-select" style="border-radius: 20px"
                            onchange="this.form.submit()">
                            <option value="10" {{ $doctors->perPage() == 10 ? 'selected' : '' }}>10</option>
                            <option value="25" {{ $doctors->perPage() == 25 ? 'selected' : '' }}>25</option>
                            <option value="50" {{ $doctors->perPage() == 50 ? 'selected' : '' }}>50</option>
                            <option value="100" {{ $doctors->perPage() == 100 ? 'selected' : '' }}>100</option>
                        </select>
                    </div>

                    <!-- Botón de búsqueda (Buscar) a la derecha -->
                    <div class="form-group mb-0">
                        <div class="input-group">
                            <div class="input-group-append">
                                <button class="btn btn-default" type="submit"
                                    style="border-radius: 20px; color: #69C5A0"><strong>Buscar</strong></button>
                            </div>
                            <input type="text" class="form-control" name="search" placeholder="Buscar médico"
                                style="border-radius: 20px;">
                        </div>
                    </div>
                </form>

                <div class="card-panel">
                    @include('doctors.table')
                </div>
            </div>
        </div>
    </div>
    <div id="app">
    </div>
    <script src="{{ asset('js/app.js') }}"></script>
    @include('layouts.alerts')
</div>
<!-- Modal -->
<div class="modal fade" id="prefactura" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-default">
                <h5 class="modal-title" id="staticBackdropLabel"><strong>Datos prefactura</strong></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                {!! Form::open(['route' => 'python']) !!}
                <div class="card-body">
                    <div class="row">
                        <div class="form-group col-sm-12">
                            {!! Form::label('code_doctor', 'Médico:') !!}
                            {!! Form::select('code_doctor', [], null, ['class' => 'form-control custom-select',
                            'placeholder' => '','id' => 'doctor']) !!}
                        </div>
                        <div class="form-group col-sm-6">
                            {!! Form::label('start_date', 'Fecha inicial:') !!}
                            {!! Form::text('start_date', null, ['class' => 'form-control','id'=>'start_date']) !!}
                        </div>
                        <div class="form-group col-sm-6">
                            {!! Form::label('end_date', 'Fecha final:') !!}
                            {!! Form::text('end_date', null, ['class' => 'form-control','id'=>'end_date']) !!}
                        </div>
                    </div>
                </div>

                <div class="card-footer">
                    {!! Form::submit('Guardar', ['class' => 'btn btn-success', 'style' => 'color: white']) !!}
                    <a href="{{ route('doctors.index') }}" class="btn btn-secondary">Cancelar</a>
                </div>

                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection

@push('page_scripts')
<script type="text/javascript">
    $(document).ready(function() {
            $('#doctor').select2({
                dropdownParent: $('#prefactura .modal-body'),
                placeholder: 'Seleccione un médico',
                allowClear: true,
                width: '100%',
                theme: 'bootstrap4',
                ajax: {
                    url: '{{ route('search.doctor') }}',
                    dataType: 'json',
                    delay: 250,
                    processResults: function(data) {
                        return {
                            results: $.map(data, function(doctors) {
                                return {
                                    id: doctors.code,
                                    text: doctors.full_name
                                };
                            })
                        };
                    },
                    cache: true
                },
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

        $('#start_date').datetimepicker({
            format: 'YYYY-MM-DD',
            useCurrent: true,
            sideBySide: true
        })

        $('#end_date').datetimepicker({
            format: 'YYYY-MM-DD',
            useCurrent: true,
            sideBySide: true
        })
</script>
@endpush

<style>
    .select2-container {
        z-index: 1060;
        /* o cualquier otro valor alto que esté por debajo del modal */
    }

    @keyframes spin {
        from {
            transform: rotate(0deg);
        }

        to {
            transform: rotate(360deg);
        }
    }
</style>
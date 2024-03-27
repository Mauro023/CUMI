@extends('layouts.app')

@section('content')
<div class="content px-3 mt-2">
    <div class="container-fluid">
        <div class="card shadow-none border-0">
            <div class="card-header d-flex justify-content-between align-items-center"
                style="background-color: white; padding: 0 0;">
                <h3 class="card-title m-0" style="color: #69C5A0; font-size: 25px;"><strong>Procedimientos</strong></h3>
                <div class="ml-auto d-flex align-items-center gap-2">
                    @can('create_procedure')
                    <a href="{{ route('procedures.create') }}" class="btn btn-default" title="Agregar procedimiento">
                        <span class="fas fa-plus" style="color: #69C5A0"></span>
                    </a>
                    <a href="{{ route('get.procedures') }}" id="loadProceduresBtn" class="btn btn-default" title="Actualizar procedimientos">
                        <span class="fas fa-sync-alt" style="color: #69C5A0"></span>
                    </a>
                    @endcan
                </div>
            </div>
            <div class="card-body p-0">
                <form action="{{ route('procedures.index') }}" method="GET"
                    class="d-flex justify-content-between align-items-center">
                    <!-- Selector de registros por página (Mostrar) a la izquierda -->
                    <div class="form-group mb-3 mt-2">
                        <label for="perPageSelect" class="mr-2" style="color: #69C5A0">Mostrar:</label>
                        <select id="perPageSelect" name="per_page" class="form-select" style="border-radius: 20px"
                            onchange="this.form.submit()">
                            <option value="10" {{ $procedures->perPage() == 10 ? 'selected' : '' }}>10</option>
                            <option value="25" {{ $procedures->perPage() == 25 ? 'selected' : '' }}>25</option>
                            <option value="50" {{ $procedures->perPage() == 50 ? 'selected' : '' }}>50</option>
                            <option value="100" {{ $procedures->perPage() == 100 ? 'selected' : '' }}>100</option>
                            <option value="1000" {{ $procedures->perPage() == 1000 ? 'selected' : '' }}>1000</option>
                        </select>
                    </div>
                    <!-- Botón de búsqueda (Buscar) a la derecha -->
                    <div class="form-group mb-0">
                        <div class="input-group">
                            <div class="input-group-append">
                                <button class="btn btn-default" type="submit"
                                    style="border-radius: 20px; color: #69C5A0"><strong>Buscar</strong></button>
                            </div>
                            <input type="text" class="form-control" name="search" placeholder="Buscar procedimiento"
                                style="border-radius: 20px;">
                        </div>
                    </div>
                </form>

                <div class="card-panel">
                    @include('procedures.table')
                </div>
            </div>
        </div>
    </div>
    <div id="app">
    </div>
    <script src="{{ asset('js/app.js') }}"></script>
    @include('layouts.alerts')
</div>
@endsection

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var loadProceduresBtn = document.getElementById('loadProceduresBtn');

        loadProceduresBtn.addEventListener('click', function() {
            // Añade la clase 'loading' al botón cuando se hace clic
            loadProceduresBtn.classList.add('loading');

            // Simula la carga asincrónica
            setTimeout(function() {
                // Tu lógica para cargar los procedimientos aquí
                // ...

                // Después de un tiempo, quita la clase 'loading'
                loadProceduresBtn.classList.remove('loading');
            }, 2000); // Ajusta el tiempo según tus necesidades
        });
    });
</script>

<style>
    /* Añade un estilo para la animación de carga */
    .loading {
        animation: spin 1s infinite linear;
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

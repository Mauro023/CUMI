@extends('layouts.app')

@section('content')
<div class="content px-3 mt-2">
    <div class="container-fluid">
        <div class="card shadow-none border-0">
            <div class="card-header d-flex justify-content-between align-items-center" style="background-color: white; padding: 0 0;">
                <h3 class="card-title m-0" style="color: #69C5A0; font-size: 25px;"><strong>Empleados disponibles</strong></h3>
                <div class="ml-auto">
                    @can('create_employes')
                    <a href="{{ route('employes.create') }}" class="btn btn-default" title="Agregar empleado">
                        <span class="fas fa-user-plus" style="color: #69C5A0"></span>
                    </a>
                    <a href="{{ route('get.employee') }}" class="btn btn-default" title="Actualizar empleados">
                        <span class="fas fa-redo-alt" style="color: #69C5A0"></span>
                    </a>
                    @endcan           
                </div>
            </div>
            <div class="card-body p-0">
                <form action="{{ route('employes.index') }}" method="GET" class="d-flex justify-content-between align-items-center">
                    <!-- Selector de registros por página (Mostrar) a la izquierda -->
                    <div class="form-group mb-3 mt-2">
                        <label for="perPageSelect" class="mr-2" style="color: #69C5A0">Mostrar:</label>
                        <select id="perPageSelect" name="per_page" class="form-select" style="border-radius: 20px" onchange="this.form.submit()">
                            <option value="10" {{ $employes->perPage() == 10 ? 'selected' : '' }}>10</option>
                            <option value="25" {{ $employes->perPage() == 25 ? 'selected' : '' }}>25</option>
                            <option value="50" {{ $employes->perPage() == 50 ? 'selected' : '' }}>50</option>
                            <option value="100" {{ $employes->perPage() == 100 ? 'selected' : '' }}>100</option>
                        </select>
                    </div>
                    
                    <!-- Botón de búsqueda (Buscar) a la derecha -->
                    <div class="form-group mb-0">
                        <div class="input-group">
                            <div class="input-group-append">
                                <button class="btn btn-default" type="submit" style="border-radius: 20px; color: #69C5A0"><strong>Buscar</strong></button>
                            </div>
                            <input type="text" class="form-control" name="search" placeholder="Buscar empleado" style="border-radius: 20px;">
                        </div>
                    </div>
                </form>
                
                <div class="card-panel">
                    @include('employes.table')
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
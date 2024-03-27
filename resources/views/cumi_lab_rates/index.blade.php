@extends('layouts.app')

@section('content')
<div class="content px-3 mt-2">
    <div class="container-fluid">
        <div class="card shadow-none border-0">
            <div class="card-header d-flex justify-content-between align-items-center"
                style="background-color: white; padding: 0 0;">
                <h3 class="card-title m-0" style="color: #69C5A0; font-size: 25px;"><strong>Tarifas CumiLab <span>{{ $first->period }}</span></strong>
                </h3>
                <div class="ml-auto">
                    @can('view_surgeries')
                    <a class="btn btn-default" data-bs-toggle="modal" data-bs-target="#importar"
                        title="Importar tarifas">
                        <span class="fas fa-file-import" style="color: #69C5A0"></span>
                    </a>
                    <a href="{{ route('cumilab.calculateLab') }}" class="btn btn-default" title="Calcular tarifas">
                        <span class="fas fa-calculator" style="color: #69C5A0"></span>
                    </a>
                    <a href="{{ route('cumiLabRates.create') }}" class="btn btn-default" title="Agregar tarifa">
                        <span class="fas fa-plus" style="color: #69C5A0"></span>
                    </a>
                    @endcan
                </div>
            </div>
            <div class="card-body p-0">

                <form action="{{ route('cumiLabRates.index') }}" method="GET"
                    class="d-flex justify-content-between align-items-center">
                    <!-- Selector de registros por página (Mostrar) a la izquierda -->
                    <div class="form-group mb-3 mt-2">
                        <label for="perPageSelect" class="mr-2" style="color: #69C5A0">Mostrar:</label>
                        <select id="perPageSelect" name="per_page" class="form-select" style="border-radius: 20px"
                            onchange="this.form.submit()">
                            <option value="10" {{ $cumiLabRates->perPage() == 10 ? 'selected' : '' }}>10</option>
                            <option value="25" {{ $cumiLabRates->perPage() == 25 ? 'selected' : '' }}>25</option>
                            <option value="50" {{ $cumiLabRates->perPage() == 50 ? 'selected' : '' }}>50</option>
                            <option value="100" {{ $cumiLabRates->perPage() == 100 ? 'selected' : '' }}>100</option>
                        </select>
                    </div>

                    <!-- Botón de búsqueda (Buscar) a la derecha -->
                    <div class="form-group mb-0">
                        <div class="input-group">
                            <div class="input-group-append">
                                <button class="btn btn-default" type="submit"
                                    style="border-radius: 20px; color: #69C5A0"><strong>Buscar</strong></button>
                            </div>
                            <input type="text" class="form-control" name="search" placeholder="Buscar tarifa"
                                style="border-radius: 20px;">
                        </div>
                    </div>
                </form>

                <div class="card-panel">
                    @include('cumi_lab_rates.table')
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
<div class="modal fade" id="importar" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-default">
                <h5 class="modal-title" id="staticBackdropLabel"><strong>Importar archivo excel</strong></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('importlab') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="file" name="file" class="file">
                    <!-- Resto de tus campos del formulario -->
                    <button type="submit" class="send">Cargar</button>
                </form>
            </div>
        </div>
    </div>
</div>

<style>
    .send{
        color: white;
        background-color: #69C5A0;
        border: none;
        padding: 10px 15px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin: 4px 2px;
        cursor: pointer;
        border-radius: 30px;
        font-weight: bold;
    }
</style>
@endsection
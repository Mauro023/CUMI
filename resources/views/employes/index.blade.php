@extends('layouts.app')

@section('content')
<section class="content-header">
</section>
<div class="content px-3">
    <div class="container-fluid">
        <div class="card shadow-none border-0">
            <div class="card-header d-flex justify-content-between align-items-center" style="background-color: white; padding: 0 0;">
                <h3 class="card-title m-0" style="color: #69C5A0; font-size: 25px;"><strong>Empleados disponibles</strong></h3>
                <div class="ml-auto">
                    @can('create_employes')
                    <a href="{{ route('employes.create') }}" class="btn btn-default">
                        <span class="fas fa-user-plus" style="color: #69C5A0"></span>
                    </a>
                    <a href="{{ route('get.employee') }}" class="boton-redondeado"><b>Actualizar</b></a>
                    @endcan           
                </div>
            </div>
            <div class="card-body p-0">
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



<style>
    .boton-redondeado {
        border-radius: 30px;
        padding: 7px 20px;
        background-color: #69C5A0;
        color: white;
        border: none;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 14px;
        cursor: pointer;
        margin-bottom: 3px;
    }

    .boton-redondeado:hover {
        color: white;
    }
</style>
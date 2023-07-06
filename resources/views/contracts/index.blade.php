@extends('layouts.app')

@section('content')
<div class="content px-3">
    <div class="container-fluid">
        @include('flash::message')
        <div class="card shadow-none border-0">
            <div class="card-header d-flex justify-content-between align-items-center" style="background-color: white">
                <h3 class="card-title m-0" style="color: #69C5A0"><strong>Lista de contratos</strong></h3>
                <div class="ml-auto">
                    <button type="button" class="btn btn-default" data-bs-toggle="modal"
                        data-bs-target="#staticBackdrop">
                        <span class="fas fa-search" style="color: #69C5A0"></span>
                    </button>
                    @can('create_contracts')
                    <a href="{{ route('contracts.create') }}" class="btn btn-default">
                        <span class="fas fa-plus" style="color: #69C5A0"></span>
                    </a>
                    <a href="{{ route('get.contracts') }}" class="boton-redondeado"><b>Actualizar contratos</b></a>
                    @endcan
                </div>
            </div>
            <div class="card-body p-0">
                <div class="card-panel">
                    @include('contracts.table')
                </div>
            </div>
        </div>
    </div>
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
    }

    .boton-redondeado:hover {
        color: white;
    }
</style>
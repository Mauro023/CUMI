@extends('layouts.app')

@section('content')
    <section class="content-header">
        
    </section>

    <div class="content px-3">

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="card shadow-none border-0">
            <div class="card-header d-flex justify-content-between align-items-center" style="background-color: white">
                <h3 class="card-title m-0" style="color: #69C5A0"><strong>Registro invima</strong></h3>
                <div class="ml-auto d-flex align-items-center gap-2">
                    @can('create_employes')
                    <a href="{{ route('invimaRegistrations.create') }}" class="btn btn-default">
                        <span class="fas fa-plus" style="color: #69C5A0"></span>
                    </a>
                    @endcan           
                </div>
            </div>
            <div class="card-body p-0">
                @include('invima_registrations.table')

                <div class="card-footer clearfix">
                    <div class="float-right">
                        
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

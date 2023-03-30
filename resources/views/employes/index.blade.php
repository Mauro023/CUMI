@extends('layouts.app')

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h3 class="text-themecolor">Lista de empleados</h3>
            </div>
        </div>
        <div class="row">
            <!-- column -->
            <div class="col-lg-12">
                <div class="row m-t-40">
                    <!-- Column -->
                    <div class="col-md-6 col-lg-3 col-xlg-3">
                        <div class="card">
                            <div class="box bg-green text-center">
                                <h1 class="font text-white">{{ \App\Models\Employe::count() }}</h1>
                                <h6 class="text-black">Empleados</h6>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    {!! Form::open(['route' => ['employes.filter'], 'method' => 'post', 'class' => 'row col-sm-12
                    mt-4']) !!}
                    <div class="form-group col-sm-5">
                        <label>DNI</label>
                        <input type="text" name="dni" class="form-control" />
                    </div>
                    <div class="form-group col-sm-2">
                        <label style="visibility: hidden">Accion</label>
                        <button class="btn btn-info form-control">Filtrar</button>
                    </div>
                    <div class="form-group col-sm-2">
                        <label style="visibility: hidden">Boton</label>
                        <a href="{{ route('employes.create') }}" class="btn btn-info form-control">Agregar</a>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
</section>

<div class="content px-3">

    @include('flash::message')

    <div class="clearfix"></div>
    <div class="card">
        <div class="card-body p-0">
            <div class="card-panel">
                @include('employes.table')
            </div>
        </div>
    </div>
</div>
</div>
@endsection
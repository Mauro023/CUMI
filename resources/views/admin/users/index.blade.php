@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')

    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-themecolor">Lista de usuarios</h3>
        </div>
    </div>

    <div class="row">
        <!-- column -->
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="row m-t-40">
                        <!-- Column -->
                        <div class="col-md-6 col-lg-3 col-xlg-3">
                            <div class="card">
                                <div class="box bg-green text-center">
                                    <h1 class="font text-white">{{ \App\Models\User::count() }}</h1>
                                    <h6 class="text-black">Usuarios registrados</h6>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        {!! Form::open(['route' => ['users.filter'], 'method' => 'post', 'class' => 'row col-sm-12  mt-4']) !!}
                        <div class="form-group col-sm-5">
                            <label>Nombre</label>
                            <input type="text" name="name" class="form-control" />
                        </div>
                        <div class="form-group col-sm-2">
                            <label style="visibility: hidden">Accion</label>
                            <button class="btn btn-info form-control">Filtrar</button>
                        </div>
                        <div class="form-group col-sm-2 float-sm-end">
                            <label style="visibility: hidden">Boton</label>
                            <a href="{{ route('admin.users.create') }}" class="btn btn-info form-control">Agregar</a>
                        </div>
                        {!! Form::close() !!}
                    </div>
                    <br>
                    <div class="card-panel">
                        @include('admin.users.table')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
               
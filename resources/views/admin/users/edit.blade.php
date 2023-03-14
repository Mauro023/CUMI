@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')

    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-themecolor">Perfil</h3>
        </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Inicio</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.users.index') }}">Usuarios</a></li>
                <li class="breadcrumb-item">Editar</li>
                <li class="breadcrumb-item active"><a href="{{ route('admin.users.edit', $user->id) }}">{{ $user->id }}</a></li>
            </ol>
        </div>
    </div>


    <div class="row">
        <!-- Column -->
        <div class="col-lg-4 col-xlg-3 col-md-5">
            <div class="card">
                <div class="card-body">
                    <center class="m-t-30"> <img src="{{ $user->pathAvatar }}" class="img-circle" width="150" />
                        <h4 class="card-title m-t-10">{{ $user->name }}</h4>
                    </center>
                </div>
                <div>
                    <hr> </div>
                <div class="card-body"> <small class="text-muted">Email </small>
                    <h6>{{ $user->email }}</h6> 
                </div>
                <div class="card-body"> <small class="text-muted">Documento </small>
                    <h6>{{ $user->document?:'No disponible' }}</h6> 
                </div>
            </div>
        </div>
        <!-- Column -->
        <div class="col-lg-8 col-xlg-9 col-md-7">
            <div class="card">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs profile-tab" role="tablist">
                    <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#settings" role="tab">Preferencias de la cuenta</a> </li>
                    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#roles" role="tab">Roles</a> </li>
                    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#permissions" role="tab">Permisos</a> </li>
                </ul>
                <!-- Tab panes -->
                <div class="tab-content">
                    <div class="tab-pane active" id="settings" role="tabpanel">
                        <div class="card-body">
                            {!! Form::model($user, ['route' => ['admin.users.update', $user], 'method' => 'PUT', 'enctype' => 'multipart/form-data', 'class' => 'form-material m-t-40 row']) !!}
                            
                                @include('admin.users.fields')

                                <div class="form-group col-md-12 m-t-20 ">
                                    <button type="submit" class="btn btn-primary btn-block">Actualizar Usuario</button>
                            </div>

                            {!! Form::close() !!}
                        </div>
                    </div>
                    <div class="tab-pane" id="roles" role="tabpanel">
                        <div class="card-body">
                           @role('Admin')
                                <ul class="list-group">
                                    @forelse ($user->roles as $role)
                                        <li class="list-group-item">{{ $role->name }}</li>
                                    @empty
                                        <li class="list-group-item">No tiene roles</li>
                                    @endforelse
                                </ul>
                            @endrole
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Column -->
    </div>


@endsection

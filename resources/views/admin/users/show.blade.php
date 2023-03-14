@extends('layouts.app')

@section('title', 'Ver usuario '.$user->FullName)

@section('content')
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            @if(auth()->id()!=$user->id)
            <h3 class="text-themecolor">Usuario {{ auth()->id() }}</h3>
            @else
            <h3 class="text-themecolor">Mi perfil</h3>
            @endif

        </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Inicio</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.users.index') }}">Usuarios</a></li>
                <li class="breadcrumb-item active">{{ auth()->id() }}</li>
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
                        <h6 class="card-subtitle">ID: {{ $user->id }}</h6>
                    </center>
                </div>
                <div>
                    <hr>
                </div>
                <div class="card-body"> <small class="text-muted">Email </small>
                    <h6>{{ $user->email }}</h6> 
                </div>
            </div>
        </div>
    </div>
@endsection

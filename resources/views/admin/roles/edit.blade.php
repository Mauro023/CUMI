@extends('layouts.app')

@section('title', 'Roles')

@section('content')

    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-themecolor">Editar role</h3>
        </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Inicio</a></li>
                <li class="breadcrumb-item">Roles</li>
                <li class="breadcrumb-item active">Editar</li>
            </ol>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="card">
                @include('common.errors')
                <div class="card-body">
                    <h4 class="card-title">Actualizar Role</h4>
                    <form method="POST" action="{{ route('admin.roles.update', $role) }}">
                        {{ method_field('PUT') }}

                        @include('admin.roles.form')
                        <button class="btn btn-primary btn-block">Actualizar role</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

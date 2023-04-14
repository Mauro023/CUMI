@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')

<div class="row page-titles">
    <div class="col-md-7 align-self-center">
        <h3 class="text-themecolor">Registro</h3>
    </div>
</div>
<div class="content px-3">
    <div class="card">
        <div class="card-body">
            {!! Form::open(['route' => 'admin.users.store', 'enctype' => 'multipart/form-data', 'class' =>
            'form-material m-t-40 row']) !!}
            <div class="row">
                @include('admin.users.fields')
                @include('admin.roles.checkboxes')


                
            </div>
            <div class="card-footer">
                {!! Form::submit('Create', ['class' => 'btn btn-primary']) !!}
                <a href="{{ route('admin.users.index') }}" class="btn btn-default">Cancelar</a>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>

{{-- <div class="row">
    <div class="col-md-6">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Datos personales</h3>
            </div>
            <div class="box-body">
                <form method="POST" action="{{ route('admin.users.store') }}">
                    {{ csrf_field() }}

                    <div class="form-group">
                        <label for="name">Nombre:</label>
                        <input name="name" value="{{ old('name') }}" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input name="email" value="{{ old('email') }}" class="form-control">
                    </div>

                    <div class="form-group col-md-6">
                        <label>Roles</label>
                        @include('admin.roles.checkboxes')
                    </div>
                    <button class="btn btn-primary btn-block">Crear usuario</button>
                </form>
            </div>
        </div>
    </div>
</div> --}}
@endsection
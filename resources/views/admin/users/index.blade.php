@extends('layouts.app')

@section('content')
<section class="content-header">

</section>
<div class="content px-3">
    <div class="container-fluid">
        @include('flash::message')
        <div class="card shadow-none border-0">
            <div class="card-header d-flex justify-content-between align-items-center" style="background-color: white">
                <h4 class="card-title m-0" style="color: #69C5A0"><strong>Lista de usuarios</strong></h4>
                <div class="ml-auto">
                    @can('create_user')
                    <a href="{{ route('admin.users.create') }}" class="btn btn-deafult">
                        <span class="fas fa-user-plus" style="color: #69C5A0"></span>
                    </a>
                    @endcan
                    <button type="button" class="btn btn-default" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                        <span class="fas fa-search" style="color: #69C5A0"></span>
                    </button>
                </div>
            </div>
            <div class="card-body p-0">
                <div class="card-panel">
                    @include('admin.users.table')
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-green">
                <h5 class="modal-title" id="staticBackdropLabel"><strong>Filtrar usuario</strong></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                {!! Form::open(['route' => ['users.filter'], 'method' => 'post']) !!}
                <label>Nombre</label>
                <div class="input-group mb-3">
                    <div class="sm-2">
                        {!! Form::label('name', 'Nombre:', 'hidden') !!}
                        {!! Form::text('name', null, ['class' => 'form-control','id'=>'name'
                        ,'name'=>'name',
                        'placeholder'=>'Digite el nombre']) !!}
                    </div>
                    <div class="input-group-append">
                        <button class="btn btn-outline-dark form-control">
                            <span class="fas fa-search"></span>
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection
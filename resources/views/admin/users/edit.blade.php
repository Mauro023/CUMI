@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')

    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-themecolor">Perfil</h3>
        </div>
    </div>
    <div class="row">
        <!-- Column -->
        <div class="col-lg-8 col-xlg-9  col-md-7">
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
                           @role('Root|Admin')
                           {!! Form::open(['route' => ['admin.users.roles.update', $user], 'method' => 'PUT', 'class' => 'form-material m-t-40 row']) !!}

                                @include('admin.roles.checkboxes')

                                <button class="btn btn-primary btn-block">Actualizar roles</button>
                            {!! Form::close() !!}
                            @else
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
                    <!--second tab-->
                    <div class="tab-pane" id="permissions" role="tabpanel">
                        <div class="card-body">
                            @role('Root|Admin')
                             {!! Form::open(['route' => ['admin.users.permissions.update', $user], 'method' => 'PUT', 'class' => 'form-material m-t-40 row']) !!}

                                @include('admin.permissions.checkboxes', ['model' => $user])

                                <button class="btn btn-primary btn-block">Actualizar permisos</button>
                            {!! Form::close() !!}
                            @else
                                <ul class="list-group">
                                    @forelse ($user->permissions as $permission)
                                        <li class="list-group-item">{{ $permission->name }}</li>
                                    @empty
                                        <li class="list-group-item">No tiene permisos</li>
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

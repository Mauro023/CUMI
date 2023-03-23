@extends('layouts.app')

@section('content')
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
                                    <h1 class="font text-white">{{ \App\Models\Employe::count() }}</h1>
                                    <h6 class="text-black">Empleados</h6>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <a href="{{ route('employes.create') }}" class="btn btn-info btn-rounded m-t-10 float-right">Agregar usuario</a>
                        </div>
                    </div>
                    
                    <br>
                    <div class="card-panel">
                        @include('employes.table')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


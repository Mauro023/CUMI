@extends('layouts.app')

@section('content')
    <section class="content-header">
    </section>

    <div class="content px-3">

        @include('flash::message')

        <div class="card shadow-none border-0">
            <div class="card-header d-flex justify-content-between align-items-center" style="background-color: white">
                <h3 class="card-title m-0" style="color: #69C5A0"><strong>Actas de recepción recnica de medicamentos</strong></h3>
                <div class="ml-auto d-flex align-items-center gap-2">
                    <button type="button" class="btn btn-default" data-bs-toggle="modal"
                        data-bs-target="#staticBackdrop">
                        <span class="fas fa-search" style="color: #69C5A0"></span>
                    </button>
                    @can('create_employes')
                    <a href="{{ route('medicines.create') }}" class="btn btn-default">
                        <span class="fas fa-user-plus" style="color: #69C5A0"></span>
                    </a>
                    @endcan           
                </div>
            </div>
            <div class="card-body p-0">
                @include('medicines.table')

                <div class="card-footer clearfix">
                    <div class="float-right">
                        
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection


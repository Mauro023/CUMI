@extends('layouts.app')

@section('content')
<section class="content-header">
</section>

<div class="content px-3">
    <div class="container-fluid">
        @include('flash::message')
        <div class="card shadow-none border-0">
            <div class="card-header d-flex justify-content-between align-items-center" style="background-color: white">
                <h3 class="card-title m-0" style="color: #69C5A0"><strong>Empleados disponibles</strong></h3>
                <div class="ml-auto">
                    <button type="button" class="btn btn-default" data-bs-toggle="modal"
                        data-bs-target="#staticBackdrop">
                        <span class="fas fa-search" style="color: #69C5A0"></span>
                    </button>
                    @can('create_endowments')
                    <a href="{{ route('endowments.create') }}" class="btn btn-default">
                        <span class="fas fa-plus" style="color: #69C5A0"></span>
                    </a>
                    @endcan
                </div>
            </div>
            <div class="card-body p-0">
                <div class="card-panel">
                    @include('endowments.table')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<script>
    @if(session('pdfUrl'))
        var pdfUrl = '{{ session('pdfUrl') }}';
        window.open(pdfUrl, '_blank');
    @endif
</script>


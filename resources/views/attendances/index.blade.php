@extends('layouts.app')

@section('content')
<section class="content-header">
    
</section>
<div class="content px-3">
    <div class="container-fluid">
        @include('flash::message')
        <div class="card shadow-none border-0">
            <div class="card-header d-flex justify-content-between align-items-center" style="background-color: white">
                <h4 class="card-title m-0" style="color: #69C5A0"><strong>Lista de asistencias</strong></h4>
                <div class="ml-auto">
                    <button type="button" class="btn btn-default" data-bs-toggle="modal"
                        data-bs-target="#staticBackdrop">
                        <span class="fas fa-search" style="color: #69C5A0"></span>
                    </button>
                    @can('create_attendances')
                    <a href="{{ route('attendances.create') }}" class="btn btn-default">
                        <span class="fas fa-calendar-plus" style="color: #69C5A0"></span>
                    </a>
                    @endcan
                </div>
            </div>
            <div class="card-body p-0">
                @include('attendances.table')
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
                <h5 class="modal-title" id="staticBackdropLabel"><strong>Filtrar asistencias</strong></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                {!! Form::open(['route' => ['attendances.filter'], 'method' => 'post', 'class' => 'row
                col-sm-12
                mt-4'])!!}
                <div class="row">
                    <div class="form-group col-sm-6">
                        {!! Form::label('workday', 'Fecha inicial:') !!}
                        {!! Form::text('workday', null, ['class' => 'form-control','id'=>'start_date'
                        ,'name'=>'start_date',
                        'placeholder'=>'Fecha de inicio']) !!}
                    </div>
                    <div class="form-group col-sm-6">
                        {!! Form::label('workday', 'Fecha final:') !!}
                        {!! Form::text('workday', null, ['class' =>
                        'form-control','id'=>'end_date','name'=>'end_date',
                        'placeholder'=>'Fecha de finalizacion']) !!}
                    </div>
                </div>
                <div class="row">

                    <label>Nombre:</label>
                    <div class="input-group mb-3">
                        <div class="sm-4">

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
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
</div>

@endsection
@push('page_scripts')
<script type="text/javascript">
    $('#start_date').datetimepicker({
        format: 'YYYY-MM-DD',
        useCurrent: true,
        sideBySide: true
    })

    $('#end_date').datetimepicker({
        format: 'YYYY-MM-DD',
        useCurrent: true,
        sideBySide: true
    })
</script>
@endpush
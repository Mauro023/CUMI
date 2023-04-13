@extends('layouts.app')

@section('content')
<section class="content-header">
</section>

<div class="content px-3">
    <div class="container-fluid">
        @include('flash::message')
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h6 class="card-title m-0"><strong>Calendarios</strong></h6>
                <div class="ml-auto">
                    @can('create_calendars')
                    <a href="{{ route('calendars.create') }}" class="btn btn-success">
                        <span class="fas fa-calendar-plus"></span>
                    </a>
                    @endcan
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                        data-bs-target="#staticBackdrop">
                        <span class="fas fa-search"></span>
                    </button>
                </div>
            </div>
            <div class="card-body p-0">
                @include('calendars.table')
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
                <h5 class="modal-title" id="staticBackdropLabel"><strong>Filtrar en calendario</strong></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                {!! Form::open(['route' => ['calendars.filter'], 'method' => 'post', 'class' => 'row
                col-sm-12
                mt-4'])
                !!}
                <div class="row">
                    <div class="form-group col-sm-6">
                        {!! Form::label('start_date', 'Fecha inicial:') !!}
                        {!! Form::text('start_date', null, ['class' => 'form-control','id'=>'start_date'
                        ,'name'=>'start_date', 'placeholder'=>'Fecha de inicio']) !!}
                    </div>
                    <div class="form-group col-sm-6">
                        {!! Form::label('end_date', 'Fecha final:') !!}
                        {!! Form::text('end_date', null, ['class' =>
                        'form-control','id'=>'end_date','name'=>'end_date',
                        'placeholder'=>'Fecha de finalizacion']) !!}
                    </div>
                </div>
                <div class="row">
                    <label>Nombre:</label>
                    <div class="input-group mb-3">
                        <div class="sm-2">
                            {!! Form::label('name', 'Nombre:', "hidden") !!}
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
</div>
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
@endsection
@extends('layouts.app')

@section('content')
<section class="content-header">

</section>
<div class="content px-3">
    <div class="container-fluid">
        @include('flash::message')
        <div class="card shadow-none border-0">
            <div class="card-header d-flex justify-content-between align-items-center" style="background-color: white; padding: 0 0;">
                <h3 class="card-title m-0" style="color: #69C5A0; font-size: 25px;"><strong>Calendarios</strong></h3>
                <div class="ml-auto">
                    @can('create_calendars')
                    <a href="{{ route('calendars.create') }}" class="btn btn-default">
                        <span class="fas fa-calendar-plus" style="color: #69C5A0"></span>
                    </a>
                    @endcan
                    <a href="{{ route('calendars.generate') }}" class="boton-redondeado"><b>Generar calendarios</b></a>
                    <a class="boton-redondeado" data-bs-toggle="modal" data-bs-target="#importar"><b>Importar</b></a>
                </div>
            </div>
            <div class="card-body p-0">
                <div class="card-panel">
                    @include('calendars.table')
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="importar" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-default">
                <h5 class="modal-title" id="staticBackdropLabel"><strong>Importar archivo excel</strong></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                {!! Form::open(['route' => ['import'], 'method' => 'post', 'class' => 'row
                col-sm-12
                mt-4'])
                !!}
                <div class="row">
                    <div class="form-group col-sm-6">
                        {!! Form::file('file', null, ['class' => 'form-control','id'=>'file'
                        ,'name'=>'file', 'placeholder'=>'file']) !!}
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-sm-6">
                        <button class="btn btn-default" type="submit" style="background-color: #69C5A0; color: white"><strong>Importar</strong></button>
                    </div>
                </div>
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

<style>
    .boton-redondeado {
        border-radius: 30px;
        padding: 7px 20px;
        background-color: #69C5A0;
        color: white;
        border: none;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 14px;
        cursor: pointer;
        margin-bottom: 3px;
    }

    .boton-redondeado:hover {
        color: white;
    }
</style>
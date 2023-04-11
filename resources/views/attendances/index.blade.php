@extends('layouts.app')

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Asistencia</h1>
            </div>
            <div class="row">
                {!! Form::open(['route' => ['attendances.filter'], 'method' => 'post', 'class' => 'row col-sm-12 mt-4']) !!}
                <div class="form-group col-sm-4">
                    {!! Form::label('workday', 'Fecha inicial:') !!}
                    {!! Form::text('workday', null, ['class' => 'form-control','id'=>'start_date' ,'name'=>'start_date']) !!}
                </div>
                <div class="form-group col-sm-4">
                    {!! Form::label('workday', 'Fecha final:') !!}
                    {!! Form::text('workday', null, ['class' => 'form-control','id'=>'end_date','name'=>'end_date']) !!}
                </div>
                <div class="form-group col-sm-2">
                    <label style="visibility: hidden">Accion</label>
                    <button class="btn btn-info form-control">Filtrar</button>
                </div>
                <div class="form-group col-sm-2">
                    <label style="visibility: hidden">Boton</label>
                    @can('create_attendances')             
                        <a href="{{ route('attendances.create') }}" class="btn btn-info form-control">Agregar</a>
                    @endcan
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</section>

<div class="content px-3">

    @include('flash::message')

    <div class="clearfix"></div>

    <div class="card">
        <div class="card-body p-0">
            @include('attendances.table')

            <div class="card-footer clearfix">
                <div class="float-right">

                </div>
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
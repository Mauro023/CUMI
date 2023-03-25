@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Calendarios</h1>
                </div>
                <div class="row">
                    {!! Form::open(['route' => ['calendars.filter'], 'method' => 'post', 'class' => 'row col-sm-12 mt-4']) !!}
                    <div class="form-group col-sm-4">
                        {!! Form::label('start_date', 'Fecha inicial:') !!}
                        {!! Form::text('start_date', null, ['class' => 'form-control','id'=>'start_date' ,'name'=>'start_date']) !!}
                    </div>
                    <div class="form-group col-sm-4">
                        {!! Form::label('end_date', 'Fecha final:') !!}
                        {!! Form::text('end_date', null, ['class' => 'form-control','id'=>'end_date','name'=>'end_date']) !!}
                    </div>
                    <div class="form-group col-sm-2">
                        <label style="visibility: hidden">Accion</label>
                        <button class="btn btn-info form-control">Filtrar</button>
                    </div>
                    <div class="form-group col-sm-2">
                        <label style="visibility: hidden">Boton</label>
                        <a href="{{ route('calendars.create') }}" class="btn btn-info form-control">Agregar</a>
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
                @include('calendars.table')

                <div class="card-footer clearfix">
                    <div class="float-right">

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
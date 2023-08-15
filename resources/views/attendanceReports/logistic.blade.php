@extends('layouts.app')

@section('content')
<section class="content-header">

</section>
<div class="content px-3">
    <div class="container-fluid">
        @include('flash::message')
        <div class="card shadow-none border-0">
            <div class="card-header d-flex justify-content-between align-items-center" style="background-color: white">
                <h4 class="card-title m-0" style="color: #69C5A0"><strong>Departamento de logistica</strong></h4>
                <div class="ml-auto">
                    <button type="button" class="btn btn-default" data-bs-toggle="modal"
                        data-bs-target="#staticBackdrop">
                        <span class="fas fa-search" style="color: #69C5A0"></span>
                    </button>
                </div>
            </div>
            <div class="card-body p-0">
                <table class="table table-hover mb-0" id="attendances-table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Empleado</th>
                            <th>Día de trabajo</th>
                            <th>Entrada - Salida</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $contador = 0;
                        @endphp
                        @foreach($attendances as $attendance)
                        @php
                        $contador = $contador + 1;
                        @endphp
                        <tr>
                            <td><strong>{{$contador}}</strong></td>
                            <td>
                                {{ $attendance->employe_id ? $attendance->employe->name : 'Sin ID'}}
                                <br>
                                <small style="color: #69C5A0"><strong>{{ $attendance->employe->work_position
                                        }}</strong></small>
                            </td>
                            <td style="vertical-align: middle">{{ $attendance->workday->format('Y-m-d') }}</td>
                            <td style="vertical-align: middle">
                                <span class="badge text-black" style="background-color:#E0E0E0">{{
                                    $attendance->aentry_time
                                    }}</span>
                                - <span class="badge text-white" style="background-color:#FF8A65;">{{
                                    $attendance->adeparture_time
                                    }}</span>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="card-footer mr-auto" style="background-color: white">
                {{ $attendances->links() }}
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
                {!! Form::open(['route' => ['logistic.filter'], 'method' => 'post', 'class' => 'row
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
@endsection
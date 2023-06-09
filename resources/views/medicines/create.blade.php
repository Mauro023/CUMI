@extends('layouts.app')

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="container mt-4">
            <div class="row border">
                <div class="col-3 border">
                    <img src="https://clinicamedicinaintegral.000webhostapp.com/clinica/img/logo.png" class="img-fluid"
                        alt="Responsive image font-weight-bold">
                </div>
                <div class="col-6 border">
                    <div class="row">
                        <div class="col-12 border-bottom text-center align-center">
                            <b>ACTA DE RECEPCION TECNICA DE MEDICAMENTOS</b>
                        </div>
                        <div class="col-12 border-bottom text-center align-center">
                            <b>CLINICA UNIVERSITARIA MEDICINA INTEGRAL SAS</b>
                        </div>
                        <div class="col-12 text-center align-cente">
                            <b>MACROPROCESO: GESTIÓN CLÍNICA</b>
                        </div>
                    </div>
                </div>
                <div class="col-3 border">
                    <div class="row">
                        <div class="col-12 border-bottom display-12">
                            CÓDIGO: GCL-SF-F003
                        </div>
                        <div class="col-12 border-bottom">
                            VERSIÓN: 01
                        </div>
                        <div class="col-12">
                            VIGENCIA: 25-08-2021
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="content px-3">

    @include('adminlte-templates::common.errors')

    <div class="card">

        {!! Form::open(['route' => 'medicines.store']) !!}

        <div class="card-body">

            <div class="row">
                @include('medicines.fields')
            </div>

        </div>

        <div class="card-footer">
            {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
            <a href="{{ route('medicines.index') }}" class="btn btn-default">Cancel</a>
        </div>

        {!! Form::close() !!}

    </div>
</div>
@endsection
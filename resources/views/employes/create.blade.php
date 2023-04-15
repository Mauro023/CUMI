@extends('layouts.app')

@section('content')
<section class="content-header">
    
</section>

    <div class="content px-3">

        @include('adminlte-templates::common.errors')

        <div class="card">
            <div class="card-header">
                <strong>Registrar empleado</strong>
            </div>
            {!! Form::open(['route' => 'employes.store']) !!}

            <div class="card-body">

                <div class="row">
                    @include('employes.fields')
                </div>

            </div>

            <div class="card-footer">
                {!! Form::submit('Agregar', ['class' => 'btn btn-primary']) !!}
                <a href="{{ route('employes.index') }}" class="btn btn-default">Cancelar</a>
            </div>

            {!! Form::close() !!}

        </div>
    </div>
@endsection

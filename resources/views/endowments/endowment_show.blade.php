@extends('layouts.app')

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row m-t-40">
            <!-- Column -->
            <div class="col-md-6 col-lg-3 col-xlg-3">
                <div class="card">
                    <div class="card-header bg-gradient-primary content-center text-white">
                        <i class="fas fa-tshirt fa-3x"></i>
                    </div>
                    <div class="card-body row text-center">
                        <div class="col">
                            <div class="text-value-xl text-muted"><strong>{{ $endowments->count() }}</strong></div>
                            <div class="text-uppercase text-muted text-description-card">Dotaciones entregadas
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="content px-3">

    <div class="clearfix"></div>

    <div class="card">
        <div class="card-header" style="color: #69C5A0">
            <strong>Dotacion entregada</strong>
            @can('create_endowments')
            <a class="float-right btn btn-default" href="{{ route('endowments.create') }}">
                <span class="fas fa-user-plus" style="color: #69C5A0"></span>
            </a>
            @endcan
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover mb-0" id="endowments-table">
                    <thead>
                        <tr>
                            <th>Empleado</th>
                            <th>Dotacion</th>
                            <th>Periodo de entrega</th>
                            <th>Firma del empleado</th>
                            <th colspan="3">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($endowments->sortBy('deliver_date') as $endowment)
                        <tr>
                            <td>{{ $endowment->contract_id ? $endowment->contracts->employe->name : 'SIN ID'}}</td>
                            <td>
                                @php
                                $items = json_decode($endowment->item);
                                if (is_array($items)) {
                                echo implode(', ', $items);
                                } else {
                                echo $items;
                                }
                                @endphp
                            </td>
                            <td>
                                <strong style="color: #69C5A0">{{ $endowment->period }}</strong>
                                <br>
                                <small>{{ $endowment->deliver_date->format('Y-m-d') }}</small>
                            </td>
                            <td><img src="{{ $endowment->employe_signature }}" alt="Firma del empleado"></td>
                            <td width="120">
                                {!! Form::open(['route' => ['endowments.destroy', $endowment->id], 'method' =>
                                'delete', 'class' => "eliminarEndowmentForm"]) !!}
                                <div class='btn-group'>
                                    @can('show_endowments')
                                    <a href="{{ route('endowments.show', [$endowment->id]) }}"
                                        class='btn btn-default btn-xs'>
                                        <i class="far fa-eye" style="color: #13A4DA"></i>
                                    </a>
                                    @endcan
                                    @can('update_endowments')
                                    <a href="{{ route('endowments.edit', [$endowment->id]) }}"
                                        class='btn btn-default btn-xs'>
                                        <i class="far fa-edit" style="color: #6c6d77"></i>
                                    </a>
                                    @endcan
                                    @can('destroy_endowments')
                                    {!! Form::button('<i class="far fa-trash-alt" style="color: #da1b1b"></i>', ['type'
                                    => 'submit', 'class' => 'btn
                                    btn-default btn-xs']) !!}
                                    @endcan
                                </div>
                                {!! Form::close() !!}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="card-footer clearfix">
                <div class="float-right">

                </div>
            </div>
        </div>

    </div>
    <div id="app">
    </div>
    <script src="{{ asset('js/app.js') }}"></script>
    @include('layouts.alerts')
</div>

@endsection

<script>
    @if(session('pdfUrl'))
        var pdfUrl = '{{ session('pdfUrl') }}';
        window.open(pdfUrl, '_blank');
    @endif
</script>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const eliminarUsuarioForms = document.querySelectorAll('.eliminarEndowmentForm');
    
        eliminarUsuarioForms.forEach((form) => {
            form.addEventListener('submit', function (event) {
                event.preventDefault(); // Previene la acción por defecto del formulario
                const currentForm = this; // Obtén el formulario actual
    
                Swal.fire({
                    title: '¿Estás seguro de querer eliminar este registro?',
                    html: '<br><strong style= "color: red";>Esta acción afectará a la base de datos.</strong>',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Sí, eliminarlo',
                    cancelButtonText: 'Cancelar',
                    customClass: {
                        title: 'custom-title', // Clase personalizada para el título
                        content: 'custom-content', // Clase personalizada para el contenido
                        icon: 'custom-icon' // Clase personalizada para el icono
                    }
                }).then((result) => {
                    if (result.isConfirmed) {
                        // El usuario confirmó la eliminación, envía el formulario actual
                        currentForm.submit();
                    }
                });
            });
        });
    });
</script>

<style>
    .custom-title {
        color: #14ABE3;
        /* Cambia el color del título a rojo */
    }

    .custom-icon::before {
        color: #cf33ff;
        /* Cambia el color del icono a rojo */
    }
</style>
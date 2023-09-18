@extends('layouts.app')

@section('content')
<section class="content-header">
</section>

<div class="content px-3">
    <div class="container-fluid">
        @include('flash::message')
        <div class="card shadow-none border-0">
            <div class="card-header d-flex justify-content-between align-items-center"
                style="background-color: white; padding: 0 0;">
                <h3 class="card-title m-0" style="color: #69C5A0; font-size: 25px;"><strong>Empleados
                        disponibles</strong></h3>
                <div class="ml-auto d-flex align-items-center gap-2">
                    <button type="submit" class="btn btn-default" data-toggle="modal" data-target="#exportModal">
                        <span class="fas fa-file-export" style="color: #69C5A0"></span>
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
</div>

<!-- Modal -->
<div class="modal fade" id="exportModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Seleccione el periodo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('export') }}" method="post" style="margin-bottom: 0;">
            <div class="modal-body">
                    @csrf
                    <div class="form-group col-sm-5 mb-4" style="padding: 0 0">
                        <select id="year" name="year" class="custom-select">
                            @for ($i = date('Y'); $i >= 2020; $i--)
                                <option value="{{ $i }}">{{ $i }}</option>
                            @endfor
                        </select>
                    </div>
                    <div class="custom-control custom-radio">
                        <input class="custom-control-input custom-control-input-success" type="radio" id="Abril" name="period" value="Abril"/>
                        <label class="custom-control-label" for="Abril">Abril</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input class="custom-control-input custom-control-input-primary" type="radio" id="Agosto" name="period" value="Agosto">
                        <label class="custom-control-label" for="Agosto">Agosto</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input class="custom-control-input custom-control-input-warning" type="radio" id="Diciembre" name="period" value="Diciembre"/>
                        <label class="custom-control-label" for="Diciembre">Diciembre</label>
                    </div>                                       
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Exportar</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                </div>
            </form>
        </div>
    </div>
</div>
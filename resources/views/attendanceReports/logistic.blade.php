@extends('layouts.app')

@section('content')
<div class="content px-3">
    <div class="container-fluid">
        <div class="card shadow-none border-0">
            <div class="card-header d-flex justify-content-between align-items-center" style="background-color: white; padding: 0 0;">
                <h4 class="card-title m-0" style="color: #69C5A0; font-size: 25px;"><strong>Departamento de logistica</strong></h4>
            </div>
            <div class="card-body p-0 mt-2">
                <form action="{{ route('attendanceReport.logistic') }}" method="GET" class="d-flex justify-content-between align-items-center">
                    <!-- Selector de registros por página (Mostrar) a la izquierda -->
                    <div class="form-group mb-0 mt-2">
                        <label for="perPageSelect" class="mr-2" style="color: #69C5A0">Mostrar:</label>
                        <select id="perPageSelect" name="per_page" class="form-select" style="border-radius: 20px" onchange="this.form.submit()">
                            <option value="10" {{ $attendances->perPage() == 10 ? 'selected' : '' }}>10</option>
                            <option value="25" {{ $attendances->perPage() == 25 ? 'selected' : '' }}>25</option>
                            <option value="50" {{ $attendances->perPage() == 50 ? 'selected' : '' }}>50</option>
                            <option value="100" {{ $attendances->perPage() == 100 ? 'selected' : '' }}>100</option>
                        </select>
                    </div>
                    
                    <!-- Botón de búsqueda (Buscar) a la derecha -->
                    <div class="form-group mb-0">
                        <div class="input-group">
                            <div class="input-group-append">
                                <button class="btn btn-default" type="submit" style="border-radius: 20px; color: #69C5A0"><strong>Buscar</strong></button>
                            </div>
                            <input type="text" class="form-control" name="search" placeholder="Buscar empleado" style="border-radius: 20px;">
                        </div>
                    </div>
                </form>
                <div class="card-panel">
                    <table class="table table-hover mb-0" id="attendancesTable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Empleado</th>
                                <th>Día de trabajo</th>
                                <th>Entrada - Salida</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($attendances as $attendance)                 
                            <tr>
                                <td><strong>{{ $attendance->id }}</strong></td>
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
                    <div class="d-flex justify-content-between mb-4">
                        <!-- Muestra el número de página actual a la izquierda -->
                        <div class="pagination-label">
                            Página <strong>{{ $attendances->currentPage() }}</strong> de <strong>{{ $attendances->lastPage() }}</strong>
                        </div>
                        <!-- Muestra la paginación generada por Laravel a la derecha -->
                        <div>
                            {{ $attendances->appends(['search' => request('search'), 'per_page' => request('per_page')])->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<style>
    .pagination .page-item.active .page-link {
        background-color: #69C5A0;
        border-color: #69C5A0;
        color: white;
    }

    .dataTables_wrapper .dataTables_filter input {
        border-radius: 10px; 
        margin-top: 10px;
        margin-right: 4px;
    }

    .dataTables_length select {
        border-radius: 10px; 
        margin-top: 10px;
    }
</style>
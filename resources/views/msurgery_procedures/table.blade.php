<div class="table-responsive">
    <table class="table table-hover shadow mb-3 rounded" id="msurgeryProcedures-table">
        <thead>
        <tr>
            <th># servicio</th>
            <th>Tipo</th>
            <th>Procedimiento</th>
            <th>UVR</th>
            <th>Observacion</th>
            <th colspan="3">Acciones</th>
        </tr>
        </thead>
        <tbody>
        @foreach($msurgeryProcedures as $msurgeryProcedure)
            <tr>
                <td>{{ $msurgeryProcedure->cod_surgical_act }}</td>
                <td>
                    @php
                        $code = $msurgeryProcedure->code_procedure ?? null;
                        $manualType = $msurgeryProcedure->procedures->manual_type ?? null;
                    @endphp

                    @if($manualType == 256)
                        <span class="badge text-black" style="background-color:#A3BF18;">ISS</span>
                    @elseif($manualType == "SOAT") 
                        <span class="badge text-white" style="background-color:#00B0EB;">{{ $manualType }}</span>
                    @else
                        <span class="badge text-white" style="background-color:#da1b1b;">{{ $manualType }}</span>  
                    @endif
                <td>{{ $msurgeryProcedure->code_procedure ? $msurgeryProcedure->procedures->description : 'Sin ID' }}
                    <br>
                    <small><strong style="color: #69C5A0">{{ $msurgeryProcedure->type }}</strong></small>
                </td>
                <td>{{ $msurgeryProcedure->code_procedure ? $msurgeryProcedure->procedures->uvr : 'Sin ID' }}</td>
                <td>{{ $msurgeryProcedure->observation}}</td>
                <td width="120">
                    {!! Form::open(['route' => ['msurgeryProcedures.destroy', $msurgeryProcedure->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('msurgeryProcedures.show', [$msurgeryProcedure->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye" style="color: #13A4DA"></i>
                        </a>
                        <a href="{{ route('msurgeryProcedures.edit', [$msurgeryProcedure->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-edit" style="color: #6c6d77"></i>
                        </a>
                        {!! Form::button('<i class="far fa-trash-alt" style="color: #da1b1b"></i>', ['type' => 'submit', 'class' => 'btn btn-default btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div class="d-flex justify-content-between mb-4">
        <!-- Muestra el número de página actual a la izquierda -->
        <div class="pagination-label">
            Página <strong>{{ $msurgeryProcedures->currentPage() }}</strong> de <strong>{{ $msurgeryProcedures->lastPage() }}</strong>
        </div>
        <!-- Muestra la paginación generada por Laravel a la derecha -->
        <div>
            {{ $msurgeryProcedures->appends(['search' => request('search'), 'per_page' => request('per_page')])->links() }}
        </div>
    </div>
</div>
<style>
    .custom-title {
        color: #14ABE3;
        /* Cambia el color del título a rojo */
    }

    .custom-icon::before {
        color: #cf33ff;
        /* Cambia el color del icono a rojo */
    }

    .pagination .page-item.active .page-link {
        background-color: #69C5A0;
        border-color: #69C5A0;
        color: white;
    }
</style>
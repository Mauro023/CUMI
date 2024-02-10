<div class="table-responsive">
    <table class="table table-hover shadow mb-3 rounded" id="procedures-table">
        <thead>
            <tr>
                <th>Codigo</th>
                <th>Tipo de manual</th>
                <th>Descripcion</th>
                <th>Cups</th>
                <th>Uvr</th>
                <th>Uvt</th>
                <th colspan="2">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($procedures as $procedure)
            <tr>
                <td><strong>{{ $procedure->code }}</strong></td>
                <td>
                    @if($procedure->manual_type == 256)
                    <span class="badge text-black" style="background-color:#A3BF18;">ISS</span>
                  @else
                    <span class="badge text-white" style="background-color:#00B0EB; text-color: white;">{{ $procedure->manual_type }}</span>
                  @endif
                </td>
                <td>{{ $procedure->description }}</td>
                <td>{{ $procedure->cups }}</td>
                <td>{{ $procedure->uvr }}</td>
                <td>{{ $procedure->uvt }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['procedures.destroy', $procedure->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('procedures.edit', [$procedure->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-edit" style="color: #6c6d77"></i>
                        </a>
                        {!! Form::button('<i class="far fa-trash-alt" style="color: #da1b1b"></i>', ['type' => 'submit',
                        'class' => 'btn
                        btn-default btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
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
            Página <strong>{{ $procedures->currentPage() }}</strong> de <strong>{{ $procedures->lastPage() }}</strong>
        </div>
        <!-- Muestra la paginación generada por Laravel a la derecha -->
        <div>
            {{ $procedures->appends(['search' => request('search'), 'per_page' => request('per_page')])->links() }}
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
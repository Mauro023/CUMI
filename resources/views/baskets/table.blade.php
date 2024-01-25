<div class="table-responsive">
    <table class="table table-hover shadow mb-3 rounded" id="baskets-table">
        <thead>
            <tr>
                <th>Acto quirurgico</th>
                <th>Bodega</th>
                <th>Articulo</th>
                <th>Cantidad</th>
                <th>Reusable</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($baskets as $basket)
            <tr>
                <td>{{ $basket->surgical_act }}</td>
                <td>{{ $basket->store }}</td>
                <td>{{ $basket->id_article ? $basket->articles->description : 'Sin ID' }}
                <br>
                <small style="color: #69C5A0"><strong>{{ $basket->id_article }}</strong></small>
                </td>
                <td>{{ $basket->item_quantity }}</td>
                <td>{{ $basket->reusable }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['baskets.destroy', $basket->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('baskets.edit', [$basket->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-edit" style="color: #6c6d77"></i>
                        </a>
                        {!! Form::button('<i class="far fa-trash-alt" style="color: #da1b1b"></i>', ['type' => 'submit', 'class' => 'btn
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
            Página <strong>{{ $baskets->currentPage() }}</strong> de <strong>{{ $baskets->lastPage() }}</strong>
        </div>
        <!-- Muestra la paginación generada por Laravel a la derecha -->
        <div>
            {{ $baskets->appends(['search' => request('search'), 'per_page' => request('per_page')])->links() }}
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
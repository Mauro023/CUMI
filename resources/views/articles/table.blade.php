<div class="table-responsive">
    <table class="table table-hover shadow mb-3 rounded" id="articles-table">
        <thead>
            <tr>
                <th>Codigo</th>
                <th>Descripcion</th>
                <th>Costo promedio</th>
                <th>Ultimo costo</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($articles as $article)
            <tr>
                <td><strong>{{ $article->item_code }}</strong></td>
                <td>{{ $article->description }}
                <br>
                <small style="color: #69C5A0"><strong>{{ $article->type }}</strong></small>
                </td>
                <td>{{ number_format($article->average_cost, 0, ',', '.'); }}</td>
                <td>{{ number_format($article->last_cost, 0, ',', '.'); }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['articles.destroy', $article->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('articles.show', [$article->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye" style="color: #13A4DA"></i>
                        </a>
                        <a href="{{ route('articles.edit', [$article->id]) }}" class='btn btn-default btn-xs'>
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
            Página <strong>{{ $articles->currentPage() }}</strong> de <strong>{{ $articles->lastPage() }}</strong>
        </div>
        <!-- Muestra la paginación generada por Laravel a la derecha -->
        <div>
            {{ $articles->appends(['search' => request('search'), 'per_page' => request('per_page')])->links() }}
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
<div class="table-responsive">
    <table class="table table-hover shadow mb-3 rounded" id="generalCosts-table">
        <thead>
            <tr>
                <th>Codigo</th>
                <th>Descripcion</th>
                <th>Valor</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($generalCosts as $generalCost)
            <tr>
                <td><strong>{{ $generalCost->id }}</strong></td>
                <td>{{ $generalCost->description }}</td>
                <td>{{ number_format($generalCost->value, 0, ',', '.'); }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['generalCosts.destroy', $generalCost->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('generalCosts.show', [$generalCost->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye" style="color: #13A4DA"></i>
                        </a>
                        <a href="{{ route('generalCosts.edit', [$generalCost->id]) }}" class='btn btn-default btn-xs'>
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
            Página <strong>{{ $generalCosts->currentPage() }}</strong> de <strong>{{ $generalCosts->lastPage() }}</strong>
        </div>
        <!-- Muestra la paginación generada por Laravel a la derecha -->
        <div>
            {{ $generalCosts->appends(['search' => request('search'), 'per_page' => request('per_page')])->links() }}
        </div>
    </div>
    
    <div id="app">
    </div>
    <script src="{{ asset('js/app.js') }}"></script>
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
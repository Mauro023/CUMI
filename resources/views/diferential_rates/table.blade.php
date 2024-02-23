<div class="table-responsive">
    <table class="table table-hover shadow mb-3 rounded" id="diferentialRates-table">
        <thead>
            <tr>
                <th>Médico</th>
                <th>Procedimiento</th>
                <th>Pago fijo</th>
                <th>Disponibilidad pago</th>
                <th>Valor 1</th>
                <th>Valor 2</th>
                <th colspan="3">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($diferentialRates as $diferentialRate)
            <tr>
                <td>{{ $diferentialRate->id_doctor ? $diferentialRate->doctors->full_name : 'Sin ID' }}</td>
                <td>{{ $diferentialRate->id_procedure ? $diferentialRate->procedures->description : 'Sin ID' }}</td>
                <td>{{ $diferentialRate->fixed_amount }}</td>
                <td>{{ $diferentialRate->payment_availability }}</td>
                <td>{{ number_format($diferentialRate->value1, 0, ',', '.'); }}</td>
                <td>{{ number_format($diferentialRate->value2, 0, ',', '.'); }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['diferentialRates.destroy', $diferentialRate->id], 'method' =>
                    'delete']) !!}
                    <div class='btn-group'>
                        @can('show_diferentialRates')
                            <a href="{{ route('diferentialRates.show', [$diferentialRate->id]) }}"
                                class='btn btn-default btn-xs'>
                                <i class="far fa-eye" style="color: #13A4DA"></i>
                            </a>
                        @endcan
                        @can('update_diferentialRates')
                            <a href="{{ route('diferentialRates.edit', [$diferentialRate->id]) }}"
                                class='btn btn-default btn-xs'>
                                <i class="far fa-edit" style="color: #6c6d77"></i>
                            </a>
                        @endcan
                        @can('destroy_diferentialRates')
                            {!! Form::button('<i class="far fa-trash-alt" style="color: #da1b1b"></i>', ['type' => 'submit', 'class' => 'btn
                            btn-default btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                        @endcan
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
            Página <strong>{{ $diferentialRates->currentPage() }}</strong> de <strong>{{ $diferentialRates->lastPage() }}</strong>
        </div>
        <!-- Muestra la paginación generada por Laravel a la derecha -->
        <div>
            {{ $diferentialRates->appends(['search' => request('search'), 'per_page' => request('per_page')])->links() }}
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
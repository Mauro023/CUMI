<div class="table-responsive">
    <table class="table table-hover shadow mb-3 rounded" id="medicalFees-table">
        <thead>
            <tr>
                <th>Código honorario</th>
                <th>Manual de pago</th>
                <th>Tipo</th>
                <th colspan="2">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($medicalFees as $medicalFee)
            <tr>
                <td>{{ $medicalFee->honorary_code }}</td>
                <td>{{ $medicalFee->payment_manual }}</td>
                <td>{{ $medicalFee->fees_type }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['medicalFees.destroy', $medicalFee->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('medicalFees.edit', [$medicalFee->id]) }}" class='btn btn-default btn-xs'>
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
            Página <strong>{{ $medicalFees->currentPage() }}</strong> de <strong>{{ $medicalFees->lastPage() }}</strong>
        </div>
        <!-- Muestra la paginación generada por Laravel a la derecha -->
        <div>
            {{ $medicalFees->appends(['search' => request('search'), 'per_page' => request('per_page')])->links() }}
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
<div class="table-responsive">
    <table class="table table-hover shadow mb-3 rounded" id="doctors-table">
        <thead>
            <tr>
                <th>Código</th>
                <th>Nombre</th>
                <th>Especialidad</th>
                <th>Tipo pagoo</th>
                <th>Manual pago</th>
                <th>Manual pago 2</th>
                <th colspan="3">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($doctors as $doctor)
            <tr>
                <td><strong>{{ $doctor->code }}</strong></td>
                <td>{{ $doctor->full_name }}
                <br>
                <small style="color: #69C5A0"><strong>{{ $doctor->dni }}</strong></small>
                </td>
                <td>{{ $doctor->specialty }}
                <br>
                <small style="color: #69C5A0"><strong>{{ $doctor->category_doctor }}</strong></small>
                </td>
                <td>{{ $doctor->payment_type }}</td>
                <td>{{ $doctor->id_fees ? $doctor->medical_fees->payment_manual : 'NA' }}</td>
                <td>{{ $doctor->id_fees2 ? $doctor->medical_fees2->payment_manual : 'NA' }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['doctors.destroy', $doctor->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        @can('show_doctors')
                            <a href="{{ route('doctors.show', [$doctor->id]) }}" class='btn btn-default btn-xs'>
                                <i class="far fa-eye" style="color: #13A4DA"></i>
                            </a>
                        @endcan
                        @can('update_doctors')
                            <a href="{{ route('doctors.edit', [$doctor->id]) }}" class='btn btn-default btn-xs'>
                                <i class="far fa-edit" style="color: #6c6d77"></i>
                            </a>
                        @endcan
                        @can('destroy_doctors')
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
            Página <strong>{{ $doctors->currentPage() }}</strong> de <strong>{{ $doctors->lastPage() }}</strong>
        </div>
        <!-- Muestra la paginación generada por Laravel a la derecha -->
        <div>
            {{ $doctors->appends(['search' => request('search'), 'per_page' => request('per_page')])->links() }}
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
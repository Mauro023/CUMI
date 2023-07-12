<div class="table-responsive">
    <table class="table table-hover mb-0" id="cards-table">
        <thead>
            <tr>
                <th scope="col">Empleado</th>
                <th scope="col">Cargo</th>
                <th scope="col">Dotaciones entregados</th>
                <th colspan="3">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($contracts->sortBy('employe.name') as $contract)
            @if ($contract->employe->work_position != 'Pendiente')
            <tr>
                <td>
                    {{ $contract->employe->name }}
                    <br>
                    <small style="color: #69C5A0"><strong>{{ $contract->employe->dni }}</strong></small>
                <td>{{ $contract->employe->work_position }}</td>
                <td class="text-center"><strong>{{ $contract->endowment->count() }}</strong></td>
                <td width="120">
                    <div class='btn-group'>
                        @can('show_cards')
                        <a href="{{ route('endowment.employe', $contract->employe->id) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye" style="color: #13A4DA"></i>
                        </a>
                        @endcan
                    </div>
                </td>
            </tr>
            @endif
            @endforeach
        </tbody>
    </table>
</div>
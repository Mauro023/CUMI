<div class="table-responsive">
    <table class="table table-hover mb-0" id="cards-table">
        <thead>
            <tr>
                <th scope="col">Empleado</th>
                <th scope="col">Cargo</th>
                <th scope="col">Carnets entregados</th>
                <th colspan="3">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($employees as $employee)
            <tr>
                <td>
                    {{ $employee->name }}
                    <br>
                    <small style="color: #69C5A0"><strong>{{ $employee->dni }}</strong></small>
                <td>{{ $employee->work_position }}</td>
                <td class="text-center"><strong>{{ $employee->cards->count() }}</strong></td>
                <td width="120">
                    <div class='btn-group'>
                        <a href="{{ route('cards.employe', $employee->id) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye" style="color: #13A4DA"></i>
                        </a>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
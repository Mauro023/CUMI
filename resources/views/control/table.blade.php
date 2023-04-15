<div class="table-responsive">
    <table class="table table-hover" id="control-table">
        <thead>
        <tr>
            <th>Empleado</th>
            <th>Calendario</th>
            <th>Horario</th>
            <th>Dia de trabajo</th>
            <th>Entrada-salida</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($resultados as $resultado)
            <tr>
                <td>
                    {{ $resultado->name }}
                    <br>
                    <small>{{ $resultado->work_position }}</small>
                </td>
                <td>{{ $resultado->start_date }} - {{ $resultado->end_date }}</td>
                <td>
                    <span class="badge bg-green">{{ $resultado->entry_time }}</span> - 
                    <span class="badge bg-danger">{{ $resultado->departure_time }}</span></td>
                <td>{{ $resultado->workday}}</td>
                <td>
                    <span class="badge bg-green">{{ $resultado->aentry_time }}</span> -
                    <span class="badge bg-danger">{{ $resultado->adeparture_time }}</span></td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
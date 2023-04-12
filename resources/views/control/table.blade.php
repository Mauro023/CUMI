<div class="table-responsive">
    <table class="table table-hover" id="control-table">
        <thead>
        <tr>
            <th>Empleado</th>
            <th>Cargo</th>
            <th>Calendario</th>
            <th>Horario</th>
            <th>Dia de trabajo</th>
            <th>Entrada-salida</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($resultados as $resultado)
            <tr>
                <td>{{ $resultado->name }}</td>
                <td>{{ $resultado->work_position }}</td>
                <td>{{ $resultado->start_date }} - {{ $resultado->end_date }}</td>
                <td>{{ $resultado->entry_time }} - {{ $resultado->departure_time }}</td>
                <td>{{ $resultado->workday}}</td>
                <td>{{ $resultado->aentry_time }} - {{ $resultado->adeparture_time }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
<div class="table-responsive">
    <table class="table" id="control-table">
        <thead>
        <tr>
            <th>Empleado</th>
            <th>Cargo</th>
            <th>Calendario</th>
            <th>Horario</th>
            <th>Dia de trabajo</th>
            <th>Entrada-salida</th>
            <th>Minutos</th>
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
                <td>
                
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
<div class="table-responsive">
    <table class="table" id="control-table">
        <thead>
        <tr>
            <th>Calendario</th>
            <th>Workday</th>
            <th>Entrada-salida</th>
            <th>Employee ID</th>
            <th>Llegó tarde?</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($resultados as $resultado)
            <tr>
                <td>{{ $resultado->start_date }} - {{ $resultado->end_date }}</td>
                <td>{{ $resultado->workday}}</td>
                <td>{{ $resultado->entry_time }} - {{ $resultado->departure_time }}</td>
                <td>{{ $resultado->name }}</td>
                <td>
                    
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
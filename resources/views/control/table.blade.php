<table>
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Fecha</th>
            <th>Entrada</th>
            <th>Salida</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($employes as $employe)
            <tr>
                <td>{{ $employe->name }}</td>
                <td>{{ $resultados->where('id_employe', $employes->id_employe)->first()->entry_time }}</td>
            </tr>
        @endforeach
    </tbody>
</table>

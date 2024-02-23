<div class="table-responsive">
    <table class="table table-hover shadow mb-5 rounded" id="soatGroups-table">
        <thead>
        <tr>
            <th>Grupo</th>
            <th>Cirujano</th>
            <th>Anestesiologo</th>
            <th>Ayudante</th>
            <th>Sala</th>
            <th>Materiales</th>
            <th>Total</th>
            <th colspan="3">Acciones</th>
        </tr>
        </thead>
        <tbody>
        @foreach($soatGroups as $soatGroup)
            <tr>
                <td><strong>{{ $soatGroup->group }}</strong></td>
                <td>{{ number_format($soatGroup->surgeon, 0, ',', '.'); }}</td>
                <td>{{ number_format($soatGroup->anesthed, 0, ',', '.'); }}</td>
                <td>{{ number_format($soatGroup->assistant, 0, ',', '.'); }}</td>
                <td>{{ number_format($soatGroup->room, 0, ',', '.'); }}</td>
                <td>{{ number_format($soatGroup->materials, 0, ',', '.'); }}</td>
                <td>{{ number_format($soatGroup->total, 0, ',', '.'); }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['soatGroups.destroy', $soatGroup->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        @can('update_soat')
                            <a href="{{ route('soatGroups.edit', [$soatGroup->id]) }}"
                            class='btn btn-default btn-xs'>
                                <i class="far fa-edit" style="color: #6c6d77"></i>
                            </a>
                        @endcan
                        @can('destroy_soat')
                            {!! Form::button('<i class="far fa-trash-alt" style="color: #da1b1b"></i>', ['type' => 'submit', 'class' => 'btn btn-default btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                        @endcan
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

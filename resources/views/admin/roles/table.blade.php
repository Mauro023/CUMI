<div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Identificador</th>
                <th>Nombre</th>
                <th>Permisos</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($roles as $role)
                <tr>
                    <td>{{ $role->id }}</td>
                    <td>{{ $role->name }}</td>
                    <td>{{ $role->display_name }}</td>
                    <td>{{ $role->permissions->pluck('display_name')->implode(', ') }}</td>
                    <td>
                        @can('update', $role)
                            <a href="{{ route('admin.roles.edit', $role) }}"
                                class="btn btn-sm btn-outline-info"
                            ><i class="fa fa-edit"></i></a>
                        @endcan
                        @can('delete', $role)
                            @if ($role->id !== 1)
                                <form method="POST"
                                    action="{{ route('admin.roles.destroy', $role) }}"
                                    style="display: inline">
                                    {{ csrf_field() }} {{ method_field('DELETE') }}
                                    <button class="btn btn-sm btn-outline-danger"
                                        onclick="return confirm('¿Estás seguro de querer eliminar esta Role?')"
                                    ><i class="far fa-trash-alt"></i></button>
                                </form>
                            @endif
                        @endcan
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
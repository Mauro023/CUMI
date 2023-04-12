<div class="table-responsive">
    <table class="table table-hover">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Email</th>
                <th>Roles</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->getRoleDisplayNames() }}</td>
                    <td>
                        <a href="{{ route('admin.users.show', $user) }}"
                            class="btn btn-sm btn-outline-primary"
                        ><i class="fa fa-eye"></i></a>
                        <a href="{{ route('admin.users.edit', $user) }}"
                            class="btn btn-sm btn-outline-info"
                        ><i class="far fa-edit"></i></a>
                        <form method="POST"
                            action="{{ route('admin.users.destroy', $user) }}"
                            style="display: inline">
                            {{ csrf_field() }} {{ method_field('DELETE') }}
                            <button class="btn btn-sm btn-outline-danger"
                                onclick="return confirm('¿Estás seguro de querer eliminar esta usuario?')"
                            ><i class="far fa-trash-alt"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
<div class="card-footer mr-auto">
    {{ $users->links() }}
</div>
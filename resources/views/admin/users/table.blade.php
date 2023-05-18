<div class="table-responsive">
    <table class="table table-hover mb-0">
        <thead>
            <tr>
                <th>#</th>
                <th>Nombre</th>
                <th>Email</th>
                <th>Roles</th>
                @canany(['show_user', 'update_user', 'destroy_user'])
                    <th>Acciones</th>
                @endcan
            </tr>
        </thead>
        <tbody>
            @php
                $contador = 0;
            @endphp
            @foreach ($users as $user)
                @php
                    $contador += 1;
                @endphp
                <tr>
                    <td><strong>{{$contador}}</strong></td>
                    <td> 
                       <a>{{ $user->name }}</a>
                        <br>
                        <small style="color: #69C5A0"><strong>Creado {{ $user->created_at->format('Y-m-d')}}</strong></small></td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->getRoleDisplayNames() }}</td>
                    <td>
                        @can('update_user')
                            <a href="{{ route('admin.users.edit', $user) }}"
                                class="btn btn-sm btn-default text-white"
                            ><i class="far fa-edit" style="color: #6c6d77"></i></a>
                        @endcan
                        <form method="POST"
                            action="{{ route('admin.users.destroy', $user) }}"
                            style="display: inline">
                            {{ csrf_field() }} {{ method_field('DELETE') }}
                            @can('destroy_user')
                                <button class="btn btn-sm btn-default"
                                    onclick="return confirm('¿Estás seguro de querer eliminar esta usuario?')"
                                ><i class="far fa-trash-alt" style="color: #da1b1b"></i></button>
                            @endcan
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
<div class="card-footer mr-auto" style="background-color: white">
    {{ $users->links() }}
</div>
<div class="table-responsive">
    <table class="table table-hover" id="employes-table">
        <thead>
        <tr>
            <th>Empleado</th>
            <th>Cargo</th>
            <th>Unidad</th>
            <th class="text-center">Centro de costo</th>
            @canany(['show_employes', 'update_employes', 'destroy_employes'])
                <th colspan="3">Acciones</th>
            @endcan
        </tr>
        </thead>
        <tbody>
        @foreach($employes as $employe)
            <tr>
                <td>
                    {{ $employe->name }}
                    <br>
                    <small>{{ $employe->dni }}</small>
                </td>
                <td>{{ $employe->work_position }}</td>
                <td>{{ $employe->unit }}</td>
                <td class="text-center">{{ $employe->cost_center }}</td>
                <td>
                    
                    <div class='btn-group'>
                        @can('show_employes')
                        <button type="button" class='btn btn-default btn-xs' 
                            data-bs-toggle="modal" data-bs-target="#staticShow{{ $employe->id }}">
                            <i class="far fa-eye"></i>
                        </button>
                        @endcan
                        @can('update_employes')
                            <a href="{{ route('employes.edit', [$employe->id]) }}"
                            class='btn btn-default btn-xs'>
                                <i class="far fa-edit"></i>
                            </a>
                        @endcan
                        @can('destroy_employes')
                        {!! Form::open(['route' => ['employes.destroy', $employe->id], 'method' => 'delete']) !!}
                            {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Se necesita confirmacion para realizar este proceso')"]) !!}
                        {!! Form::close() !!}
                        @endcan
                    </div>     
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
<div class="card-footer mr-auto">
    {{ $employes->links() }}
</div>

@foreach($employes as $employe)       
    <!-- Modal show-->
    <div class="col-md-3">
    
        <div class="modal fade" id="staticShow{{ $employe->id }}" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="ribbon-wrapper">
                        <div class="ribbon bg-primary">
                            Perfil
                        </div>
                    </div>
                    <div class="card card-outline card-green order-card mb-0">               
                        <div class="card-body box-profile">
                            <div class="text-center">
                                <img class="profile-user-img img-fluid img-circle" src="{{ asset('images/CUMI.jpg') }}"
                                    alt="User profile picture">
                            </div>
                            <h3 class="profile-username text-center">{{ $employe->name }}</h3>
                            <p class="text-muted text-center">{{ $employe->work_position }}</p>
                            <ul class="list-group list-group-unbordered mb-3">
                                <li class="list-group-item">
                                    <b>DNI</b> <p class="float-right">{{ $employe->dni }}</p>
                                </li>
                                <li class="list-group-item">
                                    <b>Unidad</b> <p class="float-right">{{ $employe->unit }}</p>
                                </li>
                                <li class="list-group-item">
                                    <b>Centro de costos</b> <p class="float-right">{{ $employe->cost_center }}</p>
                                </li>
                                <li class="list-group-item">
                                    <b>Creado</b> <p class="float-right">{{ $employe->created_at->format('Y-m-d') }}</p>
                                </li>
                                <li class="list-group-item">
                                    <b>Modificado</b> <p class="float-right">{{ $employe->updated_at->format('Y-m-d') }}</p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach

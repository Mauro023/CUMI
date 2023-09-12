<div class="table-responsive">
    <table class="table table-hover mb-0" id="employes-table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Empleado</th>
            <th scope="col">Cargo</th>
            <th scope="col">Unidad</th>
            <th class="text-center" scope="col">Centro de costo</th>
            @canany(['show_employes', 'update_employes', 'destroy_employes'])
                <th colspan="3">Acciones</th>
            @endcan
        </tr>
        </thead>
        <tbody class="table-group-divider">
        @foreach($employes as $employe)  
            <tr>
                <td><strong>{{$employe->id}}</strong></td>
                <td>
                    {{ $employe->name }}
                    <br>
                    <small style="color: #69C5A0"><strong>{{ $employe->dni }}</strong></small>
                </td>
                <td scope="row" style="vertical-align: middle">{{ $employe->work_position }}</td>
                <td scope="row" style="vertical-align: middle">{{ $employe->unit }}</td>
                <td class="text-center" style="vertical-align: middle">{{ $employe->cost_center }}</td>
                <td>
                    
                    {!! Form::open(['route' => ['employes.destroy', $employe->id], 'method' => 'delete'
                    , 'class' => "eliminarEmloyeForm"]) !!}
                    <div class='btn-group'>
                        @can('show_employes')
                        <button type="button" class='btn btn-default btn-xs' 
                            data-bs-toggle="modal" data-bs-target="#staticShow{{ $employe->id }}">
                            <i class="far fa-eye" style="color: #13A4DA"></i>
                        </button>
                        @endcan
                        @can('update_employes')
                            <a href="{{ route('employes.edit', [$employe->id]) }}"
                            class='btn btn-default btn-xs'>
                                <i class="far fa-edit" style="color: #6c6d77"></i>
                            </a>
                        @endcan
                        @can('destroy_employes')
                            {!! Form::button('<i class="far fa-trash-alt" style="color: #da1b1b"></i>', ['type' => 'submit', 'class' => 'btn btn-default btn-xs']) !!}
                        {!! Form::close() !!}
                        @endcan
                    </div>     
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div id="app">
    </div>
    <script src="{{ asset('js/app.js') }}"></script>
</div>
<div class="card-footer mr-auto" style="background-color: white">
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
                        <div class="ribbon bg-green">
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
                                    <span class="far fa-address-card" style="color: #69C5A0"></span>
                                    <b style="color: #69C5A0"><strong>DNI</strong></b> <p class="float-right">{{ $employe->dni }}</p>
                                </li>
                                <li class="list-group-item">
                                    <span class="far fa-user-circle" style="color: #69C5A0"></span>
                                    <b style="color: #69C5A0"><strong>Unidad</strong></b> <p class="float-right">{{ $employe->unit }}</p>
                                </li>
                                <li class="list-group-item">
                                    <span class="far fa-hospital" style="color: #69C5A0"></span>
                                    <b style="color: #69C5A0"><strong>Centro de costos</strong></b> <p class="float-right">{{ $employe->cost_center }}</p>
                                </li>
                                <li class="list-group-item">
                                    <span class="far fa-calendar-check" style="color: #69C5A0"></span>
                                    <b style="color: #69C5A0"><strong>Creado</strong></b> <p class="float-right">{{ $employe->created_at->format('Y-m-d') }}</p>
                                </li>
                                <li class="list-group-item">
                                    <span class="far fa-edit" style="color: #69C5A0"></span>
                                    <b style="color: #69C5A0"><strong>Modificado</strong></b> <p class="float-right">{{ $employe->updated_at->format('Y-m-d') }}</p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const eliminarUsuarioForms = document.querySelectorAll('.eliminarEmloyeForm');
    
        eliminarUsuarioForms.forEach((form) => {
            form.addEventListener('submit', function (event) {
                event.preventDefault(); // Previene la acción por defecto del formulario
                const currentForm = this; // Obtén el formulario actual
    
                Swal.fire({
                    title: '¿Estás seguro de querer eliminar este registro?',
                    html: 'Esta acción eliminará permanentemente el contrato del empleado.<br><strong style= "color: red";>Esta acción no se puede deshacer.</strong>',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Sí, eliminarlo',
                    cancelButtonText: 'Cancelar',
                    customClass: {
                        title: 'custom-title', // Clase personalizada para el título
                        content: 'custom-content', // Clase personalizada para el contenido
                        icon: 'custom-icon' // Clase personalizada para el icono
                    }
                }).then((result) => {
                    if (result.isConfirmed) {
                        // El usuario confirmó la eliminación, envía el formulario actual
                        currentForm.submit();
                    }
                });
            });
        });
    });
</script>

<style>
    .custom-title {
        color: #14ABE3;
        /* Cambia el color del título a rojo */
    }

    .custom-icon::before {
        color: #cf33ff;
        /* Cambia el color del icono a rojo */
    }
</style>
<div class="mt-1">
    <li class="nav-item text-with-shadow">
        <a href="{{ route('home') }}" class="nav-link {{ Request::is('home*') ? 'active' : '' }}">
            <span class="fas fa-home"></span>
            <p><strong>Home</strong></p>
        </a>
    </li>

    @can('view_user')
    <li class="nav-item">
        <a href="{{ route('admin.users.index') }}" class="nav-link {{ Request::is('admin/users*') ? 'active' : '' }}">
            <span class="fas fa-users"></span>
            <p><strong>Usuarios</strong></p>
        </a>
    </li>
    @endcan

    <!-- Sidebar -->
    @canany(['view_employes', 'view_contracts'])
    <li class="nav-item has-treeview">
        <a class="nav-link">
            <i class="fas fa-user-tie"></i>
            <p>
                <strong>Personal</strong>
                <i class="fas fa-angle-left right"></i>
            </p>
        </a>
        <ul class="nav nav-treeview">
            <li class="nav-item">
                @can('view_employes')
                <a href="{{ route('employes.index') }}" class="nav-link {{ Request::is('employes*') ? 'active' : '' }}">
                    <span class="fas fa-id-badge"></span>
                    <p><strong>Empleados</strong></p>
                </a>
                @endcan
            </li>
            <li class="nav-item">
                @can('view_contracts')
                <a href="{{ route('contracts.index') }}"
                    class="nav-link {{ Request::is('contracts*') ? 'active' : '' }}">
                    <span class="fas fa-file-alt"></span>
                    <p><strong>Contratos</strong></p>
                </a>
                @endcan
            </li>
        </ul>
    </li>
    @endcanany
    <!-- Fin Sidebar -->

    <!-- Sidebar -->
    @canany(['view_calendars', 'view_attendances', 'view_logistic'])
    <li class="nav-item has-treeview">
        <a class="nav-link">
            <i class="fas fa-hourglass-half"></i>
            <p>
                <strong>Horario Laboral</strong>
                <i class="fas fa-angle-left right"></i>
            </p>
        </a>
        <ul class="nav nav-treeview">
            <li class="nav-item">
                @can('view_calendars')
                <a href="{{ route('calendars.index') }}"
                    class="nav-link {{ Request::is('calendars*') ? 'active' : '' }}">
                    <span class="fas fa-calendar-alt"></span>
                    <p><strong>Calendarios</strong></p>
                </a>
                @endcan
            </li>
            <li class="nav-item">
                @can('view_attendances')
                <a href="{{ route('attendances.index') }}"
                    class="nav-link {{ Request::is('attendances*') ? 'active' : '' }}">
                    <span class="fas fa-fingerprint"></span>
                    <p><strong>Asistencias</strong></p>
                </a>
                @endcan
            </li>
            <li class="nav-item">
                @can('view_logistic')
                <a href="{{ route('attendanceReport.logistic') }}"
                    class="nav-link {{ Route::currentRouteName() === 'attendanceReport.logistic' ? 'active' : '' }}">
                    <span class="fas fa-tree"></span>
                    <p><strong>Logistica</strong></p>
                </a>
                @endcan
            </li>
            <li class="nav-item">
                @can('view_user')
                <a href="{{ route('control.index') }}" class="nav-link {{ Request::is('control*') ? 'active' : '' }}">
                    <span class="fas fa-calendar-check"></span>
                    <p><strong>Control</strong></p>
                </a>
                @endcan
            </li>
            <li class="nav-item">
                @can('view_user')
                <a href="{{ route('attendances.count') }}"
                    class="nav-link {{ Route::currentRouteName() === 'attendances.count' ? 'active' : '' }}">
                    <span class="fas fa-info"></span>
                    <p><strong>Contadores</strong></p>
                </a>
                @endcan
            </li>
        </ul>
    </li>
    @endcanany
    <!-- Fin Sidebar -->

    <!-- Sidebar -->
    @canany(['view_endowments', 'view_cards'])
    <li class="nav-item has-treeview">
        <a class="nav-link">
            <i class="fas fa-clipboard-check"></i>
            <p>
                <strong>Entrega</strong>
                <i class="fas fa-angle-left right"></i>
            </p>
        </a>
        <ul class="nav nav-treeview">
            <li class="nav-item">
                @can('view_endowments')
                <a href="{{ route('endowments.index') }}"
                    class="nav-link {{ Request::is('endowments*') ? 'active' : '' }}">
                    <span class="fas fa-tshirt"></span>
                    <p><strong>Dotacion</strong></p>
                </a>
                @endcan
            </li>
            <li class="nav-item">
                @can('view_cards')
                <a href="{{ route('cards.index') }}" class="nav-link {{ Request::is('cards*') ? 'active' : '' }}">
                    <span class="fas fa-address-card"></span>
                    <p><strong>Carnet</strong></p>
                </a>
                @endcan
            </li>
        </ul>
    </li>
    @endcanany
    <!-- Fin Sidebar -->

    <li class="nav-item">
        @can('view_medicines')
    <li class="nav-item has-treeview">
        <a class="nav-link">
            <i class="fas fa-clinic-medical"></i>
            <p>
                <strong>Farmacia</strong>
                <i class="fas fa-angle-left right"></i>
            </p>
        </a>
        <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="{{ route('medicines.index') }}"
                    class="nav-link {{ Request::is('medicines*') ? 'active' : '' }}">
                    <span class="fas fa-capsules"></span>
                    <p><strong>Recepcion tecnica</strong></p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('medicationTemplates.index') }}"
                    class="nav-link {{ Request::is('medicationTemplates*') ? 'active' : '' }}">

                    <span class="fas fa-file-medical"></span>
                    <p><strong>Plantilla</strong></p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('invimaRegistrations.index') }}"
                    class="nav-link {{ Request::is('invimaRegistrations*') ? 'active' : '' }}">
                    <span class="fas fa-check"></span>
                    <p><Strong>Registro invima</Strong></p>
                </a>
            </li>
        </ul>
    </li>
    @endcan
    </li>

    <li class="nav-item">
        @can('view_medicines')
    <li class="nav-item has-treeview">
        <a href="" class="nav-link {{ Request::is('invimaRegistrations*') ? 'active' : '' }}">
            <span class="fas fa-coins"></span>
            <p><Strong>Costos</Strong></p>
        </a>
    </li>
    @endcan
    </li>

    <li class="nav-item">
        <a href="#" class="nav-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <span class="fas fa-sign-out-alt"></span>
            <p><strong>Cerrar sesion</strong></p>
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
    </li>
</div>


<style>
    .nav-pills .nav-link {
        background-color: transparent;
        color: #6B6B6B;
    }

    .nav-pills .nav-link.active {
        background-color: white;
        color: #14ABE3;
        border: 2px solid transparent;
        border-image: linear-gradient(to right, #14ABE3, lightgreen);
        /* Degradado lineal */
        border-image-slice: 1;
        /* Hace que el degradado cubra todo el borde */
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2);
    }

    .nav-link .nav-item:hover {
        background-color: transparent;
        color: red;
    }
</style>
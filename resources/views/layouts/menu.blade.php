
    <li>
        <a href="{{ route('home') }}" class="nav-link-inside {{ Request::is('home*') ? 'active' : '' }}">
            <i class="fas fa-home"></i>
            <span>Home</span>
        </a>
    </li>

    @can('view_user')
    <li>
        <a href="{{ route('admin.users.index') }}" class="nav-link-inside {{ Request::is('admin/users*') ? 'active' : '' }}">
            <i class="fas fa-users"></i>
            <span>Usuarios</span>
        </a>
    </li>
    @endcan

    <!-- Sidebar -->
    @canany(['view_employes', 'view_contracts'])
    <li class="list_item" style="display: block">
        <div class="list_button_click">
            <a href="#">
                <i class="fas fa-user-tie"></i>
                <span>Personal</span>
                <i class="fas fa-angle-left right"></i>
            </a>
        </div>
        <ul class="list_show">
            <li class="list_inside">
                @can('view_employes')
                <a href="{{ route('employes.index') }}" class="nav-link-inside {{ Request::is('employes*') ? 'active' : '' }}">
                    <i class="fas fa-id-badge"></i>
                    <span>Empleados</span>
                </a>
                @endcan
            </li>
            <li class="list_inside">
                @can('view_contracts')
                <a href="{{ route('contracts.index') }}"
                    class="nav-link-inside {{ Request::is('contracts*') ? 'active' : '' }}">
                    <i class="fas fa-file-alt"></i>
                    <span>Contratos</span>
                </a>
                @endcan
            </li>
        </ul>
    </li>
    @endcanany
    <!-- Fin Sidebar -->

    <!-- Sidebar -->
    @canany(['view_calendars', 'view_attendances', 'view_logistic'])
    <li class="list_item" style="display: block">
        <div class="list_button_click">
            <a>
                <i class="fas fa-hourglass-half"></i>
                <span>Horario Laboral</span>
                <i class="fas fa-angle-left right"></i>
            </a>
        </div>
        <ul class="list_show">
            <li class="list_inside">
                @can('view_calendars')
                <a href="{{ route('calendars.index') }}"
                    class="nav-link-inside {{ Request::is('calendars*') ? 'active' : '' }}">
                    <i class="fas fa-calendar-alt"></i>
                    <span>Calendarios</span>
                </a>
                @endcan
            </li>
            <li class="list_inside">
                @can('view_attendances')
                <a href="{{ route('attendances.index') }}"
                    class="nav-link-inside {{ Request::is('attendances*') ? 'active' : '' }}">
                    <i class="fas fa-fingerprint"></i>
                    <span>Asistencias</span>
                </a>
                @endcan
            </li>
            <li class="list_inside">
                @can('view_logistic')
                <a href="{{ route('attendanceReport.logistic') }}"
                    class="nav-link-inside {{ Route::currentRouteName() === 'attendanceReport.logistic' ? 'active' : '' }}">
                    <i class="fas fa-tree"></i>
                    <span>Logistica</span>
                </a>
                @endcan
            </li>
            <li class="list_inside">
                @can('view_user')
                <a href="{{ route('control.index') }}" class="nav-link-inside {{ Request::is('control*') ? 'active' : '' }}">
                    <i class="fas fa-calendar-check"></i>
                    <span>Control</span>
                </a>
                @endcan
            </li>
            <li class="list_inside">
                @can('view_user')
                <a href="{{ route('attendances.count') }}"
                    class="nav-link-inside {{ Route::currentRouteName() === 'attendances.count' ? 'active' : '' }}">
                    <i class="fas fa-info"></i>
                    <span>Contadores</span>
                </a>
                @endcan
            </li>
        </ul>
    </li>
    @endcanany
    <!-- Fin Sidebar -->

    <!-- Sidebar -->
    @canany(['view_endowments', 'view_cards'])
    <li class="list_item" style="display: block">
        <div class="list_button_click">
            <a class="nav-link-inside">
                <i class="fas fa-clipboard-check"></i>
                <span>Entrega</span>
                <i class="fas fa-angle-left right"></i>
            </a>
        </div>
        <ul class="list_show">
            <li class="list_inside">
                @can('view_endowments')
                <a href="{{ route('endowments.index') }}"
                    class="nav-link-inside {{ Request::is('endowments*') ? 'active' : '' }}">
                    <i class="fas fa-tshirt"></i>
                    <span>Dotacion</span>
                </a>
                @endcan
            </li>
            <li class="list_inside">
                @can('view_cards')
                <a href="{{ route('cards.index') }}" class="nav-link-inside {{ Request::is('cards*') ? 'active' : '' }}">
                    <i class="fas fa-address-card"></i>
                    <span>Carnet</span>
                </a>
                @endcan
            </li>
        </ul>
    </li>
    @endcanany
    <!-- Fin Sidebar -->


    @can('view_medicines')
    <li class="list_item" style="display: block">
        <div class="list_button_click">
            <a class="nav-link-inside">
                <i class="fas fa-clinic-medical"></i>
                <span>Farmacia</span>
                <i class="fas fa-angle-left right"></i>
            </a>
        </div>
        <ul class="list_show">
            <li class="nav-item">
                <a href="{{ route('medicines.index') }}"
                    class="nav-link-inside {{ Request::is('medicines*') ? 'active' : '' }}">
                    <i class="fas fa-capsules"></i>
                    <span>Recepcion tecnica</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('medicationTemplates.index') }}"
                    class="nav-link-inside {{ Request::is('medicationTemplates*') ? 'active' : '' }}">
                    <i class="fas fa-file-medical"></i>
                    <span>Plantilla</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('invimaRegistrations.index') }}"
                    class="nav-link-inside {{ Request::is('invimaRegistrations*') ? 'active' : '' }}">
                    <i class="fas fa-check"></i>
                    <span>Registro invima</span>
                </a>
            </li>
        </ul>
    </li>
    @endcan


    @can('view_costos')
    <li>
        <a href="{{ route('costs.index') }}" class="nav-link-inside {{ Request::is('costs*') ? 'active' : '' }}">
            <i class="fas fa-coins"></i>
            <span>Costos</span>
        </a>
    </li>
    @endcan

    <li class="nav-item">
        <a href="#" class="nav-link-inside" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <i class="fas fa-sign-out-alt"></i>
            <span>Cerrar sesion</span>
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
    </li>



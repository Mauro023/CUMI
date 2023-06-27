<div class="text-center">
    <a class="nav-link">
        <p class="text-dark"><strong>{{ Auth::user()->name }}</strong></p>
    </a>
</div>
<div class="mt-1">
    <div class="mt-5">
        <li class="nav-item">
            <a href="{{ route('home') }}" class="nav-link {{ Request::is('homes*') ? 'active' : '' }}">
                <span class="fas fa-home"></span>
                <p><strong>Home</strong></p>
            </a>
        </li>

        @can('view_user')
        <li class="nav-item">
            <a href="{{ route('admin.users.index') }}"
                class="nav-link {{ Request::is('admin/users*') ? 'active' : '' }}">
                <span class="fas fa-users"></span>
                <p><strong>Usuarios</strong></p>
            </a>
        </li>
        @endcan

        <!-- Sidebar -->
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
                    <a href="{{ route('employes.index') }}"
                        class="nav-link {{ Request::is('employes*') ? 'active' : '' }}">
                        <span class="fas fa-id-badge"></span>
                        <p><strong>Empleados</strong></p>
                    </a>
                    @endcan
                </li>
                <li class="nav-item">
                    <a href="{{ route('contracts.index') }}"
                        class="nav-link {{ Request::is('contracts*') ? 'active' : '' }}">
                        <span class="fas fa-file-alt"></span>
                        <p><strong>Contratos</strong></p>
                    </a>
                </li>
            </ul>
        </li>
        <!-- Fin Sidebar -->

        <!-- Sidebar -->
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
                        <span class="fas fa-clock"></span>
                        <p><strong>Asistencias</strong></p>
                    </a>
                    @endcan
                </li>
                <li class="nav-item">
                    @can('view_attendances')
                    <a href="{{ route('control.index') }}"
                        class="nav-link {{ Request::is('control*') ? 'active' : '' }}">
                        <span class="fas fa-calendar-check"></span>
                        <p><strong>Control</strong></p>
                    </a>
                    @endcan
                </li>
            </ul>
        </li>
        <!-- Fin Sidebar -->

        <!-- Sidebar -->
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
                    <a href="{{ route('endowments.index') }}" class="nav-link">
                        <span class="fas fa-tshirt"></span>
                        <p><strong>Dotacion</strong></p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('cards.index') }}" class="nav-link">
                        <span class="fas fa-address-card"></span>
                        <p><strong>Carnet</strong></p>
                    </a>
                </li>
            </ul>
        </li>
        <!-- Fin Sidebar -->

        <li class="nav-item">
            <a href="{{ route('medicines.index') }}" class="nav-link {{ Request::is('medicines*') ? 'active' : '' }}">
                <p>Medicinas</p>
            </a>
        </li>

        <li class="nav-item">
            <a href="#" class="nav-link"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <span class="fas fa-sign-out-alt"></span>
                <p><strong>Cerrar sesion</strong></p>
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </li>
    </div>
</div>
<li class="nav-item">
    <a href="{{ route('home') }}"
       class="nav-link {{ Request::is('homes*') ? 'active' : '' }}">
       <span class="fas fa-home"></span>
        <p>Home</p>
    </a>
</li>

@can('view_user')
    <li class="nav-item" >   
        <a href="{{ route('admin.users.index') }}"
        class="nav-link {{ Request::is('admin/users*') ? 'active' : '' }}">
        <span class="fas fa-user"></span>
        <p>Usuarios</p>
        </a>
    </li>
@endcan

@can('view_employes')
    <li class="nav-item">
        <a href="{{ route('employes.index') }}"
        class="nav-link {{ Request::is('employes*') ? 'active' : '' }}">
        <span class="fas fa-address-card"></span>
            <p>Empleados</p>
        </a>
    </li>
@endcan

@can('view_calendars')    
    <li class="nav-item">
        <a href="{{ route('calendars.index') }}"
        class="nav-link {{ Request::is('calendars*') ? 'active' : '' }}">
        <span class="fas fa-calendar-alt"></span>
            <p>Calendarios</p>
        </a>
    </li>
@endcan

@can('view_attendances')
    <li class="nav-item">
        <a href="{{ route('attendances.index') }}"
        class="nav-link {{ Request::is('attendances*') ? 'active' : '' }}">
        <span class="fas fa-clock"></span>
            <p>Asistencias</p>
        </a>
    </li>
@endcan

@can('view_attendances')
    <li class="nav-item">
        <a href="{{ route('control.index') }}"
        class="nav-link {{ Request::is('control*') ? 'active' : '' }}">
        <span class="fas fa-calendar-check"></span>
            <p>Control</p>
        </a>
    </li>
@endcan

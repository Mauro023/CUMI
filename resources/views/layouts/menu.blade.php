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
            <a href="{{ route('admin.users.index') }}" class="nav-link {{ Request::is('admin/users*') ? 'active' : '' }}">
                <span class="fas fa-users"></span>
                <p><strong>Usuarios</strong></p>
            </a>
        </li>
        @endcan
        
        @can('view_employes')
        <li class="nav-item">
            <a href="{{ route('employes.index') }}" class="nav-link {{ Request::is('employes*') ? 'active' : '' }}">
                <span class="fas fa-address-card"></span>
                <p><strong>Empleados</strong></p>
            </a>
        </li>
        @endcan
        
        @can('view_calendars')
        <li class="nav-item">
            <a href="{{ route('calendars.index') }}" class="nav-link {{ Request::is('calendars*') ? 'active' : '' }}">
                <span class="fas fa-calendar-alt"></span>
                <p><strong>Calendarios</strong></p>
            </a>
        </li>
        @endcan
        
        @can('view_attendances')
        <li class="nav-item">
            <a href="{{ route('attendances.index') }}" class="nav-link {{ Request::is('attendances*') ? 'active' : '' }}">
                <span class="fas fa-clock"></span>
                <p><strong>Asistencias</strong></p>
            </a>
        </li>
        @endcan
        
        @can('view_attendances')
        <li class="nav-item">
            <a href="{{ route('control.index') }}" class="nav-link {{ Request::is('control*') ? 'active' : '' }}">
                <span class="fas fa-calendar-check"></span>
                <p><strong>Control</strong></p>
            </a>
        </li>
        @endcan

        <li class="nav-item">
            <a href="{{ route('contracts.index') }}"
               class="nav-link {{ Request::is('contracts*') ? 'active' : '' }}">
               <span class="fas fa-file-alt"></span>
                <p><strong>Contratos</strong></p>
            </a>
        </li>
        
        
        <li class="nav-item">
            <a href="{{ route('endowments.index') }}"
               class="nav-link {{ Request::is('endowments*') ? 'active' : '' }}">
               <span class="fas fa-tshirt"></span>
                <p><strong>Dotacion</strong></p>
            </a>
        </li>
        
        <li class="nav-item">
            <a href="{{ route('cards.index') }}"
               class="nav-link {{ Request::is('cards*') ? 'active' : '' }}">
               <span class="fas fa-address-card"></span>
                <p><strong>Carnet</strong></p>
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






@if(@Auth::user()->hasRole('admin'))
<li class="nav-item">
    <a href="{{ route('admin.users.index') }}"
       class="nav-link {{ Request::is('admin/users*') ? 'active' : '' }}">
       <p>Usuarios</p>
    </a>
</li>

@endif<li class="nav-item">
    <a href="{{ route('employes.index') }}"
       class="nav-link {{ Request::is('employes*') ? 'active' : '' }}">
        <p>Empleados</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('calendars.index') }}"
       class="nav-link {{ Request::is('calendars*') ? 'active' : '' }}">
        <p>Calendars</p>
    </a>
</li>



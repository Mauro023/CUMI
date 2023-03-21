@if(@Auth::user()->hasRole('admin'))
<li class="nav-item">
    <a href="{{ route('admin.users.index') }}"
       class="nav-link {{ Request::is('admin/users*') ? 'active' : '' }}">
       <p>Usuarios</p>
    </a>
</li>

@endif
<li class="nav-item">
    <a href="{{ route('employes.index') }}"
       class="nav-link {{ Request::is('employes*') ? 'active' : '' }}">
        <p>Empleados</p>
    </a>
</li>

<!-- <li class="nav-item has-submenu">
    <a href="" class="nav-link">Horarios</a>
    <ul class="submenu collapse">
			<li><a class="nav-link" href="#">Submenu item 4 </a></li>
			<li><a class="nav-link" href="#">Submenu item 5 </a></li>
			<li><a class="nav-link" href="#">Submenu item 6 </a></li>
			<li><a class="nav-link" href="#">Submenu item 7 </a></li>
		</ul>
</li> -->

<li class="nav-item">
    <a href="{{ route('calendars.index') }}"
       class="nav-link {{ Request::is('calendars*') ? 'active' : '' }}">
        <p>Calendarios</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('attendances.index') }}"
       class="nav-link {{ Request::is('attendances*') ? 'active' : '' }}">
        <p>Asistencias</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('control.index') }}"
       class="nav-link {{ Request::is('control*') ? 'active' : '' }}">
        <p>Control</p>
    </a>
</li>


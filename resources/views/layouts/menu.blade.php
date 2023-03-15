@if(@Auth::user()->hasRole('admin'))
<li class="nav-item">
    <a href="{{ route('admin.users.index') }}"
       class="nav-link {{ Request::is('admin/users*') ? 'active' : '' }}">
       <p>Usuarios</p>
    </a>
</li>

@endif
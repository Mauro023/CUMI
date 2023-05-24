<aside class="main-sidebar  elevation-6 " style="background-color:#EAEAEA">
    <div class="text-center mt-4">
        <a>
            <img 
            src="{{ asset('images/icono_Mesa-de-trabajo-1.png') }}"
                 alt="{{ config('app.name') }} Logo"
                 class="brand-image" style="max-width: 55px;">
        </a>
    </div>
    <div class="sidebar">
        <nav>
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                @include('layouts.menu')
            </ul>
        </nav>
    </div>
</aside>

<style>
    .nav-pills .nav-link.active {
        background-color: transparent;
        color: #13A4DA;
    }
</style>

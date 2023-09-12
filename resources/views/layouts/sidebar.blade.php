<aside class="main-sidebar" style="overflow-x: hidden;">

    <div class="card card-widget widget-user">
        <div class="widget-user-header text-white"
            style="background: url({{ asset('images/IMG_9515.jpg') }}) center center; background-size: cover;">
            <div class="widget-user-image">
                <img class="img-circle elevation-2" src="{{ asset('images/icono_Mesa-de-trabajo-1.png') }}"
                    alt="{{ config('app.name') }} Logo" class="brand-image"
                    style="background-color: white; max-width: 85%;">
            </div>
            <div>
                <a class="nav-link">
                    <p class="text-white"><strong>{{ Auth::user()->name }}</strong></p>
                </a>
            </div>
        </div>

        <div class="card-footer" style="background: linear-gradient(to bottom, #EAEAEA, #F7F7F7);">
            <div class="row">
                <div class="sidebar">
                    <nav>
                        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                            data-accordion="false">
                            @include('layouts.menu')
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</aside>

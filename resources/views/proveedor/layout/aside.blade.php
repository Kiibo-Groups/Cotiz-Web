<aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">


        @if (
            (auth()->user()->status == 0 && auth()->user()->role == 4) ||
                (auth()->user()->status == 0 && auth()->user()->role == 5))
            <li class="nav-item">
                <a class="nav-link @if (!Route::is('home')) collapsed @endif"
                    href="{{ Asset(env('user') . '/proveedor/perfil') }}">
                    <i class="bi bi-gear"></i>
                    <span>Perfil</span>
                </a>
            </li><!-- End Dashboard Nav -->


            <li class="nav-item">
                <a class="nav-link @if (!Route::is('home')) collapsed @endif"
                    href="{{ Asset(env('user') . '/solicitud') }}">
                    <i class="bi bi-briefcase"></i>
                    <span>Solicitudes</span>
                </a>
            </li><!-- End Dashboard Nav -->
            <li class="nav-item">
                <a class="nav-link @if (!Route::is('home')) collapsed @endif"
                    href="{{ Asset(env('user') . '/usuarios') }}">
                    <i class="bi bi-person"></i>
                    <span>Usuarios</span>
                </a>
            </li><!-- End Dashboard Nav -->
            <li class="nav-item">
                <a class="nav-link @if (!Route::is('buzon') || !Route::is('buzon.show')) collapsed @endif" data-bs-target="#buzon-nav"
                    data-bs-toggle="collapse" href="#">
                    <i class="bi bi-briefcase"></i><span>Buzón</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="buzon-nav" class="nav-content  collapse @if (Route::is('buzon') || Route::is('buzon.show')) show @endif"
                    data-bs-parent="#buzon-nav">
                    <li>
                        <a href="{{ Asset(env('user') . '/buzon') }}"
                            class="@if (Route::is('buzon')) active @endif">
                            <i class="bi bi-circle"></i><span>Listado</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ Asset(env('user') . '/buzon/agregar') }}"
                            class="@if (Route::is('buzon.show')) active @endif">
                            <i class="bi bi-circle"></i><span>Agregar</span>
                        </a>
                    </li>
                </ul>
            </li><!-- End buzon -->

            <li class="nav-item">
                <a class="nav-link @if (!Route::is('catalogo') || !Route::is('catalogo.show')) collapsed @endif" data-bs-target="#catalogo-nav"
                    data-bs-toggle="collapse" href="#">
                    <i class="bi bi-building"></i><span>Catálogos</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="catalogo-nav" class="nav-content  collapse @if (Route::is('add_certificados') ||
                        Route::is('add_referencias') ||
                        Route::is('catalogo_create_post') ||
                        Route::is('catalogo_edit') ||
                        Route::is('catalogo_ver') ||
                        Route::is('catalogo') ||
                        Route::is('catalogo.show')) show @endif"
                    data-bs-parent="#catalogo-nav">
                    <li>
                        <a href="{{ Asset(env('user') . '/catalogo') }}"
                            class="@if (Route::is('catalogo')) active @endif">
                            <i class="bi bi-circle"></i><span>Listado</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ Asset(env('user') . '/catalogo/add') }}"
                            class="@if (Route::is('catalogo.show')) active @endif">
                            <i class="bi bi-circle"></i><span>Agregar Servicio</span>
                        </a>
                    </li>
                </ul>
            </li><!-- End catalogo -->
        @endif


        <li class="nav-heading">
            <hr />
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ url('./') }}" target="_blank">
                <i class="bx bxs-navigation"></i>
                <span>Ir al WebSite</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('logout') }}"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="bi bi-person"></i>
                <span>Cerrar sessión</span>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </a>
        </li><!-- End Profile Page Nav -->

    </ul>
</aside>

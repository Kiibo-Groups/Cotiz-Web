@inject('admin', 'App\Models\Admin')
<aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link @if (!Route::is('home')) collapsed @endif"
                href="{{ Asset(env('admin') . '/dash') }}">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li><!-- End Dashboard Nav -->


        @if (auth('admin')->user()->status == 0)
        @else
            @if (
                $admin->hasPerm('Dashboard - Inicio') ||
                    $admin->hasPerm('Dashboard - Configuraciones') ||
                    $admin->hasPerm('Dashboard - All'))
                <li class="nav-item">
                    <a class="nav-link @if (!Route::is('profile') || !Route::is('settings')) collapsed @endif" data-bs-target="#settings-nav"
                        data-bs-toggle="collapse" href="#">
                        <i class="bi bi-gear"></i><span>Panel</span><i class="bi bi-chevron-down ms-auto"></i>
                    </a>
                    <ul id="settings-nav" class="nav-content collapse @if (Route::is('profile') || Route::is('settings')) show @endif"
                        data-bs-parent="#settings-nav">
                        @if ($admin->hasPerm('Dashboard - Inicio') || $admin->hasPerm('Dashboard - Configuraciones'))
                            <li>
                                <a href="{{ Asset(env('admin') . '/profile') }}"
                                    class="@if (Route::is('profile')) nav-link active @endif">
                                    <i class="bi bi-circle"></i><span>Perfil</span>
                                </a>
                            </li>
                        @endif
                        @if ($admin->hasPerm('All'))
                            <li>
                                <a href="{{ Asset(env('admin') . '/subAccounts') }}"
                                    class="@if (Route::is('subAccounts')) active @endif">
                                    <i class="bi bi-circle"></i><span>SubCuentas</span>
                                </a>
                            </li>
                        @endif
                    </ul>
                </li><!-- End Settings -->
            @endif

            @if ($admin->hasPerm('Dashboard - Empresas'))
                <li class="nav-item">
                    <a class="nav-link @if (!Route::is('empresas')) collapsed @endif"
                        href="{{ Asset(env('admin') . '/empresas') }}">
                        <i class="bi bi-bag"></i>
                        <span>Empresas</span>
                    </a>
                </li><!-- End Empresas -->
            @endif

            @if ($admin->hasPerm('Dashboard - empresasProveedores'))
                <li class="nav-item">
                    <a class="nav-link @if (!Route::is('empresasProveedores')) collapsed @endif"
                        href="{{ Asset(env('admin') . '/empresas/proveedores') }}">
                        <i class="bi bi-ui-checks-grid"></i>
                        <span>Proveedores</span>
                    </a>
                </li><!-- End empresas Proveedores -->
            @endif

            {{--    @if ($admin->hasPerm('Dashboard - Usuarios'))
            <li class="nav-item">
            <a class="nav-link @if (!Route::is('users')) collapsed @endif" href="{{ Asset(env('admin').'/users') }}">
                <i class="bi bi-person-lines-fill"></i>
                <span>Usuarios</span>
            </a>
            </li><!-- End Users -->
            @endif --}}

            @if (
                $admin->hasPerm('Dashboard - Usuarios') ||
                    $admin->hasPerm('Usuarios - Empresa') ||
                    $admin->hasPerm('Usuarios - Proveedor') ||
                    $admin->hasPerm('Usuarios - Prueba'))
                <li class="nav-item">
                    <a class="nav-link @if (!Route::is('users') || !Route::is('users.show')) collapsed @endif"
                        data-bs-target="#usuarios-nav" data-bs-toggle="collapse" href="#">
                        <i class="bi bi-people"></i><span>Usuarios</span><i class="bi bi-chevron-down ms-auto"></i>
                    </a>
                    <ul id="usuarios-nav" class="nav-content  collapse @if (Route::is('users') || Route::is('users.show') || Route::is('userspanel.show') || Route::is('userspanel')) show @endif"
                        data-bs-parent="#usuarios-nav">
                        @if ($admin->hasPerm('Usuarios - Empresa'))
                            <li>
                                <a href="{{ Asset(env('admin') . '/users') }}"
                                    class="@if (Route::is('users')) active @endif">
                                    <i class="bi bi-circle"></i><span>Empresa</span>
                                </a>
                            </li>
                        @endif
                        @if ($admin->hasPerm('Usuarios - Proveedor'))
                            <li>
                                <a href="{{ Asset(env('admin') . '/userspanel/proveedor') }}"
                                    class="@if (Route::is('userspanel.show')) active @endif">
                                    <i class="bi bi-circle"></i><span>Proveedor</span>
                                </a>
                            </li>
                        @endif
                        @if ($admin->hasPerm('Usuarios - Prueba'))
                            <li>
                                <a href="{{ Asset(env('admin') . '/userspanel') }}"
                                    class="@if (Route::is('userspanel')) active @endif">
                                    <i class="bi bi-circle"></i><span>Prueba</span>
                                </a>
                            </li>
                        @endif
                    </ul>
                </li><!-- End Providers -->
            @endif


            @if ($admin->hasPerm('Dashboard - Servicios'))
                <li class="nav-item">
                    <a class="nav-link @if (!Route::is('services') || !Route::is('services.show')) collapsed @endif"
                        data-bs-target="#services-nav" data-bs-toggle="collapse" href="#">
                        <i class="bi bi-building"></i><span>Catálogos</span><i class="bi bi-chevron-down ms-auto"></i>
                    </a>
                    <ul id="services-nav" class="nav-content  collapse @if (Route::is('services') || Route::is('services.show') || (Route::is('catalogo') || Route::is('catalogo.show'))) show @endif"
                        data-bs-parent="#services-nav">
                        <li>
                            <a href="{{ Asset(env('admin') . '/services') }}"
                                class="@if (Route::is('services')) active @endif">
                                <i class="bi bi-circle"></i><span>Producto</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ Asset(env('admin') . '/catalogo/servicio') }}"
                                class="@if (Route::is('catalogo.show')) active @endif">
                                <i class="bi bi-circle"></i><span>Servicio</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ Asset(env('admin') . '/catalogo') }}"
                                class="@if (Route::is('catalogo')) active @endif">
                                <i class="bi bi-circle"></i><span>Personal</span>
                            </a>
                        </li>
                    </ul>
                </li><!-- End Services -->
            @endif

            @if ($admin->hasPerm('Dashboard - Solicitudes'))
                <li class="nav-item">
                    <a class="nav-link @if (!Route::is('requests') || !Route::is('services.show')) collapsed @endif"
                        data-bs-target="#request-nav" data-bs-toggle="collapse" href="#">
                        <i class="bi bi-gear"></i><span>Solicitudes</span><i class="bi bi-chevron-down ms-auto"></i>
                    </a>
                    <ul id="request-nav" class="nav-content  collapse @if  (Route::is('serviciosVer') || Route::is('requests') || Route::is('servicios.show') || Route::is('servicios')) show @endif"
                        data-bs-parent="#sidebar-nav">
                        <li>
                            <a href="{{ Asset(env('admin') . '/servicios') }}"
                                class="@if (Route::is('servicios')) active @endif">
                                <i class="bi bi-circle"></i><span>Empresas</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ Asset(env('admin') . '/servicios/proveedores') }}"
                                class="@if (Route::is('servicios.show')) active @endif">
                                <i class="bi bi-circle"></i><span>Proveedores</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ Asset(env('admin') . '/requests') }}"
                                class="@if (Route::is('requests')) active @endif">
                                <i class="bi bi-circle"></i><span>Prueba</span>
                            </a>
                        </li>
                    </ul>
                </li><!-- End Request -->
            @endif


{{--
            @if ($admin->hasPerm('Buzon - Empresa'))
                <li class="nav-item">
                    <a class="nav-link @if (!Route::is('buzonempresa') || !Route::is('buzonempresa.show')) collapsed @endif" data-bs-target="#buzonempresa-nav"
                        data-bs-toggle="collapse" href="#">
                        <i class="bi bi-briefcase"></i><span>Buzón Empresa</span><i
                            class="bi bi-chevron-down ms-auto"></i>
                    </a>
                    <ul id="buzonempresa-nav" class="nav-content  collapse @if (Route::is('buzonempresa') || Route::is('buzonempresa.show')) show @endif"
                        data-bs-parent="#buzonempresa-nav">
                        <li>
                            <a href="{{ Asset(env('admin') . '/buzonempresa') }}"
                                class="@if (Route::is('buzonempresa')) active @endif">
                                <i class="bi bi-circle"></i><span>Listado</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ Asset(env('admin') . '/buzonempresa/agregar') }}"
                                class="@if (Route::is('buzonempresa.show')) active @endif">
                                <i class="bi bi-circle"></i><span>Agregar</span>
                            </a>
                        </li>
                    </ul>
                </li><!-- End buzon Empresa-->
            @endif--}}

            @if ($admin->hasPerm('Buzon - Proveedor'))
                <li class="nav-item">
                    <a class="nav-link @if (!Route::is('buzon') || !Route::is('buzon.show')) collapsed @endif" data-bs-target="#buzon-nav"
                        data-bs-toggle="collapse" href="#">
                        <i class="bi bi-briefcase"></i><span>Buzón Proveedor</span><i
                            class="bi bi-chevron-down ms-auto"></i>
                    </a>
                    <ul id="buzon-nav" class="nav-content  collapse @if (Route::is('buzon') || Route::is('buzon.show')) show @endif"
                        data-bs-parent="#buzon-nav">
                        <li>
                            <a href="{{ Asset(env('admin') . '/buzon') }}"
                                class="@if (Route::is('buzon')) active @endif">
                                <i class="bi bi-circle"></i><span>Listado</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ Asset(env('admin') . '/buzon/agregar') }}"
                                class="@if (Route::is('buzon.show')) active @endif">
                                <i class="bi bi-circle"></i><span>Agregar</span>
                            </a>
                        </li>
                    </ul>
                </li><!-- End buzon -->
            @endif


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

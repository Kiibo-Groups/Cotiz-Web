@inject('admin', 'App\Models\User')
<aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">


        @if (
            (auth()->user()->status == 0 && auth()->user()->role == 3) ||
                (auth()->user()->status == 0 && auth()->user()->role == 1))



            <li class="nav-item">
                <a class="nav-link @if (!Route::is('home')) collapsed @endif"
                    href="{{ Asset(env('user') . '/empresa/perfil') }}">
                    <i class="bi bi-gear"></i>
                    <span>Perfil</span>
                </a>
            </li><!-- End Dashboard Nav -->
            @if ($admin->hasPerm('Solicitudes'))
                <li class="nav-item">
                    <a class="nav-link @if (!Route::is('solicitud')) collapsed @endif"
                        href="{{ Asset(env('user') . '/empresa/solicitud') }}">
                        <i class="bi bi-briefcase"></i>
                        <span>Solicitudes</span>
                    </a>
                </li><!-- End Dashboard Nav -->
            @endif

            @if ($admin->hasPerm('SubCuentas'))
                <li class="nav-item">
                    <a class="nav-link @if (!Route::is('home')) collapsed @endif"
                        href="{{ Asset(env('user') . '/empresa/subAccounts') }}">
                        <i class="bi bi-ui-checks-grid"></i>
                        <span>SubCuentas</span>
                    </a>
                </li><!-- End Dashboard Nav -->
            @endif
            @if ($admin->hasPerm('Usuarios'))
                <li class="nav-item">
                    <a class="nav-link @if (!Route::is('home')) collapsed @endif"
                        href="{{ Asset(env('user') . '/empresa/users') }}">
                        <i class="bi bi-person"></i>
                        <span>Usuarios</span>
                    </a>
                </li><!-- End Dashboard Nav -->
            @endif



        @endif

        @if (auth()->user()->role == 2)

                <li class="nav-item">
                    <a class="nav-link @if (!Route::is('solicitudprueba')) collapsed @endif"
                        href="{{ Asset(env('user') . '/prueba/solicitud') }}">
                        <i class="bi bi-briefcase"></i>
                        <span>Solicitudes</span>
                    </a>
                </li><!-- End Dashboard Nav -->

        @endif




        <li class="nav-heading">
            <hr />
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ url('./') }}" target="_blank">
                <i class="bx bxs-navigation"></i>
                <span>Crear Solicitud</span>
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

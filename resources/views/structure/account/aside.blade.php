
<aside id="sidebar" class="sidebar">
  <ul class="sidebar-nav" id="sidebar-nav">

    

    @if (Auth::user()->role == 2)
    <li class="nav-item">
      <a class="nav-link @if(!Route::is('dash')) collapsed @endif" href="{{ Asset(env('user').'/') }}">
        <i class="bi bi-grid"></i>
        <span>Dashboard</span>
      </a>
    </li><!-- End Dashboard Nav -->

    <li class="nav-item">
      <a class="nav-link @if(!Route::is('services') || !Route::is('services.show')) collapsed @endif" data-bs-target="#services-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-building"></i><span>Servicios</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="services-nav" class="nav-content  collapse @if(Route::is('services') || Route::is('services.show'))  show @endif" data-bs-parent="#services-nav">
        <li>
          <a href="{{ Asset(env('user').'/services') }}" class="@if(Route::is('services')) active @endif">
            <i class="bi bi-circle"></i><span>Listado</span>
          </a>
        </li>
        <li>
          <a href="{{ Asset(env('user').'/services/add') }}" class="@if(Route::is('services.show')) active @endif">
            <i class="bi bi-circle"></i><span>Agregar Servicio</span>
          </a>
        </li>
      </ul>
    </li><!-- End Services -->

    <li class="nav-item">
      <a class="nav-link @if(!Route::is('settings')) collapsed @endif" data-bs-target="#settings-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-gear"></i><span>Configuración</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="settings-nav" class="nav-content  collapse @if(Route::is('settings'))  show @endif" data-bs-parent="#sidebar-nav">
        <li>
          <a href="{{ Asset(env('user').'/settings') }}" class="@if(Route::is('settings')) active @endif">
            <i class="bi bi-circle"></i><span>Perfil</span>
          </a>
        </li>
      </ul>
    </li><!-- End Settings -->

    <li class="nav-item">
      <a class="nav-link @if(!Route::is('request_user')) collapsed @endif" data-bs-target="#request-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-gear"></i><span>Solicitudes</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="request-nav" class="nav-content  collapse @if(Route::is('request_user'))  show @endif" data-bs-parent="#sidebar-nav">
        <li>
          <a href="{{ Asset(env('user').'/request') }}" class="@if(Route::is('request_user')) active @endif">
            <i class="bi bi-circle"></i><span>Lista</span>
          </a>
        </li>
      </ul>
    </li><!-- End Request -->
    @else
    <li class="nav-item">
      <a class="nav-link @if(!Route::is('home')) collapsed @endif" href="{{ Asset(env('user').'/home') }}">
        <i class="bi bi-grid"></i>
        <span>Configuración</span>
      </a>
    </li><!-- End Dashboard Nav -->
    <!--<li class="nav-item">
      <a class="nav-link @if(!Route::is('settings')) collapsed @endif" data-bs-target="#settings-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-gear"></i><span>Configuración</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="settings-nav" class="nav-content  collapse @if(Route::is('settings'))  show @endif" data-bs-parent="#sidebar-nav">
        <li>
          <a href="{{ Asset(env('user').'/settings') }}" class="@if(Route::is('settings')) active @endif">
            <i class="bi bi-circle"></i><span>Perfil</span>
          </a>
        </li>
      </ul>
    </li> End Settings -->

    <li class="nav-item">
      <a class="nav-link @if(!Route::is('request_user')) collapsed @endif" data-bs-target="#request-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-gear"></i><span>Tus solicitudes</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="request-nav" class="nav-content  collapse @if(Route::is('request_user'))  show @endif" data-bs-parent="#sidebar-nav">
        <li>
          <a href="{{ Asset(env('user').'/request') }}" class="@if(Route::is('request_user')) active @endif">
            <i class="bi bi-circle"></i><span>Lista</span>
          </a>
        </li>
      </ul>
    </li><!-- End Request -->
    <li class="nav-item">
      <a class="nav-link @if(!Route::is('notifications')) collapsed @endif" href="{{ Asset(env('user').'/notifications') }}">
        <i class="bi bi-grid"></i>
        <span>Notificaciones</span>
      </a>
    </li><!-- End Dashboard Nav -->
    @endif

    <li class="nav-heading">
      <hr />
    </li>
 
     <li class="nav-item">
      <a class="nav-link collapsed" href="{{ url('./') }}">
        <i class="bx bxs-navigation"></i>
        <span>Ir al WebSite</span>
      </a>
    </li> 

    <li class="nav-item">
      <a class="nav-link collapsed" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
        <i class="bi bi-person"></i>
        <span>Cerrar sessión</span>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
      </a>
    </li><!-- End Profile Page Nav -->

  </ul>
</aside>

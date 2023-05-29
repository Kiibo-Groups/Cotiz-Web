<aside id="sidebar" class="sidebar">
  <ul class="sidebar-nav" id="sidebar-nav">

    <li class="nav-item">
      <a class="nav-link @if(!Route::is('home')) collapsed @endif" href="{{ Asset(env('admin').'/dash') }}">
        <i class="bi bi-grid"></i>
        <span>Dashboard</span>
      </a>
    </li><!-- End Dashboard Nav -->

    <li class="nav-item">
      <a class="nav-link @if(!Route::is('profile') || !Route::is('settings')) collapsed @endif" data-bs-target="#settings-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-gear"></i><span>Panel</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="settings-nav" class="nav-content collapse @if(Route::is('profile') || Route::is('settings'))  show @endif" data-bs-parent="#settings-nav">
        <li>
          <a href="{{ Asset(env('admin').'/profile') }}" class="@if(Route::is('profile'))nav-link active @endif">
            <i class="bi bi-circle"></i><span>Perfil</span>
          </a>
        </li>
        <!-- <li>
          <a href="{{ Asset(env('admin').'/settings') }}" class="@if(Route::is('settings')) active @endif">
            <i class="bi bi-circle"></i><span>Configuraciones</span>
          </a>
        </li> -->
      </ul>
    </li><!-- End Settings -->

    <li class="nav-item">
      <a class="nav-link @if(!Route::is('users')) collapsed @endif" href="{{ Asset(env('admin').'/users') }}">
        <i class="bi bi-person-lines-fill"></i>
        <span>Usuarios</span>
      </a>
    </li><!-- End Users -->

    <li class="nav-item">
      <a class="nav-link @if(!Route::is('providers') || !Route::is('providers.show')) collapsed @endif" data-bs-target="#providers-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-ui-checks-grid"></i><span>Proveedores</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="providers-nav" class="nav-content  collapse @if(Route::is('providers') || Route::is('providers.show'))  show @endif" data-bs-parent="#providers-nav">
        <li>
          <a href="{{ Asset(env('admin').'/providers') }}" class="@if(Route::is('providers')) active @endif">
            <i class="bi bi-circle"></i><span>Listado</span>
          </a>
        </li>
        <li>
          <a href="{{ Asset(env('admin').'/providers/add') }}" class="@if(Route::is('providers.show')) active @endif">
            <i class="bi bi-circle"></i><span>Agregar Proveedor</span>
          </a>
        </li>
      </ul>
    </li><!-- End Providers -->

    <li class="nav-item">
      <a class="nav-link @if(!Route::is('services') || !Route::is('services.show')) collapsed @endif" data-bs-target="#services-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-building"></i><span>Servicios</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="services-nav" class="nav-content  collapse @if(Route::is('services') || Route::is('services.show'))  show @endif" data-bs-parent="#services-nav">
        <li>
          <a href="{{ Asset(env('admin').'/services') }}" class="@if(Route::is('services')) active @endif">
            <i class="bi bi-circle"></i><span>Listado</span>
          </a>
        </li>
        <li>
          <a href="{{ Asset(env('admin').'/services/add') }}" class="@if(Route::is('services.show')) active @endif">
            <i class="bi bi-circle"></i><span>Agregar Servicio</span>
          </a>
        </li>
      </ul>
    </li><!-- End Services -->

    <li class="nav-item">
      <a class="nav-link @if(!Route::is('request')) collapsed @endif" data-bs-target="#request-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-gear"></i><span>Solicitudes</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="request-nav" class="nav-content  collapse @if(Route::is('request'))  show @endif" data-bs-parent="#sidebar-nav">
        <li>
          <a href="{{ Asset(env('admin').'/request') }}" class="@if(Route::is('request')) active @endif">
            <i class="bi bi-circle"></i><span>Lista</span>
          </a>
        </li>
      </ul>
    </li><!-- End Request -->

    <li class="nav-heading">
      <hr />
    </li>

    <!-- 
    <li class="nav-item">
      <a class="nav-link collapsed" href="{{ url('./') }}" target="_blank">
        <i class="bx bxs-navigation"></i>
        <span>Ir al WebSite</span>
      </a>
    </li>-->

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

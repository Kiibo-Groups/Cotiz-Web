
<aside id="sidebar" class="sidebar">
  <ul class="sidebar-nav" id="sidebar-nav">

    <li class="nav-item">
      <a class="nav-link @if(!Route::is('home')) collapsed @endif" href="{{ Asset(env('user').'/home') }}">
        <i class="bi bi-grid"></i>
        <span>Dashboard</span>
      </a>
    </li><!-- End Dashboard Nav -->

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
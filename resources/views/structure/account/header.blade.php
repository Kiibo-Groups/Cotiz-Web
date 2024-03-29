<header id="header" class="header fixed-top d-flex align-items-center">

  <div class="d-flex align-items-center justify-content-between">
    <i class="bi bi-list toggle-sidebar-btn"></i>

    @if (Auth::user()->role == 2)
    <a href="{{ Asset(env('user').'/') }}" class="logo d-flex align-items-center">
        <img src="{{ asset('assets2/images/logo-cotiz.png')}}" alt="" width="100px">
    </a>
    @else
    <a href="{{ Asset(env('user').'/home') }}" class="logo d-flex align-items-center">
      <img src="{{ asset('assets2/images/logo-cotiz.png')}}" alt="" width="100px">
    </a>
    @endif

  </div><!-- End Logo -->


  <nav class="header-nav ms-auto">
    <ul class="d-flex align-items-center">

      <li class="nav-item dropdown pe-3">

        <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            @if(Auth::user()->pic_profile)
                <div style="background-image:url('{{ asset('assets/img/logos/'.Auth::user()->pic_profile) }}');background-size: cover;width: 40px;height: 40px;border-radius:2003px; background-position: center center;"></div>
            @endif
          <span class="d-none d-md-block dropdown-toggle ps-2">{{ Auth::user()->name }} .<?php echo substr(Auth::user()->last_name,0,1) ?></span>
        </a><!-- End Profile Iamge Icon -->

        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
          <li class="dropdown-header">
            <h6>{{Auth::user()->name}} {{ Auth::user()->last_name }}</h6>
            <span>Bienvenido(a)</span>
          </li>
          <li>
            <hr class="dropdown-divider">
          </li>

          <li>
            <a class="dropdown-item d-flex align-items-center" href="{{ Asset(env('user').'/settings')}}">
              <i class="bi bi-person"></i>
              <span>Mi perfil</span>
            </a>
          </li>
          <li>
            <hr class="dropdown-divider">
          </li>

          <li>
            <a class="dropdown-item d-flex align-items-center" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
              <i class="bi bi-box-arrow-right"></i>
              <span>Cerrar sessión</span>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                  @csrf
              </form>
            </a>
          </li>

        </ul><!-- End Profile Dropdown Items -->
      </li><!-- End Profile Nav -->

    </ul>
  </nav><!-- End Icons Navigation -->

</header><!-- End Header -->

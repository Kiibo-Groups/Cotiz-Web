<header id="header" class="header fixed-top d-flex align-items-center">

  <div class="d-flex align-items-center justify-content-between">
    <a href="./dash" class="logo d-flex align-items-center">
      <img src="{{ asset('assets2/images/logo-cotiz.png')}}" alt="" width="100px">
      <span class="d-none d-lg-block" style="padding-left:10px;">Cotiz Admin</span>
    </a>
    <i class="bi bi-list toggle-sidebar-btn"></i>
  </div><!-- End Logo -->


  <nav class="header-nav ms-auto">
    <ul class="d-flex align-items-center">

      <li class="nav-item dropdown pe-3">

        <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
          <span class="d-none d-md-block dropdown-toggle ps-2">Administrador</span>
        </a><!-- End Profile Iamge Icon -->

        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
          <li class="dropdown-header">
            <h6>Administrador</h6>
            <span>Bienvenido(a)</span>
          </li>
          <li>
            <hr class="dropdown-divider">
          </li>

        {{--  <li>
            <a class="dropdown-item d-flex align-items-center" href="{{ Asset(env('admin').'/settings')}}">
              <i class="bi bi-person"></i>
              <span>Mi perfil</span>
            </a>
          </li>
          <li>
            <hr class="dropdown-divider">
          </li>

          <li>
            <a class="dropdown-item d-flex align-items-center" href="pages-faq.html">
              <i class="bi bi-question-circle"></i>
              <span>Need Help?</span>
            </a>
          </li>--}}
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

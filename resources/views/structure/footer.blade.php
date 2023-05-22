

<footer class="wrapper bg-dark angled">
  <div class="container pb-7 pt-7 pt-md-11 pb-8">
    <div class="row gx-lg-0 gy-6">
      <div class="col-lg-4">
        <div class="widget">
          <img class="mb-4" src="{{ asset('assets/img/logo-light.png') }}" srcset="{{ asset('assets/img/logo-light@2x.png 2x') }}" alt="" />
          <p class="lead text-white mb-0">{{$admin->short_descript}}</p>
        </div>
        <!-- /.widget -->
      </div>
      <!-- /column -->
      <div class="col-lg-3 offset-lg-2">
        <div class="widget">
          <div class="d-flex flex-row">
            <div>
              <div class="icon text-primary fs-28 me-4 mt-n1"> <i class="uil uil-phone-volume"></i> </div>
            </div>
            <div>
              <h5 class="mb-1 text-white">Telefono</h5>
              <p class="mb-0 text-white">{{$admin->phone_contact}}</p>
            </div>
          </div>
          <!--/div -->
        </div>
        <!-- /.widget -->
      </div>
      <!-- /column -->
      <div class="col-lg-3">
        <div class="widget">
          <div class="d-flex flex-row">
            <div>
              <div class="icon text-primary fs-28 me-4 mt-n1"> <i class="uil uil-location-pin-alt"></i> </div>
            </div>
            <div class="align-self-start justify-content-start">
              <h5 class="mb-1 text-white">Dirección</h5>
              <address class="text-white">{{$admin->address}}</address>
            </div>
          </div>
          <!--/div -->
        </div>
        <!-- /.widget -->
      </div>
      <!-- /column -->
    </div>
    <!--/.row -->
    <hr class="mt-13 mt-md-14 mb-7" />
    <div class="d-md-flex align-items-center justify-content-between">
      <p class="mb-2 mb-lg-0 text-white">© 2022 Engine. All rights reserved.</p>
      <nav class="nav social social-muted mb-0 text-md-end text-white">
        @if($admin->twitter)<a href="{{ $admin->twitter }}" target="_blank"><i class="uil uil-twitter"></i></a>@endif
        @if($admin->fb)<a href="{{ $admin->fb }}" target="_blank"><i class="uil uil-facebook-f"></i></a> @endif
        @if($admin->insta)<a href="{{ $admin->insta }}" target="_blank"><i class="uil uil-instagram"></i></a>@endif
        @if($admin->youtube)<a href="{{ $admin->youtube }}" target="_blank"><i class="uil uil-youtube"></i></a>@endif
      </nav>
      <!-- /.social -->
    </div>
  </div>
  <!-- /.container -->
</footer>


  
  <div class="progress-wrap">
    <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
      <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
    </svg>
  </div>
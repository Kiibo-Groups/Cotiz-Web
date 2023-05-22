<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Engine descubre nuestros mejores eventos y agenda una llamada con nuestros mejores mentores.">
    <meta name="keywords" content="Mentorias, Eventos, Inversiones, Startups, DQV, Kiibo Groups">
    <meta name="author" content="elemis">
    <title>Engine | WebSite</title>
    <!-- ========== Links ========== -->
    @include("structure.main")
    <!-- CSS -->
</head>
<body class="antialiased">
    <div class="content-wrapper" id="app">
        <!-- Nav -->
        @include("structure.header")
        <!-- /nav -->

        <!-- Main -->
        <main>
            @yield('content') 
        </main>
        <!-- Main -->

        @if(!isset($_COOKIE['privacyCookies']))
        <div class="modal fade modal-bottom-center modal-popup" id="cookiesPolicy" tabindex="-1">
            <div class="modal-dialog modal-xl">
              <div class="modal-content">
                <div class="modal-body p-6">
                  <div class="row">
                    <div class="col-md-12 col-lg-8 mb-4 mb-lg-0 my-auto align-items-center">
                      <h4 class="mb-2">Política de cookies</h4>
                      <p class="mb-0">Usamos cookies para personalizar el contenido y hacer que nuestro sitio sea más fácil de usar.</p>
                    </div>
                    <!--/column -->
                    <div class="col-md-5 col-lg-4 text-lg-end my-auto">
                      <a href="#" class="btn btn-primary rounded-pill" id="ec-modal-close" data-bs-dismiss="modal" aria-label="Close">Entiendo</a>
                    </div>
                    <!--/column -->
                  </div>
                  <!--/.row -->
                </div>
                <!--/.modal-body -->
              </div>
              <!--/.modal-content -->
            </div>
        </div>
        <!--/.modal --> 
        @endif
    </div>
    <!-- /.content-wrapper -->

    <!-- Footer -->
        @include("structure.footer")
    <!-- Footer -->

    <!-- JS -->
        @include("structure.footerjs")
    <!-- JS -->

    @yield('js')
</body>
</html>

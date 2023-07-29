<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="light scroll-smooth" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
        content="Cotiz descubre nuestros mejores eventos y agenda una llamada con nuestros mejores mentores.">
    <meta name="keywords" content="Mentorias, Eventos, Inversiones, Startups, DQV, Kiibo Groups">
    <meta name="author" content="Kiibo Groups">
    <meta name="website" content="https://kiibo.mx" />
    <meta name="email" content="soporte@kiibo.mx" />
    <title>Cotiz | WebSite</title>
    <meta name="version" content="1.6.0" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico" />
    <!-- Css -->
    <link href="{{ asset('assets2/libs/tiny-slider/tiny-slider.css') }}" rel="stylesheet">
    <link href="{{ asset('assets2/libs/choices.js/public/assets/styles/choices.min.css') }}" rel="stylesheet">
    <!-- Main Css -->
    <link href="{{ asset('assets2/libs/@iconscout/unicons/css/line.css') }}" type="text/css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('assets2/css/icons.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets2/css/tailwind.css') }}" />
</head>

<body class="font-nunito text-base text-black dark:text-white dark:bg-slate-900">
    <!-- Loader Start
    <div id="preloader">
        <div id="status">
            <div class="spinner">
                <div class="double-bounce1"></div>
                <div class="double-bounce2"></div>
            </div>
        </div>
    </div>
    Loader End -->

    <nav id="topnav" class="defaultscroll is-sticky bg-white dark:bg-slate-900">
        <div class="container">
            <!-- Logo container-->
            <a class="logo ltr:pl-0 rtl:pr-0" href="{{ route('init') }}">
                <img src="{{ asset('assets2/images/logo.png') }}" style="width: 50px;" class="inline-block dark:hidden"
                    alt="">
                <img src="{{ asset('assets2/images/logo.png') }}" style="width: 50px;" class="hidden dark:inline-block"
                    alt="">
            </a>

            <!--Login button Start-->

            <ul class="buy-button list-none mb-0">
                @if (!Auth::user())
                    <li class="inline mb-0">
                        <a href="{{ route('login') }}" class="btn btn-icon rounded-full hover:text-black">
                            <i data-feather="user" class="h-4 w-4"></i></a>
                    </li>
                @else
                    @if (Auth::user()->pic_profile)
                        <li class="inline mb-0">
                            @if (Auth::user()->role == 2)
                                <a href="{{ asset(env('user')) }}" class="btn" style="border: none;">
                                    <div
                                        style="background-image:url('{{ asset('assets/img/logos/' . Auth::user()->pic_profile) }}');background-size: cover;width: 40px;height: 40px;border-radius:2003px; background-position: center center;">
                                    </div>
                                </a>
                            @else
                                <a href="{{ asset(env('user') . '/home') }}" class="btn" style="border: none;">
                                    <div
                                        style="background-image:url('{{ asset('assets/img/logos/' . Auth::user()->pic_profile) }}');background-size: cover;width: 40px;height: 40px;border-radius:2003px; background-position: center center;">
                                    </div>
                                </a>
                            @endif
                        </li>
                    @endif
                @endif

                <li class="inline mb-0">
                    <a href="{{ route('contact') }}" class="btn btn-icon rounded-full hover:text-black">
                        <i data-feather="phone" class="h-4 w-4"></i></a>
                </li>

                @if (Auth::user())
                    @if (Auth::user()->status == 0)
                        <li class="inline mb-0">
                            <a href="{{ asset(env('user') . '/perfil') }}"
                                class="btn btn-icon rounded-full hover:text-black" title="Perfil Usuario">
                                <i data-feather="user" class="h-4 w-4"></i></a>
                        </li>
                    @endif
                    <li class="inline mb-0">
                        <a href="{{ route('logout') }}" class="btn btn-icon rounded-full hover:text-black"
                            title="Salir"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i data-feather="log-out" class="h-4 w-4"></i></a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                        </a>
                    </li>

                @endif








            </ul>
            <!--Login button End-->
        </div>
        <!--end container-->
    </nav>

    <!-- Main -->
    <main>
        @yield('content')
    </main>
    <!-- Main -->


    <!-- Back to top -->
    <a href="#" onclick="topFunction()" id="back-to-top"
        class="back-to-top fixed hidden text-lg rounded-full z-10 bottom-5 ltr:left-5 rtl:left-5 h-9 w-9 text-center bg-indigo-600 text-white leading-9"><i
            class="uil uil-arrow-up"></i></a>
    <!-- Back to top -->

    <!-- JAVASCRIPTS -->
    <script src="{{ asset('assets2/libs/tiny-slider/min/tiny-slider.js') }}"></script>
    <script src="{{ asset('assets2/libs/choices.js/public/assets/scripts/choices.min.j') }}s"></script>
    <script src="{{ asset('assets2/libs/feather-icons/feather.min.js') }}"></script>
    <script src="{{ asset('assets2/js/plugins.init.js') }}"></script>
    <script src="{{ asset('assets2/js/app.js') }}"></script>
    <!-- JAVASCRIPTS -->
</body>

</html>

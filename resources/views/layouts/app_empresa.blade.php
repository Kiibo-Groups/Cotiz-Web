<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Panel adminisrtativo para el sitio web Cotiz.mx">
    <meta name="keywords" content="Administrative Panel, business, DQV, Kiibo, DesarrollosQV, KiiboGroups">
    <meta name="author" content="DesarrollosQV, Kiibo Groups">

    <title>@yield('title')</title>
    <!-- Favicons -->
    <link href="{{ asset('assets/img/favicon.png') }}" rel="icon">
    <link href="{{ asset('assets/img/favicon.png') }}" rel="apple-touch-icon">
    <!-- ========== Links ========== -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css')}}">

    @include("structure.account.main")
</head>
<body>

    <!-- ======= Header ======= -->
    @if(Auth::guard()->check())
        @include("proveedor.layout.header")
    @else
        @include("structure.account.header")
    @endif

    <!-- ======= Sidebar ======= -->
    @if(Auth::guard()->check())
        @include("empresa.layout.aside")
    @else
        @include("structure.account.aside")
    @endif
    <!-- ======= Main ======= -->
    <main id="main" class="main">
        @if(Session::has('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <h6 class="mb-0 text-white">ERROR</h6>
            {{ Session::get('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        @endif

        @if(Session::has('message'))

        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <h6 class="mb-0 text-success">SUCCESS</h6>
            {{ Session::get('message') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif


        <!-- BreadCrbums -->
        <div class="pagetitle">
            <h1>@yield('page_active')</h1>
            <nav>
            <ol class="breadcrumb">
                @if(Auth::guard('admin')->check())
                <li class="breadcrumb-item"><a href="{{url(env('admin').'/dash')}}">Home</a></li>
                @else
                <li class="breadcrumb-item"><a href="{{url('./home')}}">Home</a></li>
                @endif
                <li class="breadcrumb-item active">@yield('page_active')</li>
            </ol>
            </nav>
        </div>

        <!-- Content Page -->
        @yield('content')
    </main>

    <!-- ======= Footer ======= -->
    @include("structure.account.footer")

    <!-- ======= FooterJS ======= -->
    @include("structure.account.footerjs")

    @yield('js')
</body>
</html>

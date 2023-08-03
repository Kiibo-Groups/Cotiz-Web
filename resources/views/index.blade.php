@extends('layouts.app_website')


@section('content')

    <!-- Start Hero -->
    <section class="md:h-screen py-36 h-auto relative flex items-center background-effect overflow-hidden"
        style="background-image: url('{{ asset('assets2/images/bg-login.jpg') }}');background-repeat: no-repeat;background-size: contain;">
        <div class="container-fluid">
            <div class="absolute inset-0 z-0 "
                style="background-image:url('{{ asset('assets2/images/job/curve-shape.png') }}')"></div>
        </div>
        <!--end container-->

        <div class="container z-1">



            @if (Auth::user())

                @if (Auth::user()->status == 0)
                    @if (Auth::user()->role == 4 || Auth::user()->role == 5)
                        <div class="grid grid-cols-1 mt-10">
                            <h4 class="lg:leading-normal leading-normal text-4xl lg:text-5xl mb-5 font-bold" style="color: #1E2351;">Encuentra los
                                mejores <br>
                                Productos <span style="color: #0000F4;">y/o Servicios</span></h4>
                            <p class="text-slate-400 text-lg max-w-xl">
                                Pretendemos ser una vitrina única a la que las empresas puedan acudir para
                                solicitar productos, servicios e incluso personal, de ciertos segmentos industriales.
                            </p>

                            <div class="grid lg:grid-cols-12 grid-cols-1" id="reserve-form" style="text-align: center">
                                <div class="lg:col-span-10 mt-8" style="text-align: center">
                                    <div class="bg-white dark:bg-slate-900 border-0 shadow rounded p-3">

                                        <form action="{{ url('/user/perfil') }}" method="GET">
                                            <div class="registration-form text-dark text-start">
                                                <div class="grid " style="text-align: center; cursor:pointer;">




                                                    <input type="submit" id="search" name="search"
                                                        title="Ir a panel administrativo"
                                                        class="btn text-white searchbtn submit-btn w-100; cursor:pointer;"
                                                        value="Bienvenido(a) {{ Auth::user()->name }}"
                                                        style="height: 60px;background: #0000F4;">
                                                </div>
                                                <!--end grid-->
                                            </div>
                                            <!--end container-->
                                        </form>
                                    </div>
                                </div>
                                <!--ed col-->
                            </div>
                            <!--end grid-->

                        </div>
                    @else
                        <div class="grid grid-cols-1 mt-10">
                            <h4 class="lg:leading-normal leading-normal text-4xl lg:text-5xl mb-5 font-bold" style="color: #1E2351;">Encuentra los
                                mejores <br>
                                Productos <span style="color: #0000F4;">y/o Servicios</span></h4>
                            <p class="text-slate-400 text-lg max-w-xl">
                                Pretendemos ser una vitrina única a la que las empresas puedan acudir para
                                solicitar productos, servicios e incluso personal, de ciertos segmentos industriales.
                            </p>

                            <div class="grid lg:grid-cols-12 grid-cols-1" id="reserve-form">
                                <div class="lg:col-span-10 mt-8">
                                    <div class="bg-white dark:bg-slate-900 border-0 shadow rounded p-3">

                                        @if (Session::has('message'))
                                            <hr />
                                            <br />
                                            <div class="alert alert-success alert-dismissible fade show" role="alert"
                                                style="background-color: #0000F4; color: white;  text-align: center">
                                                <h1 class="mb-0 text-success" style="font-size: 25px">
                                                    {{ Session::get('message') }}
                                                </h1>
                                            </div>
                                            <br />
                                            <hr />
                                        @endif

                                        <form action="{{ url('/search') }}" method="GET">
                                            <div class="registration-form text-dark text-start">
                                                <div class="grid lg:grid-cols-3 md:grid-cols-2 grid-cols-1 lg:gap-0 gap-6">
                                                    <div class="filter-search-form relative filter-border">
                                                        <input name="q" type="text" id="job-keyword"
                                                            class="form-input filter-input-box bg-gray-50 dark:bg-slate-800 border-0"
                                                            placeholder="Busca tus productos y/o servicios"
                                                            style="padding-left: 25px;">
                                                    </div>

                                                    <div class="filter-search-form relative filter-border">
                                                        <select class="form-select" name="type" data-trigger
                                                            id="choices-location" aria-label="Tipo de servicios"
                                                            style="padding-left: 25px;">
                                                            <option value="product">Productos</option>
                                                            <option value="service">Servicios</option>
                                                            <option value="employe">Profesionista</option>
                                                        </select>
                                                    </div>

                                                    <input type="submit" id="search" name="search"
                                                        class="btn text-white searchbtn submit-btn w-100" value="Buscar"
                                                        style="height: 60px;background: #0000F4;">
                                                </div>
                                                <!--end grid-->
                                            </div>
                                            <!--end container-->
                                        </form>
                                    </div>
                                </div>
                                <!--ed col-->
                            </div>
                            <!--end grid-->

                        </div>
                    @endif

                @endif
            @else
                <div class="grid grid-cols-1 mt-10">
                    <h4 class="lg:leading-normal leading-normal text-4xl lg:text-5xl mb-5 font-bold" style="color: #1E2351;">Encuentra los mejores
                        <br>
                        Productos <span style="color: #0000F4;">y/o Servicios</span>
                    </h4>
                    <p class="text-slate-400 text-lg max-w-xl">
                        Pretendemos ser una vitrina única a la que las empresas puedan acudir para
                        solicitar productos, servicios e incluso personal, de ciertos segmentos industriales.
                    </p>

                    <div class="grid lg:grid-cols-12 grid-cols-1" id="reserve-form">
                        <div class="lg:col-span-10 mt-8">
                            <div class="bg-white dark:bg-slate-900 border-0 shadow rounded p-3">

                                @if (Session::has('message'))
                                    <hr />
                                    <br />
                                    <div class="alert alert-success alert-dismissible fade show" role="alert"
                                        style="background-color: #0000F4; color: white;  text-align: center">
                                        <h1 class="mb-0 text-success" style="font-size: 25px"> {{ Session::get('message') }}
                                        </h1>
                                    </div>
                                    <br />
                                    <hr />
                                @endif

                                <form action="{{ url('/user/perfil') }}" method="GET">
                                    <div class="registration-form text-dark text-start">
                                        <div class="grid " style="text-align: center; cursor:pointer;">




                                            <input type="submit" id="search" name="search"
                                                title="Ir a panel administrativo"
                                                class="btn text-white searchbtn submit-btn w-100; cursor:pointer;"
                                                value="Bienvenido(a) . "
                                                style="height: 60px;background: #0000F4;">
                                        </div>
                                        <!--end grid-->
                                    </div>
                                    <!--end container-->
                                </form>
                            </div>
                        </div>
                        <!--ed col-->
                    </div>
                    <!--end grid-->

                </div>
            @endif


            <!--end grid-->
        </div>
        <!--end container-->

        <div class="absolute inset-0 bg-indigo-600/5"></div>
        <ul class="circles p-0 mb-0">
            <li class="brand-img"><img src="{{ asset('assets2/images/client/shree-logo.png') }}" class="w-9 h-9"
                    alt=""></li>
            <li class="brand-img"><img src="{{ asset('assets2/images/client/skype.png') }}" class="w-9 h-9"
                    alt="">
            </li>
            <li class="brand-img"><img src="{{ asset('assets2/images/client/snapchat.png') }}" class="w-9 h-9"
                    alt=""></li>
        </ul>
    </section>
    <!--end section-->
    <div class="relative">
        <div
            class="shape absolute right-0 sm:-bottom-px -bottom-[2px] left-0 overflow-hidden text-white dark:text-slate-900">
            <svg class="w-full h-auto" viewBox="0 0 2880 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M0 48H1437.5H2880V0H2160C1442.5 52 720 0 720 0H0V48Z" fill="currentColor"></path>
            </svg>
        </div>
    </div>
    <!-- End Hero -->




    <section class="relative">
        <div class="container">
            <div class="grid grid-cols-1 pb-8 text-center">
                <h3 class="mb-4 md:text-3xl md:leading-normal text-2xl leading-normal font-semibold">

                </h3>
            </div>
            <!--end grid-->
        </div>
    </section>

@endsection

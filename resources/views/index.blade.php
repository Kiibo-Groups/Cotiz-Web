@extends('layouts.app_website')

@section('content')

<!-- Start Hero -->
<section class="md:h-screen py-36 h-auto relative flex items-center background-effect overflow-hidden" style="background-image: url('{{ asset('assets2/images/job/job.jpg') }}')">
    <div class="container-fluid">
        <div class="absolute inset-0 z-0 "
        style="background-image:url('{{ asset('assets2/images/job/curve-shape.png') }}')"></div>
    </div><!--end container-->

    <div class="container z-1">
        <div class="grid grid-cols-1 mt-10">
            <h4 class="lg:leading-normal leading-normal text-4xl lg:text-5xl mb-5 font-bold">Encuentra los mejores <br> Productos <span class="text-indigo-600">y/o Servicios</span></h4>
            <p class="text-slate-400 text-lg max-w-xl">
                Pretendemos ser una vitrina única a la que las empresas puedan acudir para
                solicitar productos, servicios e incluso personal, de ciertos segmentos industriales.
            </p>
        
            <div class="grid lg:grid-cols-12 grid-cols-1" id="reserve-form">
                <div class="lg:col-span-10 mt-8">
                    <div class="bg-white dark:bg-slate-900 border-0 shadow rounded p-3">
                        <form action="{{ url('/search')}}" method="GET">
                            <div class="registration-form text-dark text-start">
                                <div class="grid lg:grid-cols-3 md:grid-cols-2 grid-cols-1 lg:gap-0 gap-6">
                                    <div class="filter-search-form relative filter-border">
                                        <input name="q" type="text" id="job-keyword" class="form-input filter-input-box bg-gray-50 dark:bg-slate-800 border-0" placeholder="Busca tus productos y/o servicios" style="padding-left: 25px;">
                                    </div>

                                    <div class="filter-search-form relative filter-border">
                                        <select class="form-select" name="type" data-trigger id="choices-location" aria-label="Tipo de servicios" style="padding-left: 25px;">
                                            <option value="product">Productos</option>
                                            <option value="service">Servicios</option>
                                            <option value="employe">Personal</option>
                                        </select>
                                    </div>
                                 
                                    <input type="submit" id="search" name="search" style="height: 60px;" class="btn bg-indigo-600 hover:bg-indigo-700 border-indigo-600 hover:border-indigo-700 text-white searchbtn submit-btn w-100" value="Buscar">
                                </div><!--end grid-->
                            </div><!--end container-->
                        </form>
                    </div>
                </div><!--ed col-->
            </div><!--end grid-->
 
        </div><!--end grid-->
    </div><!--end container-->

    <div class="absolute inset-0 bg-indigo-600/5"></div>
    <ul class="circles p-0 mb-0">
        <li class="brand-img"><img src="{{ asset('assets2/images/client/shree-logo.png') }}" class="w-9 h-9" alt=""></li>
        <li class="brand-img"><img src="{{ asset('assets2/images/client/skype.png') }}" class="w-9 h-9" alt=""></li>
        <li class="brand-img"><img src="{{ asset('assets2/images/client/snapchat.png') }}" class="w-9 h-9" alt=""></li>
        <li class="brand-img"><img src="{{ asset('assets2/images/client/spotify.png') }}" class="w-9 h-9" alt=""></li>
        <li class="brand-img"><img src="{{ asset('assets2/images/client/telegram.png') }}" class="w-9 h-9" alt=""></li>
        <li class="brand-img"><img src="{{ asset('assets2/images/client/whatsapp.png') }}" class="w-9 h-9" alt=""></li>
        <li class="brand-img"><img src="{{ asset('assets2/images/client/android.png') }}" class="w-9 h-9" alt=""></li>
        <li class="brand-img"><img src="{{ asset('assets2/images/client/facebook-logo-2019.png') }}" class="w-9 h-9" alt=""></li>
        <li class="brand-img"><img src="{{ asset('assets2/images/client/linkedin.png') }}" class="w-9 h-9" alt=""></li>
        <li class="brand-img"><img src="{{ asset('assets2/images/client/google-logo.png') }}" class="w-9 h-9" alt=""></li>
    </ul>
</section><!--end section-->
<div class="relative">
    <div class="shape absolute right-0 sm:-bottom-px -bottom-[2px] left-0 overflow-hidden text-white dark:text-slate-900">
        <svg class="w-full h-auto" viewBox="0 0 2880 48" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M0 48H1437.5H2880V0H2160C1442.5 52 720 0 720 0H0V48Z" fill="currentColor"></path>
        </svg>
    </div>
</div>
<!-- End Hero -->

@if(Auth::user())
    @if (Auth::user()->role == 1)
        <!-- Start Section-->
        <section class="relative md:py-24 py-16">
            <div class="container">
                <div class="grid md:grid-cols-12 grid-cols-1 pb-8 items-end">
                    <div class="lg:col-span-8 md:col-span-6 text-left">
                        <h3 class="mb-4 md:text-3xl md:leading-normal text-2xl leading-normal font-semibold">Busca por categorias</h3>
                        <p class="text-slate-400 max-w-xl">Busca tu mejor servicio con nuestras categorías</p>
                    </div>
                </div><!--end grid-->
            </div><!--end container-->

            <div class="container">
                <div class="grid grid-cols-1 relative">
                    <div class="tiny-five-item">
                        <div class="tiny-slide">
                            <div class="px-3 py-10 rounded-md shadow dark:shadow-gray-800 group text-center bg-white dark:bg-slate-900 hover:bg-indigo-600/5 dark:hover:bg-indigo-600/5 transition duration-500 m-2">
                                <div class="w-[84px] h-[84px] bg-indigo-600/5 group-hover:bg-indigo-600 text-indigo-600 group-hover:text-white rounded-full text-3xl flex align-middle justify-center items-center shadow-sm dark:shadow-gray-800 transition duration-500 mx-auto">
                                    <i class="uil uil-gitlab"></i>
                                </div>

                                <div class="content mt-6">
                                    <a href="{{ url('/search/?type=product')}}" class="title h5 text-lg font-medium hover:text-indigo-600">Productos</a>
                                    <p class="text-slate-400 mt-3">{{count($Products)}} Productos</p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="tiny-slide">
                            <div class="px-3 py-10 rounded-md shadow dark:shadow-gray-800 group text-center bg-white dark:bg-slate-900 hover:bg-indigo-600/5 dark:hover:bg-indigo-600/5 transition duration-500 m-2">
                                <div class="w-[84px] h-[84px] bg-indigo-600/5 group-hover:bg-indigo-600 text-indigo-600 group-hover:text-white rounded-full text-3xl flex align-middle justify-center items-center shadow-sm dark:shadow-gray-800 transition duration-500 mx-auto">
                                    <i class="uil uil-book-open"></i>
                                </div>

                                <div class="content mt-6">
                                    <a href="{{ url('/search/?type=service')}}" class="title h5 text-lg font-medium hover:text-indigo-600">Servicios</a>
                                    <p class="text-slate-400 mt-3">{{count($Services)}} Servicios</p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="tiny-slide">
                            <div class="px-3 py-10 rounded-md shadow dark:shadow-gray-800 group text-center bg-white dark:bg-slate-900 hover:bg-indigo-600/5 dark:hover:bg-indigo-600/5 transition duration-500 m-2">
                                <div class="w-[84px] h-[84px] bg-indigo-600/5 group-hover:bg-indigo-600 text-indigo-600 group-hover:text-white rounded-full text-3xl flex align-middle justify-center items-center shadow-sm dark:shadow-gray-800 transition duration-500 mx-auto">
                                    <i class="uil uil-chart-pie-alt"></i>
                                </div>

                                <div class="content mt-6">
                                    <a href="{{ url('/search/?type=employe')}}" class="title h5 text-lg font-medium hover:text-indigo-600">Pesonal</a>
                                    <p class="text-slate-400 mt-3">{{count($Employes)}} Personal</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!--grid-->
            </div><!--end container-->
        </section><!--end section-->
        <!-- End Section-->
        
        <!-- Start -->
        <section class="relative">
            <div class="container">
                <div class="grid grid-cols-1 pb-8 text-left">
                    <h3 class="mb-4 md:text-3xl md:leading-normal text-2xl leading-normal font-semibold">Ultimos elementos</h3>

                    <p class="text-slate-400 max-w-xl text-left">Busca todos los servicios que tenemos para ti.</p>
                </div><!--end grid-->

                <div class="grid lg:grid-cols-3 md:grid-cols-2 grid-cols-1 mt-8 gap-[30px]">
                    @if (count($allProducts) > 0)
                        @foreach ($allProducts as $item)
                        <div class="rounded-md shadow dark:shadow-gray-800">
                            <div class="p-6">
                                <a href="{{ asset('viewprod/'.base64_encode(urldecode($item->id)).'/'.$item->title) }}" class="title h5 text-lg font-semibold hover:text-indigo-600">{{$item->title}}</a>
                                <p class="text-slate-400 mt-2"><i class="uil uil-clock text-indigo-600"></i> {{$item->created_at->diffForHumans()}}</p>
    
                                <div class="flex justify-between items-center mt-4">
                                    <span class="bg-indigo-600/5 text-indigo-600 text-xs font-bold px-2.5 py-0.5 rounded h-5">{{ $item->type }}</span>
    
                                    <p class="text-slate-400"><i class="uil uil-usd-circle text-indigo-600"></i> ${{ number_format($item->price,2) }}</p>
                                </div>
                            </div>
    
                            <div class="flex items-center p-6 border-t border-gray-100 dark:border-gray-700">
                                <img src="{{ asset('assets/img/logos/'.$item->provider->logo) }}" class="h-12 w-12 shadow-md dark:shadow-gray-800 rounded-md p-2 bg-white dark:bg-slate-900" alt="">
    
                                <div class="ltr:ml-3 rtl:mr-3">
                                    <h6 class="mb-0 font-semibold text-base">{{ $item->provider->name }}</h6>
                                    <span class="text-slate-400 text-sm">{{ $item->provider->country }}</span>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    @endif
                </div><!--end grid-->
            
            </div><!--end container-->
        </section><!--end section-->
        <!-- End -->
    @endif
@endif
 

<section class="relative">
    <div class="container">
        <div class="grid grid-cols-1 pb-8 text-center">
            <h3 class="mb-4 md:text-3xl md:leading-normal text-2xl leading-normal font-semibold">
               
            </h3> 
        </div><!--end grid-->
    </div>
</section>

@endsection


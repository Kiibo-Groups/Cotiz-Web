@extends('layouts.app_website')

@section('content')

<!-- Start Hero -->
 <section class="relative table w-full py-36 lg:py-44 bg-no-repeat bg-center" style="background-image: url('{{ asset('assets2/images/bg-login.jpg') }}');background-size:cover;">
    <div class="absolute inset-0 bg-black opacity-80"></div>
    <div class="container">
        <div class="grid grid-cols-1 pb-8 text-center mt-10">
            <h3 class="mb-4 md:text-4xl text-3xl md:leading-normal leading-normal font-medium text-white">Buscando por: <i>{{ $type }}</i> </h3>

            <ul class="breadcrumb tracking-[0.5px] breadcrumb-light mb-0 inline-block">
               <li class="inline breadcrumb-item uppercase text-[13px] font-bold duration-500 ease-in-out text-white/50 hover:text-white"><a href="{{ url('./') }}">Inicio</a></li>
               <li class="inline breadcrumb-item uppercase text-[13px] font-bold duration-500 ease-in-out text-white/50 hover:text-white"><a href="./">Busqueda</a></li>
                <li class="inline breadcrumb-item uppercase text-[13px] font-bold duration-500 ease-in-out text-white" aria-current="page">{{ $search }}</li>
            </ul>
        </div><!--end grid-->
    </div><!--end container-->
</section><!--end section-->
<div class="relative">
    <div class="shape absolute right-0 sm:-bottom-px -bottom-[2px] left-0 overflow-hidden text-white dark:text-slate-900">
        <svg class="w-full h-auto" viewBox="0 0 2880 48" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M0 48H1437.5H2880V0H2160C1442.5 52 720 0 720 0H0V48Z" fill="currentColor"></path>
        </svg>
    </div>
</div>
<!-- End Hero -->

<!-- Start Section-->
<section class="relative md:py-24 py-16">
    <div class="container">
        <div class="grid lg:grid-cols-12 grid-cols-1" id="reserve-form">
            <div class="lg:col-start-2 lg:col-span-10">
                <div class="bg-white dark:bg-slate-900 border-0 shadow dark:shadow-gray-800 rounded p-3 -mt-[150px]">
                    <form action="{{ url('/search')}}" method="GET">
                        <div class="registration-form text-dark text-start">
                            <div class="grid lg:grid-cols-3 md:grid-cols-2 grid-cols-1 lg:gap-0 gap-6">
                                <div class="filter-search-form relative filter-border">
                                    <input name="q" type="text" id="job-keyword" value="{{ $search }}" class="form-input filter-input-box bg-gray-50 dark:bg-slate-800 border-0" placeholder="Busca tus productos y/o servicios" style="padding-left: 25px;">
                                </div>

                                <div class="filter-search-form relative filter-border">
                                    <select class="form-select" name="type" data-trigger id="choices-location" aria-label="Tipo de servicios" style="padding-left: 25px;">
                                        <option value="product" @if($type === 'product') selected @endif>Productos</option>
                                        <option value="service" @if($type === 'service') selected @endif>Servicios</option>
                                        <option value="employe" @if($type === 'employe') selected @endif>Personal</option>
                                    </select>
                                </div>
                             
                                <input type="submit" id="search" name="search" style="height: 60px;" class="btn bg-indigo-600 hover:bg-indigo-700 border-indigo-600 hover:border-indigo-700 text-white searchbtn submit-btn w-100" value="Buscar">
                            </div><!--end grid-->
                        </div><!--end container-->
                    </form>
                </div>
            </div><!--ed col-->
        </div><!--grid-->
    </div><!--end container-->

    <div class="container">
        <div class="grid lg:grid-cols-3 md:grid-cols-2 grid-cols-1 mt-8 gap-[30px]">
            @if (count($requests) > 0)
                @foreach ($requests as $item)
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

        <div class="grid md:grid-cols-12 grid-cols-1 mt-8">
            <div class="md:col-span-12 text-center">
                <nav aria-label="Page navigation example">
                    <ul class="inline-flex items-center -space-x-px">
                        {{ $requests->links() }}
                    </ul>
                </nav>
            </div>
        </div>
    </div><!--end container-->
 
</section><!--end section-->
<!-- End Section-->
@endsection
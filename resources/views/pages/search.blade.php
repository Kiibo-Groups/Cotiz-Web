@extends('layouts.app_website')

@section('content')
    <!-- Start Hero -->
    <section class="relative table w-full py-36 lg:py-44 bg-no-repeat bg-center"
        style="background-image: url('{{ asset('assets2/images/bg-login.jpg') }}');background-size:cover;">
        <div class="absolute inset-0 bg-black opacity-80"></div>
        <div class="container">
            <div class="grid grid-cols-1 pb-8 text-center mt-10">
                <h3 class="mb-4 md:text-4xl text-3xl md:leading-normal leading-normal font-medium text-white">Buscando por:
                    <i>{{ $type }}</i> </h3>

                <ul class="breadcrumb tracking-[0.5px] breadcrumb-light mb-0 inline-block">
                    <li
                        class="inline breadcrumb-item uppercase text-[13px] font-bold duration-500 ease-in-out text-white/50 hover:text-white">
                        <a href="{{ url('./') }}">Inicio</a></li>
                    <li
                        class="inline breadcrumb-item uppercase text-[13px] font-bold duration-500 ease-in-out text-white/50 hover:text-white">
                        <a href="./">Busqueda</a></li>
                    <li class="inline breadcrumb-item uppercase text-[13px] font-bold duration-500 ease-in-out text-white"
                        aria-current="page">{{ $search }}</li>
                </ul>
            </div>
            <!--end grid-->
        </div>
        <!--end container-->
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

    <!-- Start Section-->
    <section class="relative md:py-2 py-1">
        <div class="container">






            <div class="p-6 rounded-md shadow dark:shadow-gray-800 mt-8">
                <h4 class="text-lg font-semibold">Solicitar Servicio:</h4>

                <form class="mt-8" action="{{ url(env('user') . '/request/create') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="solicitud" value="{{ Auth::user()->role }}">
                    <input type="hidden" name="tipo" value="{{ $type }}">
                    @if (Auth::user()->role == 2)
                        <input type="hidden" name="proveedor" value="{{ Auth::user()->id }}">
                    @else
                        <input type="hidden" name="proveedor" value="{{ Auth::user()->idempresa }}">
                    @endif

                    <input type="hidden" name="user_id" value="1">
                    <input type="hidden" name="services_id" value="0">
                    <input type="hidden" name="status" value="0">



                    {{-- <div class="grid lg:grid-cols-12 lg:gap-6">
                    <div class="lg:col-span-6 mb-5">
                        <div class="ltr:text-left rtl:text-right">
                            <label for="name" class="font-semibold">Nombre:</label>
                            <div class="form-icon relative mt-2">
                                <i data-feather="user" class="w-4 h-4 absolute top-3 ltr:left-4 rtl:right-4"></i>
                                <input name="name" id="name" type="text" class="form-input ltr:pl-11 rtl:pr-11" readonly placeholder="Name :" value="{{ Auth::user()->name }}">
                            </div>
                        </div>
                    </div>

                    <div class="lg:col-span-6 mb-5">
                        <div class="ltr:text-left rtl:text-right">
                            <label for="email" class="font-semibold">Email:</label>
                            <div class="form-icon relative mt-2">
                                <i data-feather="mail" class="w-4 h-4 absolute top-3 ltr:left-4 rtl:right-4"></i>
                                <input name="email" id="email" type="email" class="form-input ltr:pl-11 rtl:pr-11" readonly placeholder="Email :" value="{{ Auth::user()->email }}">
                            </div>
                        </div>
                    </div>
                </div> --}}

                    <div class="grid grid-cols-1">
                        <div class="mb-5">
                            <div class="ltr:text-left rtl:text-right">
                                <label for="description" class="font-semibold">Descripción de la solicitud:</label>
                                <div class="form-icon relative mt-2">
                                    <i data-feather="message-circle"
                                        class="w-4 h-4 absolute top-3 ltr:left-4 rtl:right-4"></i>
                                    <textarea name="description" id="description" required class="form-input ltr:pl-11 rtl:pr-11 h-28"
                                        placeholder="En este campos podrás añadir detalles importantes a tu solicitud para que sea procesada con mayor efectividad."
                                        required>{{ $search }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="grid grid-cols-1">
                        <div class="mb-5">
                            <div class="ltr:text-left rtl:text-right">
                                <label for="document" class="font-semibold">Adjunta información importante:</label>
                                <div class="form-icon relative mt-2">
                                    <input type='file' id="document" name="document" class="ec-image-upload mt-3"
                                        accept=".png, .jpg, .jpeg, .pdf, .docx, .txt" required />
                                </div>
                            </div>
                        </div>
                    </div>



                    <button type="submit" id="submit"
                        class="btn bg-indigo-600 hover:bg-indigo-700 border-indigo-600 hover:border-indigo-700 text-white rounded-md w-full">Solicitar
                        servicio</button>
                </form>
            </div>


        </div>
        <!--end container-->

    </section>
    <!--end section-->
    <!-- End Section-->
@endsection

@extends('layouts.app_profile')
@section('title') Panel de administración @endsection
@section('page_active') Dashboard @endsection


@section('content')

    @if ($status  == 0 )

        <section class="wrapper bg-soft-primary">
            <div class="container pt-16 pb-16 pt-md-14 pb-md-15 text-center">
            <div class="row">
                <div class=" mx-auto">
                <h4 class=" mb-3" style="font-size: 56px">Activar Cuenta,  Ponte en contacto con el administrador</h4>
                <nav class="d-inline-block" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('./') }}">Inicio</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Activar Cuenta</li>
                    </ol>
                </nav>
                <!-- /nav -->
                </div>
                <!-- /column -->
            </div>
            <!-- /.row -->
            </div>
            <!-- /.container -->
        </section>
        <!-- /section -->

    @else

        <section class="section dashboard">
            <div class="row">
                <!-- Left side columns -->
                <div class="col-lg-12">
                    <div class="row">

                        <!-- Sales Card -->
                        <div class="col-xxl-3 col-md-6">
                            <div class="card info-card sales-card">
                                <div class="card-body">
                                    <h5 class="card-title">Solicitudes <span></span></h5>

                                    <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-cart"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>{{$requests}}</h6>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- End Sales Card -->

                        <!-- Revenue Card -->
                        <div class="col-xxl-3 col-md-6">
                            <div class="card info-card revenue-card">
                                <div class="card-body">
                                    <h5 class="card-title">Catálogos <span></span></h5>

                                    <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-people"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>{{$services}}</h6>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- End Revenue Card -->

                        <!-- Customers Card -->
                        <div class="col-xxl-3 col-xl-12">

                            <div class="card info-card customers-card">
                                <div class="card-body">
                                    <h5 class="card-title">Empresas <span></span></h5>

                                    <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-calendar-check-fill"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>{{$users}}</h6>
                                    </div>
                                    </div>

                                </div>
                            </div>

                        </div><!-- End Customers Card -->

                        <div class="col-xxl-3 col-xl-12">

                            <div class="card info-card customers-card">
                                <div class="card-body">
                                    <h5 class="card-title">Provedores <span></span></h5>

                                    <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-people"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>{{$providers}}</h6>
                                    </div>
                                    </div>

                                </div>
                            </div>

                        </div><!-- End Customers Card -->

                        <!-- Reports -->
                        <div class="col-12">
                            <div class="card">


                            <div class="card-body">
                                <h5 class="card-title">Reportes</h5>

                                <!-- Line Chart -->
                                <div id="reportsChart"></div>

                                <script>

                                document.addEventListener("DOMContentLoaded", () => {
                                    const months = JSON.parse(@json($months));
                                    var categories = [];
                                    months.providers.forEach(month=> {
                                        categories.push(month.start);
                                    })


                                    new ApexCharts(document.querySelector("#reportsChart"), {
                                        series: [{
                                            name: 'Solicitudes',
                                            data: months.request.map(item=>item.value),
                                        }, {
                                            name: 'Catálogos',
                                            data: months.services.map(item=>item.value)
                                        }, {
                                            name: 'Empresas',
                                            data: months.users.map(item=>item.value)
                                        }, {
                                            name: 'Provedores',
                                            data: months.providers.map(item=>item.value)
                                        }],
                                        chart: {
                                            locales: [{
                                                "name": "en",
                                                "options": {
                                                    "months": ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"],
                                                }
                                            }],
                                            defaultLocale: "en",
                                            height: 350,
                                            type: 'area',
                                            toolbar: {
                                                show: false
                                            },
                                        },
                                        markers: {
                                            size: 4
                                        },
                                        colors: ['#4154f1', '#2eca6a', '#ff771d'],
                                        fill: {
                                            type: "gradient",
                                            gradient: {
                                                shadeIntensity: 1,
                                                opacityFrom: 0.3,
                                                opacityTo: 0.4,
                                                stops: [0, 90, 100]
                                            }
                                        },
                                        dataLabels: {
                                            enabled: false
                                        },
                                        stroke: {
                                            curve: 'smooth',
                                            width: 2
                                        },
                                        xaxis: {
                                            type: 'category',
                                            categories: ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"],
                                        }
                                    }).render();
                                });
                                </script>
                                <!-- End Line Chart -->

                            </div>

                            </div>
                        </div><!-- End Reports -->

                    </div>
                </div>
            </div>
        </section>

    @endif


@endsection

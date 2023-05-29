@extends('layouts.app_profile')
@section('title') Panel de administración @endsection
@section('page_active') Dashboard @endsection


@section('content')
    <section class="section dashboard">
        <div class="row">
            <!-- Left side columns -->
            <div class="col-lg-12">
                <div class="row">

                    <!-- Sales Card -->
                    <div class="col-xxl-3 col-md-6">
                        <div class="card info-card sales-card">
                            <div class="card-body">
                                <h5 class="card-title">Solicitudes <span>| hoy</span></h5>

                                <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-cart"></i>
                                </div>
                                <div class="ps-3">
                                    <h6>{{$views}}</h6>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- End Sales Card -->

                    <!-- Revenue Card -->
                    <div class="col-xxl-3 col-md-6">
                        <div class="card info-card revenue-card">
                            <div class="card-body">
                                <h5 class="card-title">Servicios <span>| Nuevos</span></h5>

                                <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-people"></i>
                                </div>
                                <div class="ps-3">
                                    <h6>{{$users}}</h6>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- End Revenue Card -->

                    <!-- Customers Card -->
                    <div class="col-xxl-3 col-xl-12">

                        <div class="card info-card customers-card">
                            <div class="card-body">
                                <h5 class="card-title">Clientes <span>| Registrados</span></h5>

                                <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-calendar-check-fill"></i>
                                </div>
                                <div class="ps-3">
                                    <h6>{{$events}}</h6>
                                </div>
                                </div>

                            </div>
                        </div>

                    </div><!-- End Customers Card -->

                    <div class="col-xxl-3 col-xl-12">

                        <div class="card info-card customers-card">
                            <div class="card-body">
                                <h5 class="card-title">Provedores <span>| Registrados</span></h5>

                                <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-people"></i>
                                </div>
                                <div class="ps-3">
                                    <h6>{{$events}}</h6>
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
                                new ApexCharts(document.querySelector("#reportsChart"), {
                                series: [{
                                    name: 'Solicitudes',
                                    data: [31, 40, 28, 51, 42, 82, 56],
                                }, {
                                    name: 'Servicios',
                                    data: [11, 32, 45, 32, 34, 52, 41]
                                }, {
                                    name: 'Clientes',
                                    data: [15, 11, 32, 18, 9, 24, 11]
                                },
                                {
                                    name: 'Provedores',
                                    data: [14, 35, 46, 37, 31, 53, 47]
                                },
                                ],
                                chart: {
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
                                    type: 'datetime',
                                    categories: ["2018-09-19T00:00:00.000Z", "2018-09-19T01:30:00.000Z", "2018-09-19T02:30:00.000Z", "2018-09-19T03:30:00.000Z", "2018-09-19T04:30:00.000Z", "2018-09-19T05:30:00.000Z", "2018-09-19T06:30:00.000Z"]
                                },
                                tooltip: {
                                    x: {
                                    format: 'dd/MM/yy HH:mm'
                                    },
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
@endsection

@extends('layouts.app')

@section('content')

<section class="wrapper bg-soft-primary">
    <div class="container pt-20 pb-19 pt-md-14 pb-md-20 text-center">
      <div class="row">
        <div class="col-sm-10 col-md-8 col-lg-6 col-xl-6 col-xxl-5 mx-auto">
          <h1 class="display-1 mb-3">Activar Cuenta,  Ponte en contacto</h1>
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

<section class="wrapper bg-light angled upper-end">
<div class="container py-14 py-md-16">
    <div class="row gy-10 gx-lg-8 gx-xl-12 mb-16 align-items-center">
    <div class="col-lg-7 position-relative">
        <div class="shape bg-dot primary rellax w-18 h-18" data-rellax-speed="1" style="top: 0; left: -1.4rem; z-index: 0;"></div>
        <div class="row gx-md-5 gy-5">
            <div class="col-md-6">
                <figure class="rounded mt-md-10 position-relative"><img src="{{ asset('assets/img/photos/g5.jpg') }}" srcset="{{ asset('assets/img/photos/g5@2x.jpg 2x') }}" alt=""></figure>
            </div>
            <!--/column -->
            <div class="col-md-6">
                <div class="row gx-md-5 gy-5">
                <div class="col-md-12 order-md-2">
                    <figure class="rounded"><img src="{{ asset('assets/img/photos/g6.jpg') }}" srcset="{{ asset('assets/img/photos/g6@2x.jpg 2x') }}" alt=""></figure>
                </div>
                <!--/column -->
                <div class="col-md-10">
                    <div class="card bg-pale-primary text-center counter-wrapper">
                    <div class="card-body py-11">
                        <h3 class="counter text-nowrap">5000+</h3>
                        <p class="mb-0">Satisfied Customers</p>
                    </div>
                    <!--/.card-body -->
                    </div>
                    <!--/.card -->
                </div>
                <!--/column -->
                </div>
                <!--/.row -->
            </div>
            <!--/column -->
        </div>
        <!--/.row -->
    </div>
    <!--/column -->
    <div class="col-lg-5">
        <h2 class="display-4 mb-8">¿Convencido todavía? Hagamos algo grande juntos.</h2>
        <div class="d-flex flex-row">
        <div>
            <div class="icon text-primary fs-28 me-6 mt-n1"> <i class="uil uil-location-pin-alt"></i> </div>
        </div>
        <div>
            <h5 class="mb-1">Address</h5>
            <address>{{$admin->address}}</address>
        </div>
        </div>
        <div class="d-flex flex-row">
        <div>
            <div class="icon text-primary fs-28 me-6 mt-n1"> <i class="uil uil-phone-volume"></i> </div>
        </div>
        <div>
            <h5 class="mb-1">Phone</h5>
            <p>{{$admin->phone_contact}}</p>
        </div>
        </div>
        <div class="d-flex flex-row">
        <div>
            <div class="icon text-primary fs-28 me-6 mt-n1"> <i class="uil uil-envelope"></i> </div>
        </div>
        <div>
            <h5 class="mb-1">E-mail</h5>
            <p class="mb-0"><a href="mailto:{{$admin->shw_email}}" class="link-body">{{$admin->shw_email}}</a></p>
        </div>
        </div>
    </div>
    <!--/column -->
    </div>
    <!--/.row -->
    <div class="row" id="contact">
        <div class="col-lg-10 offset-lg-1 col-xl-8 offset-xl-2">
            <h2 class="display-4 mb-3 text-center">Escríbanos</h2>
            <p class="lead text-center mb-10">Comuníquese con nosotros desde nuestro formulario de contacto y nos pondremos en contacto con usted a la brevedad.</p>
            @if(Session::has('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ Session::get('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif

            @if(Session::has('message'))

            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ Session::get('message') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif


            {!! Form::model(['url' => ['/contact'],'method' => 'POST', 'class' => 'contact-form needs-validation','novalidate']) !!}
            <div class="messages"></div>
            <div class="row gx-4">
                <div class="col-md-6">
                <div class="form-floating mb-4">
                    <input id="form_name" type="text" name="name" class="form-control" placeholder="Jane" required>
                    <label for="form_name">First Name *</label>
                    <div class="valid-feedback"> Looks good! </div>
                    <div class="invalid-feedback"> Please enter your first name. </div>
                </div>
                </div>
                <!-- /column -->
                <div class="col-md-6">
                <div class="form-floating mb-4">
                    <input id="form_lastname" type="text" name="surname" class="form-control" placeholder="Doe" required>
                    <label for="form_lastname">Last Name *</label>
                    <div class="valid-feedback"> Looks good! </div>
                    <div class="invalid-feedback"> Please enter your last name. </div>
                </div>
                </div>
                <!-- /column -->
                <div class="col-md-6">
                <div class="form-floating mb-4">
                    <input id="form_email" type="email" name="email" class="form-control" placeholder="jane.doe@example.com" required>
                    <label for="form_email">Email *</label>
                    <div class="valid-feedback"> Looks good! </div>
                    <div class="invalid-feedback"> Please provide a valid email address. </div>
                </div>
                </div>
                <!-- /column -->
                <div class="col-md-6">
                <div class="form-select-wrapper mb-4">
                    <select class="form-select" id="form-select" name="department" required>
                    <option selected disabled value="">Select a department</option>
                    <option value="Consultoria">Consultoria</option>
                    <option value="Agendar llamada">Agendar llamada</option>
                    <option value="Soporte">Soporte</option>
                    </select>
                    <div class="valid-feedback"> Looks good! </div>
                    <div class="invalid-feedback"> Please select a department. </div>
                </div>
                </div>
                <!-- /column -->
                <div class="col-12">
                <div class="form-floating mb-4">
                    <textarea id="form_message" name="message" class="form-control" placeholder="Your message" style="height: 150px" required></textarea>
                    <label for="form_message">Message *</label>
                    <div class="valid-feedback"> Looks good! </div>
                    <div class="invalid-feedback"> Please enter your messsage. </div>
                </div>
                </div>
                <!-- /column -->
                <div class="col-12 text-center">
                <input type="submit" class="btn btn-primary rounded-pill btn-send mb-3" value="Enviar mensaje">
                <p class="text-muted"><strong>*</strong> Estos campos son obligatorios.</p>
                </div>
                <!-- /column -->
            </div>
            <!-- /.row -->
            </form>
            <!-- /form -->
        </div>
        <!-- /column -->
    </div>
    <!-- /.row -->
</div>
<!-- /.container -->
</section>
<!-- /section -->

@endsection

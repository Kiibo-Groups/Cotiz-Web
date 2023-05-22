<!DOCTYPE html>
<html lang="en" class="light scroll-smooth" dir="ltr">
    <head>
        <meta charset="UTF-8" />
        <title>@yield('title')</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="Tailwind CSS Saas & Software Landing Page Template" />
        <meta name="keywords" content="agency, application, business, clean, creative, cryptocurrency, it solutions, modern, multipurpose, nft marketplace, portfolio, saas, software, tailwind css" />
        <meta name="author" content="Shreethemes" />
        <meta name="website" content="https://shreethemes.in" />
        <meta name="email" content="support@shreethemes.in" />
        <meta name="version" content="1.6.0" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        
        <link href="{{ asset('assets2/libs/choices.js/public/assets/styles/choices.min.css') }}" rel="stylesheet">
        <link href="{{ asset('assets2/libs/@iconscout/unicons/css/line.css') }}" type="text/css" rel="stylesheet" />
        <link rel="stylesheet" href="{{ asset('assets2/css/icons.css') }}" />
        <link rel="stylesheet" href="{{ asset('assets2/css/tailwind.css') }}" />

    </head>
    <style type="text/css">
        .my-active span{
            background-color: #5cb85c !important;
            color: white !important;
            border-color: #5cb85c !important;
        }
    </style>
    <style>
        .ec-vendor-uploads .ec-vendor-img-upload {
        margin-bottom: -10px;
        position: sticky;
        top: 30px;
        }
        .ec-vendor-uploads .ec-vendor-img-upload .ec-vendor-main-img .avatar-upload {
        margin-bottom: 10px;
        position: relative;
        }
        @media (max-width: 991.98px) {
        .ec-vendor-uploads .ec-vendor-img-upload .ec-vendor-main-img .avatar-upload {
            max-width: 400px;
            margin: 0 auto 15px auto;
        }
        }
        .ec-vendor-uploads .ec-vendor-img-upload .ec-vendor-main-img .avatar-upload .avatar-edit {
        position: absolute;
        right: 25px;
        z-index: 1;
        top: 25px;
        }
        .ec-vendor-uploads .ec-vendor-img-upload .ec-vendor-main-img .avatar-upload .avatar-edit input {
        opacity: 0;
        width: 40px;
        height: 40px;
        padding: 0;
        border-radius: 50%;
        position: absolute;
        z-index: 1;
        }
        .ec-vendor-uploads .ec-vendor-img-upload .ec-vendor-main-img .avatar-upload .avatar-edit input + label {
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-align: center;
        -ms-flex-align: center;
        align-items: center;
        -webkit-box-pack: center;
        -ms-flex-pack: center;
        justify-content: center;
        width: 40px;
        height: 40px;
        padding: 10px;
        margin-bottom: 0;
        border-radius: 10px;
        background: #ffffff;
        border: 1px solid transparent;
        -webkit-box-shadow: 0px 0px 8px 0px rgba(0, 0, 0, 0.15);
        box-shadow: 0px 0px 8px 0px rgba(0, 0, 0, 0.15);
        border: 1px solid #eeeeee;
        cursor: pointer;
        font-weight: normal;
        -webkit-transition: all 0.2s ease-in-out;
        transition: all 0.2s ease-in-out;
        }
        .ec-vendor-uploads .ec-vendor-img-upload .ec-vendor-main-img .avatar-upload .avatar-edit input + label .svg_img {
        width: 25px;
        opacity: 0.6;
        }
        .ec-vendor-uploads .ec-vendor-img-upload .ec-vendor-main-img .avatar-upload .avatar-edit input + label:hover {
        -webkit-box-shadow: none;
        box-shadow: none;
        }
        .ec-vendor-uploads .ec-vendor-img-upload .ec-vendor-main-img .avatar-upload .avatar-preview {
        width: 100%;
        height: 100%;
        padding: 15px;
        position: relative;
        border: 1px solid #eeeeee;
        border-radius: 15px;
        }
        .ec-vendor-uploads .ec-vendor-img-upload .ec-vendor-main-img .avatar-upload .avatar-preview > div {
        width: 100%;
        height: 100%;
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center;
        }
        .ec-vendor-uploads .ec-vendor-img-upload .ec-vendor-main-img .avatar-upload .avatar-preview .imagePreview img {
        margin: auto;
        vertical-align: middle;
        max-width: 100%;
        border-radius: 10px;
        }
        .ec-vendor-uploads .ec-vendor-img-upload .ec-vendor-main-img .thumb-upload-set {
        display: -webkit-inline-box;
        display: -ms-inline-flexbox;
        display: inline-flex;
        width: 100%;
        -ms-flex-wrap: wrap;
        flex-wrap: wrap;
        -webkit-box-pack: center;
        -ms-flex-pack: center;
        justify-content: center;
        }
        @media (max-width: 991.98px) {
        .ec-vendor-uploads .ec-vendor-img-upload .ec-vendor-main-img .thumb-upload-set {
            padding-bottom: 24px;
        }
        }
        .ec-vendor-uploads .ec-vendor-img-upload .ec-vendor-main-img .thumb-upload-set .thumb-upload {
        margin: 2px 7px 10px 7px;
        position: relative;
        z-index: 1;
        overflow: hidden;
        display: inline-block;
        }
        .ec-vendor-uploads .ec-vendor-img-upload .ec-vendor-main-img .thumb-upload-set .thumb-upload .thumb-edit {
        position: absolute;
        top: 5px;
        right: 5px;
        z-index: 1;
        cursor: pointer;
        }
        .ec-vendor-uploads .ec-vendor-img-upload .ec-vendor-main-img .thumb-upload-set .thumb-upload input {
        opacity: 0;
        width: 30px;
        height: 30px;
        padding: 0;
        border-radius: 50%;
        position: absolute;
        z-index: 1;
        cursor: pointer;
        }
        .ec-vendor-uploads .ec-vendor-img-upload .ec-vendor-main-img .thumb-upload-set .thumb-upload input + label {
        width: 30px;
        height: 30px;
        padding: 4px;
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-align: center;
        -ms-flex-align: center;
        align-items: center;
        -webkit-box-pack: center;
        -ms-flex-pack: center;
        justify-content: center;
        margin-bottom: 0;
        border-radius: 10px;
        background: #ffffff;
        border: 1px solid transparent;
        -webkit-box-shadow: 0px 0px 8px 0px rgba(0, 0, 0, 0.15);
        box-shadow: 0px 0px 8px 0px rgba(0, 0, 0, 0.15);
        border: 1px solid #eeeeee;
        cursor: pointer;
        font-weight: normal;
        -webkit-transition: all 0.2s ease-in-out;
        transition: all 0.2s ease-in-out;
        cursor: pointer;
        }
        .ec-vendor-uploads .ec-vendor-img-upload .ec-vendor-main-img .thumb-upload-set .thumb-upload input + label .svg_img {
        width: 18px;
        opacity: 0.6;
        cursor: pointer;
        }
        .ec-vendor-uploads .ec-vendor-img-upload .ec-vendor-main-img .thumb-upload-set .thumb-upload input + label:hover {
        -webkit-box-shadow: none;
        box-shadow: none;
        }
        .ec-vendor-uploads .ec-vendor-img-upload .ec-vendor-main-img .thumb-upload-set .thumb-upload .thumb-preview {
        padding: 2px;
        position: relative;
        border: 1px solid #eeeeee;
        border-radius: 10px;
        }
        .ec-vendor-uploads .ec-vendor-img-upload .ec-vendor-main-img .thumb-upload-set .thumb-upload .thumb-preview > div {
        width: 80px;
        height: 80px;
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center;
        }
        @media (max-width: 1199.98px) {
        .ec-vendor-uploads .ec-vendor-img-upload .ec-vendor-main-img .thumb-upload-set .thumb-upload .thumb-preview > div {
            width: 70px;
            height: 70px;
        }
        }
        .ec-vendor-uploads .ec-vendor-img-upload .ec-vendor-main-img .thumb-upload-set .thumb-upload .thumb-preview img {
        width: 100%;
        height: 100%;
        vertical-align: middle;
        max-width: 100%;
        border-radius: 7px;
        }
        .ec-vendor-uploads .ec-vendor-upload-detail .mb-25 {
        margin-bottom: 25px;
        }
        .ec-vendor-uploads .ec-vendor-upload-detail form label {
        width: 100%;
        text-transform: uppercase;
        font-weight: 500;
        }
        .ec-vendor-uploads .ec-vendor-upload-detail form label span {
        font-size: 13px;
        color: #999;
        font-weight: 300;
        text-transform: none;
        }
        .ec-vendor-uploads .ec-vendor-upload-detail form input {
        width: 100%;
        margin-bottom: 30px;
        padding: 0 15px;
        border-radius: 0;
        border: 1px solid #eeeeee !important;
        background-color: transparent;
        color: #777;
        line-height: 3;
        border-radius: 15px;
        }
        .ec-vendor-uploads .ec-vendor-upload-detail form textarea {
        width: 100%;
        margin-bottom: 30px;
        padding: 0 15px;
        border-radius: 0;
        border: 1px solid #eeeeee !important;
        background-color: transparent;
        color: #777;
        padding: 15px;
        border-radius: 15px;
        }
        .ec-vendor-uploads .ec-vendor-upload-detail form select {
        width: 100%;
        height: 45px;
        margin-bottom: 30px;
        padding: 0 15px;
        border-radius: 0;
        border: 1px solid #eeeeee !important;
        background-color: transparent;
        color: #777;
        -webkit-box-shadow: none;
        box-shadow: none;
        outline: none;
        border-radius: 15px;
        }
        .ec-vendor-uploads .ec-vendor-upload-detail form input[type=text] {
        height: 45px;
        -webkit-box-shadow: none;
        box-shadow: none;
        outline: none;
        border-radius: 15px;
        }
        .ec-vendor-uploads .ec-vendor-upload-detail form input[type=color] {
        width: 25px !important;
        height: 25px !important;
        padding: 0;
        border-radius: 15px;
        border-radius: 0 !important;
        display: -webkit-inline-box;
        display: -ms-inline-flexbox;
        display: inline-flex;
        margin: 4px;
        min-height: 25px;
        }
        .ec-vendor-uploads .ec-vendor-upload-detail form input[type=color] i {
        border-radius: 0;
        }
        .ec-vendor-uploads .ec-vendor-upload-detail form .form-checkbox-box {
        height: 30px;
        margin-top: 5px;
        display: inline-block;
        }
        .ec-vendor-uploads .ec-vendor-upload-detail form .form-check {
        height: 20px;
        margin: 0 5px 0 0;
        padding: 0;
        display: -webkit-inline-box;
        display: -ms-inline-flexbox;
        display: inline-flex;
        -webkit-box-align: center;
        -ms-flex-align: center;
        align-items: center;
        }
        .ec-vendor-uploads .ec-vendor-upload-detail form .form-check input {
        width: 35px !important;
        height: 100% !important;
        margin: 0;
        }
        .ec-vendor-uploads .ec-vendor-upload-detail form .form-check label {
        margin: 5px 5px 2px 7px;
        line-height: 11px;
        color: #999;
        }
        .ec-vendor-uploads .ec-vendor-upload-detail .bootstrap-tagsinput {
        width: 100%;
        margin-bottom: 30px;
        background-color: transparent;
        border: 1px solid #eeeeee;
        display: inline-block;
        padding: 5px 10px;
        color: #555;
        vertical-align: middle;
        border-radius: 15px;
        line-height: 22px;
        cursor: text;
        }
        .ec-vendor-uploads .ec-vendor-upload-detail .bootstrap-tagsinput input {
        height: 40px;
        border: none !important;
        -webkit-box-shadow: none;
        box-shadow: none;
        outline: none;
        background-color: transparent;
        padding: 0 5px;
        margin: 0;
        width: auto;
        max-width: inherit;
        }
        .ec-vendor-uploads .ec-vendor-upload-detail .bootstrap-tagsinput input:focus {
        border: none;
        -webkit-box-shadow: none;
        box-shadow: none;
        }
        .ec-vendor-uploads .ec-vendor-upload-detail .bootstrap-tagsinput input::-webkit-input-placeholder {
        color: #999;
        opacity: 1;
        }
        .ec-vendor-uploads .ec-vendor-upload-detail .bootstrap-tagsinput input::-moz-placeholder {
        color: #999;
        opacity: 1;
        }
        .ec-vendor-uploads .ec-vendor-upload-detail .bootstrap-tagsinput input:-ms-input-placeholder {
        color: #999;
        opacity: 1;
        color: #999;
        }
        .ec-vendor-uploads .ec-vendor-upload-detail .bootstrap-tagsinput input::-ms-input-placeholder {
        color: #999;
        opacity: 1;
        color: #999;
        }
        .ec-vendor-uploads .ec-vendor-upload-detail .bootstrap-tagsinput input::placeholder {
        color: #999;
        opacity: 1;
        }
        .ec-vendor-uploads .ec-vendor-upload-detail .bootstrap-tagsinput .tag {
        margin-right: 2px;
        color: #777;
        }
        .ec-vendor-uploads .ec-vendor-upload-detail .bootstrap-tagsinput .tag [data-role=remove] {
        margin-left: 8px;
        cursor: pointer;
        color: #f96e6e;
        }
        .ec-vendor-uploads .ec-vendor-upload-detail .bootstrap-tagsinput .tag [data-role=remove]:after {
        content: "×";
        padding: 0px 2px;
        }
        .ec-vendor-uploads .ec-vendor-upload-detail .bootstrap-tagsinput .tag [data-role=remove]:hover {
        -webkit-box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.2), 0 1px 2px rgba(0, 0, 0, 0.05);
        box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.2), 0 1px 2px rgba(0, 0, 0, 0.05);
        }
        .ec-vendor-uploads .ec-vendor-upload-detail .bootstrap-tagsinput .tag [data-role=remove]:hover:active {
        -webkit-box-shadow: inset 0 3px 5px rgba(0, 0, 0, 0.125);
        box-shadow: inset 0 3px 5px rgba(0, 0, 0, 0.125);
        }
        .ec-vendor-uploads .ec-vendor-upload-detail .bootstrap-tagsinput.form-control input::-moz-placeholder {
        color: #777;
        opacity: 1;
        }
        .ec-vendor-uploads .ec-vendor-upload-detail .bootstrap-tagsinput.form-control input:-ms-input-placeholder {
        color: #777;
        }
        .ec-vendor-uploads .ec-vendor-upload-detail .bootstrap-tagsinput.form-control input::-webkit-input-placeholder {
        color: #777;
        }

    </style>
    <script src="{{ asset('profile/vendor/jquery/jquery-3.5.1.min.js') }}"></script>
    <script>

        $(document).ready(function () {
            "use strict";
            /*======== Image Change on Upload ========*/
            $("body").on("change", ".ec-image-upload", function (e) {

            var lkthislk = $(this);

            if (this.files && this.files[0]) {

                var reader = new FileReader();
                reader.onload = function (e) {

                    var ec_image_preview = lkthislk.parent().parent().children('.ec-preview').find('.ec-image-preview').attr('src', e.target.result);

                    ec_image_preview.hide();
                    ec_image_preview.fadeIn(650);
                }
                reader.readAsDataURL(this.files[0]);
            }
        });
        })
    </script>
    <body class="font-nunito text-base text-black dark:text-white dark:bg-slate-900">
        <!-- Loader Start -->
        <div id="preloader">
            <div id="status">
                <div class="spinner">
                    <div class="double-bounce1"></div>
                    <div class="double-bounce2"></div>
                </div>
            </div>
        </div> 
        <!-- Loader End

        
        <!-- Start Navbar -->
        <nav id="topnav" class="defaultscroll is-sticky">
            <div class="container">
                <div id="navigation">
                    <!-- Navigation Menu-->   
                    <ul class="navigation-menu nav-light">
                        <li><a href="/admin/dash" class="sub-menu-item">Inicio</a></li>

                        <li class="has-submenu parent-menu-item">
                            <a href="javascript:void(0)">Proveedores</a><span class="menu-arrow"></span>
                            <ul class="submenu">
                                <li><a href="/admin/providers/add" class="sub-menu-item">Nuevo Proveedor</a></li>
                                <li><a href="/admin/providers" class="sub-menu-item">Listado</a></li>
                            </ul>
                        </li>
                        <li class="has-submenu parent-menu-item">
                            <a href="javascript:void(0)">Servicios</a><span class="menu-arrow"></span>
                            <ul class="submenu">
                                <li><a href="/admin/services/add" class="sub-menu-item">Nuevo Servicio</a></li>
                                <li><a href="/admin/services" class="sub-menu-item">Listado</a></li>
                            </ul>
                        </li>
                        <li class="has-submenu parent-menu-item">
                            <a href="">

                                <form id="logout-form2" action="{{ route('logout') }}" method="POST" class="d-none">
                                    <button type="submit" class="nav-link collapsed" href="#" onclick="document.getElementById('logout-form2').submit();">
                                        <i class="bi bi-person"></i>
                                        <span>Cerrar sessión</span>
                                            @csrf
                                    </button>
                                </form>
                            </a>
                        </li>
                    </ul><!--end navigation menu-->
                </div><!--end navigation-->
            </div><!--end container-->
        </nav><!--end header-->
        <!-- End Navbar -->

        <!-- Start Hero -->
        <section class="relative table w-full py-32 lg:py-36 bg-no-repeat bg-center" style="background-image: url({{asset('assets2/images/bg-login.jpg')}});background-size:cover;">
            <div class="absolute inset-0 bg-black opacity-80"></div>
            <div class="container">
                <div class="grid grid-cols-1 text-center mt-10">
                    <h3 class="md:text-4xl text-3xl md:leading-normal leading-normal font-medium text-white">
                      @yield('page_active')
                    </h3>
                </div><!--end grid-->
            </div><!--end container-->
        </section><!--end section-->
        <div class="relative">
            <div class="shape absolute right-0 sm:-bottom-px -bottom-[2px] left-0 overflow-hidden z-1 text-white dark:text-slate-900">
                <svg class="w-full h-auto" viewBox="0 0 2880 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M0 48H1437.5H2880V0H2160C1442.5 52 720 0 720 0H0V48Z" fill="currentColor"></path>
                </svg>
            </div>
        </div>
        @yield('content')

        <!-- Footer Start -->
        <footer class="footer bg-dark-footer relative text-gray-200 dark:text-gray-200">    
            <div class="py-[30px] px-0 border-t border-slate-800">
                <div class="container text-center">
                    <div class="grid md:grid-cols-2 items-center">
                        <div class="ltr:md:text-left rtl:md:text-right text-center">
                            <p class="mb-0">© <script>document.write(new Date().getFullYear())</script> Desarrollado por<a href="#" class="text-reset">Kiboo</a>.</p>
                        </div>

                        <ul class="list-none ltr:md:text-right rtl:md:text-left text-center mt-6 md:mt-0">
                            <li class="inline"><a href=""><img src="assets/images/payments/american-ex.png" class="max-h-6 inline" title="American Express" alt=""></a></li>
                            <li class="inline"><a href=""><img src="assets/images/payments/discover.png" class="max-h-6 inline" title="Discover" alt=""></a></li>
                            <li class="inline"><a href=""><img src="assets/images/payments/master-card.png" class="max-h-6 inline" title="Master Card" alt=""></a></li>
                            <li class="inline"><a href=""><img src="assets/images/payments/paypal.png" class="max-h-6 inline" title="Paypal" alt=""></a></li>
                            <li class="inline"><a href=""><img src="assets/images/payments/visa.png" class="max-h-6 inline" title="Visa" alt=""></a></li>
                        </ul>
                    </div><!--end grid-->
                </div><!--end container-->
            </div>
        </footer><!--end footer-->
        <!-- Footer End -->

       	<!-- JAVASCRIPTS -->
        <script src="{{ asset('assets2/libs/choices.js/public/assets/scripts/choices.min.js') }}"></script>
        <script src="{{ asset('assets2/libs/feather-icons/feather.min.js') }}"></script>
        <script src="{{ asset('assets2/js/plugins.init.js') }}"></script>
        <script src="{{ asset('assets2/js/app.js') }}"></script>
        <!-- JAVASCRIPTS -->
    </body>
</html>
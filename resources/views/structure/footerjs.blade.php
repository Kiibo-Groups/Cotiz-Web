
<!-- Vendor JS -->
<script src="{{ asset('assets/js/vendor/jquery-3.5.1.min.js') }}"></script> 
<script src="{{ asset('assets/js/vendor/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/js/vendor/jquery-migrate-3.3.0.min.js') }}"></script>
<script src="{{ asset('assets/js/vendor/modernizr-3.11.2.min.js') }}"></script>

<!-- Main Js -->
<script src="{{ asset('assets/js/vendor/index.js?v='.time()) }}"></script>
@if(Route::is('home'))
<script src="{{ asset('assets/js/vendor/particles.js') }}"></script>
<script src="{{ asset('assets/js/vendor/particles-settings.js') }}"></script>
@endif

<script src="{{ asset('assets/js/plugins.js') }}"></script>
<script src="{{ asset('assets/js/theme.js') }}"></script>
<script src="{{ asset('assets/js/main.js?v='.time()) }}"></script>

<!-- Full Calendar -->
<script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.4/index.global.min.js'></script>
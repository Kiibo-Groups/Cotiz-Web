@if (Session::get('mensaje'))
    <div class="alert alert-{{ Session::get('class') }} alert-fill alert-close alert-dismissible show" role="alert">

        {!! Session::get('mensaje') !!}
    </div>
@endif

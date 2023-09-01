@if (Session::get('mensaje'))
    <div class="alert alert-{{ Session::get('class') }} alert-fill alert-close alert-dismissible show" role="alert">

        {!! Session::get('mensaje') !!}
    </div>
@endif

@if($errors->any())
    <div class="alert alert-danger" role="alert">

        @foreach($errors->all() as $error)
            {{ $error }}<br/>
        @endforeach
    </div>
@endif

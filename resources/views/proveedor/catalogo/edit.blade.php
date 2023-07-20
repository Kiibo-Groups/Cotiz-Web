@extends('layouts.app_proveedor')
@section('title')
    Servicios
@endsection
@section('page_active')
    Editar Servicios
@endsection


@section('content')
    <form action="{{ route('catalogo_update_post') }}" method="POST" enctype="multipart/form-data">

        <input type="hidden" value="{{ $data->id }}" name="id">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        @include('proveedor.catalogo.formedit')
    </form>
@endsection
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

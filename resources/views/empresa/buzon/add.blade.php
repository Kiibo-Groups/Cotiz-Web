@extends('layouts.app_proveedor')
@section('title') Buzón @endsection
@section('page_active') Buzón @endsection



@section('content')
{!! Form::model($data, ['url' => ['user/buzon/create'],'files' => true]) !!}
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
        @include('proveedor.buzon.form')
    </form>
@endsection

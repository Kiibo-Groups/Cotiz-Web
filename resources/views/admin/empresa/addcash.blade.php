@extends('layouts.app_profile')
@section('title') Empresa @endsection
@section('page_active')Cashback @endsection



@section('content')
    {!! Form::model($data, ['url' => [$form_url],'files' => true]) !!}
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
        @include('admin.empresa.formcash')
    </form>
@endsection

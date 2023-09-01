@extends('layouts.app_profile')
@section('title') Buzón @endsection
@section('page_active') Buzón @endsection



@section('content')
{!! Form::model($data, ['url' => ['admin/buzon/create'],'files' => true]) !!}
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
        @include('admin.buzon.form')
    </form>
@endsection

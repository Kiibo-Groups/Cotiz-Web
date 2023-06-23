@extends('layouts.app_profile')
@section('title') Mentores @endsection
@section('page_active') Editar Mentor @endsection 


@section('content')
    {!! Form::model($data, ['url' => $form_url,'files' => true,'method' => 'PATCH']) !!}
    <input type="hidden" value="{{$data->id}}" name="id">
        @include('admin.mentors.form')
    </form>
@endsection
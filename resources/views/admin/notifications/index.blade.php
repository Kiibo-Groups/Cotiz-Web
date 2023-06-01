@extends('layouts.app_profile')
@section('title') Notificaciones @endsection
@section('page_active') Notificaciones @endsection


@section('content')
	<section class="section banners">
		<div class="row">
            @if(count($notifications)>0)
			<div class="col-12">
                <div class="card card-default">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Notificación</th>
                                        <th>Fecha</th>
                                    </tr>
                                </thead>

                                <tbody>

                                    @foreach($notifications as $row)
                                    <tr>
                                        <td>{{$row->message}}</td>
                                        <td>{{$row->created_at}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            @else
                <div class="d-flex align-items-center flex-column py-6">
                    <div>
                        No hay notificaciones
                    </div>
                </div>
            @endif
		</div>
	</section>
@endsection

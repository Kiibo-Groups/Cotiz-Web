@extends('layouts.app_profile2')
@section('title') Servicios @endsection
@section('page_active') Listado de Servicios @endsection 

<link href="{{ asset('assets2/libs/choices.js/public/assets/styles/choices.min.css') }}" rel="stylesheet">
<link href="{{ asset('assets2/libs/@iconscout/unicons/css/line.css') }}" type="text/css" rel="stylesheet" />
<link rel="stylesheet" href="{{ asset('assets2/css/icons.css') }}" />
<link rel="stylesheet" href="{{ asset('assets2/css/tailwind.css') }}" />
@section('content')
<div class="container relative -mt-16 z-1">
	<div class="grid grid-cols-1">
			<div class="p-6 bg-white dark:bg-slate-900 rounded-md shadow-md dark:shadow-gray-800">
					<form action="#">
							<div class="registration-form text-dark text-start">
										<div class="grid lg:grid-cols-4 md:grid-cols-2 grid-cols-1 lg:gap-0 gap-6">
												<div class="filter-search-form relative filter-border">
														<i class="uil uil-search icons"></i>
														<input name="name" type="text" id="job-keyword" class="form-input filter-input-box bg-gray-50 dark:bg-slate-800 border-0" placeholder="Search your keaywords">
												</div>

												<div class="filter-search-form relative filter-border">
														<i class="uil uil-estate icons"></i>
														<select class="form-select z-2" data-trigger name="choices-catagory" id="choices-catagory" aria-label="Default select example">
																<option>Houses</option>
																<option>Apartment</option>
																<option>Offices</option>
																<option>Townhome</option>
														</select>
												</div>
										
												<div class="filter-search-form relative filter-border">
														<i class="uil uil-usd-circle icons"></i>
														<select class="form-select" data-trigger name="choices-min-price" id="choices-min-price" aria-label="Default select example">
																<option>Min Price</option>
																<option>500</option>
																<option>1000</option>
																<option>2000</option>
																<option>3000</option>
																<option>4000</option>
																<option>5000</option>
																<option>6000</option>
														</select>
												</div>
										
												<div class="filter-search-form relative">
														<i class="uil uil-usd-circle icons"></i>
														<select class="form-select" data-trigger name="choices-max-price" id="choices-max-price" aria-label="Default select example">
																<option>Max Price</option>
																<option>500</option>
																<option>1000</option>
																<option>2000</option>
																<option>3000</option>
																<option>4000</option>
																<option>5000</option>
																<option>6000</option>
														</select>
												</div>

												<div class="lg:mt-6">
														<input type="submit" id="search" name="search" class="btn bg-indigo-600 hover:bg-indigo-700 border-indigo-600 hover:border-indigo-700 text-white searchbtn submit-btn w-full !h-12 rounded" value="Search">
												</div>
										</div><!--end grid-->
								</div><!--end container-->
						</form>
						</div>
				</div><!--end grid-->
		</div><!--end container-->
		<!-- End Hero -->
		
		<!-- Start -->
		<section class="relative lg:py-24 py-16">
				<div class="container">
						<div class="grid lg:grid-cols-3 md:grid-cols-2 grid-cols-1 gap-[30px]">
						@foreach($services as $service)
								<div class="group rounded-md bg-white dark:bg-slate-900 shadow hover:shadow-xl dark:hover:shadow-xl dark:shadow-gray-800 dark:hover:shadow-gray-700 overflow-hidden ease-in-out duration-500">
										<div class="relative">
											@if($service->logo) 
												<img src="<?php echo asset('assets/img/logos/'.$service->logo) ?>" alt="">
											@else
											<img src="{{ asset('assets2/images/it/bg.jpg') }}" alt="">
											@endif

												<!--  <div class="absolute top-6 ltr:right-6 rtl:left-6">
														<a href="" class="btn btn-icon text-lg bg-white dark:bg-slate-900 border-0 shadow dark:shadow-gray-800 rounded-full text-red-600"><i class="mdi mdi-heart"></i></a>
												</div> -->
										</div>

										<div class="p-6">
												<div class="pb-2">
														<a href="property-detail.html" class="text-lg hover:text-indigo-600 font-medium ease-in-out duration-500">
															{{ Str::upper($service->provider->name) }}
														</a>
												</div>

												<ul class="py-2 border-y border-gray-100 dark:border-gray-800 flex items-center list-none">
													<li>
															<span class=text-slate-400>Titulo</span>
															<p class="text-lg font-medium">{{ $service->title}}</p>
														</li>
												</ul>
												
												<ul class="py-2 flex justify-between items-center list-none">
														<li>
																<span class="text-slate-400">Descripcion</span>
																<p class="text-lg font-medium">{{ $service->description}}</p>
														</li>
												</ul>
												<ul>
													<li>
															<span class="text-slate-400">Tipo</span>
															<p class="text-lg font-medium">{{ Str::upper($service->type) }}</p>
													</li>
												</ul>
												<ul class="py-2 border-y border-gray-100 justify-between dark:border-gray-800 flex items-center justify-space-ber list-none">
														<li>
															<a href="{{ url(env('admin').'/services/edit/'.$service->id) }}" class="btn bg-indigo-600 hover:bg-indigo-700 border-indigo-600 hover:border-indigo-700 text-white searchbtn submit-btn w-full !h-12 rounded">
															Editar	
														</a>
														</li>
														<li>
															<a href="{{ url(env('admin').'/services/delete/'.$service->id) }}" class="btn bg-red-600 hover:bg-red-700 border-red-600 hover:border-red-700 text-white searchbtn submit-btn w-full !h-12 rounded">
															Eliminar	
														</a>
														</li>
												</ul>
												
										</div>
								</div><!--end property content-->
								@endforeach
						</div><!--en grid-->
						
						<div class="grid md:grid-cols-12 grid-cols-1 mt-8 text-center">
						
						
							
							<div class="md:col-span-12 text-center">
									{{ $services->links('pagination::semantic-ui') }}
								</div>
						</div><!--end grid-->
				</div><!--end container-->
		</section><!--end section-->
</div>

@endsection

 
@extends('board.layouts.master')

@section('page_content')
<div class="page-header d-print-none">
	<div class="container-xl">
		<div class="row g-2 align-items-center">
			<div class="col">
				<!-- Page pre-title -->
				<div class="page-pretitle">
					Show Room Details
				</div>
				<h2 class="page-title">
					Rooms
				</h2>
			</div>
			<!-- Page title actions -->
			<div class="col-auto ms-auto d-print-none">
				<div class="btn-list">

					<a href="{{ route('board.rooms.index') }}" class="btn btn-primary d-none d-sm-inline-block" >
						<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-discount-2" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
							<path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
							<path d="M9 15l6 -6"></path>
							<circle cx="9.5" cy="9.5" r=".5" fill="currentColor"></circle>
							<circle cx="14.5" cy="14.5" r=".5" fill="currentColor"></circle>
							<path d="M5 7.2a2.2 2.2 0 0 1 2.2 -2.2h1a2.2 2.2 0 0 0 1.55 -.64l.7 -.7a2.2 2.2 0 0 1 3.12 0l.7 .7a2.2 2.2 0 0 0 1.55 .64h1a2.2 2.2 0 0 1 2.2 2.2v1a2.2 2.2 0 0 0 .64 1.55l.7 .7a2.2 2.2 0 0 1 0 3.12l-.7 .7a2.2 2.2 0 0 0 -.64 1.55v1a2.2 2.2 0 0 1 -2.2 2.2h-1a2.2 2.2 0 0 0 -1.55 .64l-.7 .7a2.2 2.2 0 0 1 -3.12 0l-.7 -.7a2.2 2.2 0 0 0 -1.55 -.64h-1a2.2 2.2 0 0 1 -2.2 -2.2v-1a2.2 2.2 0 0 0 -.64 -1.55l-.7 -.7a2.2 2.2 0 0 1 0 -3.12l.7 -.7a2.2 2.2 0 0 0 .64 -1.55v-1"></path>
						</svg>
						List All Rooms
					</a>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Page body -->
<div class="page-body">
	<div class="container-xl">
		<div class="row row-deck row-cards">
			<div class="col-md-12">
				<div class="card">
					<div class="card-body">
						<table class="table table-responsive table-bordered">
							<tbody>
								<tr>
									<th> created at </th>
									<td> {{ $room->created_at }} <span class="text-muted"> {{ $room->created_at->diffForHumans() }} </span> </td>
								</tr>
								
								
								<tr>
									<th> Added By </th>
									<td> {{ $room->user?->name }}  </td>
								</tr>

								<tr>
									<th> Name </th>
									<td> {{ $room->name }}  </td>
								</tr>
								<tr>
									<th> Price </th>
									<td> {{ $room->price }} <span class='text-muted' > SAR </span>  </td>
								</tr>

								<tr>
									<th> Type </th>
									<td> {{ $room->type }}  </td>
								</tr>

								<tr>
									<th> availability </th>
									<td> {{ $room->status }}  </td>
								</tr>

								<tr>
									<th> Area </th>
									<td> {{ $room->area?->name }}  </td>
								</tr>

								<tr>
									<th> Description </th>
									<td> {{ $room->description }}  </td>
								</tr>
								
							

								<tr>
									<th> صوره المشروع الرئيسيه </th>
									<td> 
										<a class="avatar" data-fslightbox="gallery" href="{{ Storage::url('rooms/'.$room->image) }}">
											<img  src="{{ Storage::url('rooms/'.$room->image) }}" alt="">
										</a>
									</td>
								</tr>								
							</tbody>
						</table>
					</div>
				</div>
			</div>

			<div class="col-md-12">
				<div class="card">
					<div class="card-header">
						<h3 class="card-title"> More Images </h3>
					</div>
					<div class="card-body">
						<div id="carousel-indicators-thumb" class="carousel slide carousel-fade" data-bs-ride="carousel">
							<div class="carousel-indicators carousel-indicators-thumb">
								

								@php
								$i = 0;
								@endphp
								@foreach ($room->images as $room_image)
								<button type="button" data-bs-target="#carousel-indicators-thumb" data-bs-slide-to="{{ $i }}" class=" ratio ratio-4x3  {{ $i == 0 ? 'active' : '' }}" style="background-image: url({{ Storage::url('rooms/'.$room_image->image) }})">
									
								</button>
								@php
									$i++;
								@endphp
								@endforeach
							</div>
							<div class="carousel-inner">
								@php
								$i = 1;
								@endphp
								@foreach ($room->images as $room_image)
								<div class="carousel-item {{ $i == 1 ? 'active' : '' }}">
									<img class="d-block w-100" alt="" src="{{ Storage::url('rooms/'.$room_image->image) }}">
								</div>
								@php
									$i++;
								@endphp
								@endforeach
							</div>
						</div>
					</div>
				</div>
			</div>


			

		</div>
	</div>
</div>
@endsection

@section('scripts')
<script src="{{ asset('board_assets/dist/libs/fslightbox/index.js?1684106062') }}" defer></script>
@endsection
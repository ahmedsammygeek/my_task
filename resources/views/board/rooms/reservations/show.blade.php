@extends('board.layouts.master')

@section('page_content')
<div class="page-header d-print-none">
	<div class="container-xl">
		<div class="row g-2 align-items-center">
			<div class="col">
				<!-- Page pre-title -->
				<div class="page-pretitle">
					عرض تفاصيل
				</div>
				<h2 class="page-title">
					المشاريع
				</h2>
			</div>
			<!-- Page title actions -->
			<div class="col-auto ms-auto d-print-none">
				<div class="btn-list">

					<a href="{{ route('board.projects.reservations.index' , $project ) }}" class="btn btn-primary d-none d-sm-inline-block" >
						<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-discount-2" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
							<path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
							<path d="M9 15l6 -6"></path>
							<circle cx="9.5" cy="9.5" r=".5" fill="currentColor"></circle>
							<circle cx="14.5" cy="14.5" r=".5" fill="currentColor"></circle>
							<path d="M5 7.2a2.2 2.2 0 0 1 2.2 -2.2h1a2.2 2.2 0 0 0 1.55 -.64l.7 -.7a2.2 2.2 0 0 1 3.12 0l.7 .7a2.2 2.2 0 0 0 1.55 .64h1a2.2 2.2 0 0 1 2.2 2.2v1a2.2 2.2 0 0 0 .64 1.55l.7 .7a2.2 2.2 0 0 1 0 3.12l-.7 .7a2.2 2.2 0 0 0 -.64 1.55v1a2.2 2.2 0 0 1 -2.2 2.2h-1a2.2 2.2 0 0 0 -1.55 .64l-.7 .7a2.2 2.2 0 0 1 -3.12 0l-.7 -.7a2.2 2.2 0 0 0 -1.55 -.64h-1a2.2 2.2 0 0 1 -2.2 -2.2v-1a2.2 2.2 0 0 0 -.64 -1.55l-.7 -.7a2.2 2.2 0 0 1 0 -3.12l.7 -.7a2.2 2.2 0 0 0 .64 -1.55v-1"></path>
						</svg>
						عرض كافه حجوزات المشروع : {{ $project->name }}
					</a>
					<a href="{{ route('board.projects.show' , $project ) }}" class="btn btn-primary d-none d-sm-inline-block" >
						<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-discount-2" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
							<path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
							<path d="M9 15l6 -6"></path>
							<circle cx="9.5" cy="9.5" r=".5" fill="currentColor"></circle>
							<circle cx="14.5" cy="14.5" r=".5" fill="currentColor"></circle>
							<path d="M5 7.2a2.2 2.2 0 0 1 2.2 -2.2h1a2.2 2.2 0 0 0 1.55 -.64l.7 -.7a2.2 2.2 0 0 1 3.12 0l.7 .7a2.2 2.2 0 0 0 1.55 .64h1a2.2 2.2 0 0 1 2.2 2.2v1a2.2 2.2 0 0 0 .64 1.55l.7 .7a2.2 2.2 0 0 1 0 3.12l-.7 .7a2.2 2.2 0 0 0 -.64 1.55v1a2.2 2.2 0 0 1 -2.2 2.2h-1a2.2 2.2 0 0 0 -1.55 .64l-.7 .7a2.2 2.2 0 0 1 -3.12 0l-.7 -.7a2.2 2.2 0 0 0 -1.55 -.64h-1a2.2 2.2 0 0 1 -2.2 -2.2v-1a2.2 2.2 0 0 0 -.64 -1.55l-.7 -.7a2.2 2.2 0 0 1 0 -3.12l.7 -.7a2.2 2.2 0 0 0 .64 -1.55v-1"></path>
						</svg>
						عرض تفاصيل المشروع 
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
									<th> تاريخ اضافه الحجز </th>
									<td> {{ $reservation->created_at }} <span class="text-muted"> {{ $reservation->created_at->diffForHumans() }} </span> </td>
								</tr>
							
								<tr>
									<th> تم الاضافه بواسطه </th>
									<td> {{ $reservation->user?->name }}  </td>
								</tr>

								<tr>
									<th>  تاريخ الوصلو </th>
									<td> {{ $reservation->start_date->toDateString() }}  - <span class='text-muted'> {{ $reservation->start_date->diffForHumans() }} </span>  </td>
								</tr>
								<tr>
									<th>  تاريخ المغادره </th>
									<td> {{ $reservation->end_date->toDateString()  }}  - <span class='text-muted'> {{ $reservation->end_date->diffForHumans() }} </span>  </td>
								</tr>

								<tr>
									<th> اسم العميل </th>
									<td> {{ $reservation->user_name }}  </td>
								</tr>
								<tr>
									<th> تليفون العميل </th>
									<td> {{ $reservation->user_phone }}  </td>
								</tr>


								<tr>
									<th>  محلاظات </th>
									<td> {{ $reservation->notes }}  </td>
								</tr>
							
						</table>
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
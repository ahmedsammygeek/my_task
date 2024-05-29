@extends('board.layouts.master')

@section('page_content')
<div class="page-header d-print-none">
	<div class="container-xl">
		<div class="row g-2 align-items-center">
			<div class="col">
				<!-- Page pre-title -->
				<div class="page-pretitle">
					Show Details
				</div>
				<h2 class="page-title">
					Areas
				</h2>
			</div>
			<!-- Page title actions -->
			<div class="col-auto ms-auto d-print-none">
				<div class="btn-list">

					<a href="{{ route('board.areas.index') }}" class="btn btn-primary d-none d-sm-inline-block" >
						<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-users-group" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
							<path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
							<path d="M10 13a2 2 0 1 0 4 0a2 2 0 0 0 -4 0"></path>
							<path d="M8 21v-1a2 2 0 0 1 2 -2h4a2 2 0 0 1 2 2v1"></path>
							<path d="M15 5a2 2 0 1 0 4 0a2 2 0 0 0 -4 0"></path>
							<path d="M17 10h2a2 2 0 0 1 2 2v1"></path>
							<path d="M5 5a2 2 0 1 0 4 0a2 2 0 0 0 -4 0"></path>
							<path d="M3 13v-1a2 2 0 0 1 2 -2h2"></path>
						</svg>
						List All Areas
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
									<th> Created at </th>
									<td> {{ $area->created_at }} <span class="text-muted"> {{ $area->created_at->diffForHumans() }} </span> </td>
								</tr>
								<tr>
									<th> Added By </th>
									<td> {{ $area->user?->name }}  </td>
								</tr>
								<tr>
									<th> Name </th>
									<td> {{ $area->name }}  </td>
								</tr>
								<tr>
									<th> rooms count </th>
									<td> {{ $area->rooms_count }} </td>
								</tr>

								<tr>
									<th>Show in wbesite </th>
									<td> 
										@switch($area->is_active)
										@case(1)
										<span class="badge bg-success"> Yes </span>
										@break
										@case(0)
										<span class="badge bg-danger"> No </span>
										@break
										@endswitch
									</td>
								</tr>

								<tr>
									<th> current image </th>
									<td> 
										<a class="avatar" data-fslightbox="gallery" href="{{ Storage::url('areas/'.$area->image) }}">
											<img  src="{{ Storage::url('areas/'.$area->image) }}" alt="">
										</a>
									</td>
								</tr>
								
							</tbody>
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
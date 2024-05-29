@extends('board.layouts.master')

@section('page_content')
<div class="page-header d-print-none">
	<div class="container-xl">
		<div class="row g-2 align-items-center">
			<div class="col">
				<!-- Page pre-title -->
				<div class="page-pretitle">
					Edit
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
				<form class="card" method='POST' action='{{ route('board.areas.update' , $area ) }}' enctype="multipart/form-data" >
					@csrf
					@method('PATCH')
					<div class="card-header bg-primary">
						<h3 class="card-title text-white">Edit Area Details </h3>
					</div>
					<div class="card-body">

						<div class="mb-3">
							<label class="form-label required">  Image </label>
							<div>
								<input type="file" class="form-control @error('image') is-invalid @enderror " name='image'  >
								@error('image')
								<small class="form-hint text-danger"> {{ $message }} </small>
								@enderror
							</div>
						</div>

						<div class="mb-3">
							<label class="form-label required"> Name </label>
							<div>
								<input type="text" class="form-control @error('name') is-invalid @enderror " name='name' value="{{ $area->name }}" >
								@error('name')
								<small class="form-hint text-danger"> {{ $message }} </small>
								@enderror
							</div>
						</div>


						<div class="mb-3">
							<label class="form-label"> Active </label>
							<div>
								<label class="form-check">
									<input class="form-check-input" name='is_active' type="checkbox" {{ $area->is_active == 1 ? 'checked' : '' }}>
									<span class="form-check-label"> show in wbesite </span>
								</label>
							</div>
						</div>
					</div>
					<div class="card-footer text-end">
						<div class='d-flex' >
							<a href="{{ route('board.areas.index') }}" class="btn btn-link"> Back </a>
							<button type="submit" class="btn btn-primary ms-auto"> Edit </button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection
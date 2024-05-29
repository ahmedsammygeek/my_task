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
				<form class="card" method='POST' action='{{ route('board.rooms.update' , $room ) }}' enctype="multipart/form-data" >
					@csrf

					@method("PATCH")
					<div class="card-header bg-primary">
						<h3 class="card-title text-white"> Edit Room </h3>
					</div>
					<div class="card-body">

						<div class="row">
							<div class="col-md-4">
								<div class="mb-3">
									<label class="form-label required"> Name </label>
									<div>
										<input type="text" class="form-control @error('name') is-invalid @enderror " name='name' value="{{ $room->name }}" >
										@error('name')
										<small class="form-hint text-danger"> {{ $message }} </small>
										@enderror
									</div>
								</div>
							</div>
							<div class="col-md-4">
								<div class="mb-3">
									<label class="form-label required">Room Image </label>
									<div>
										<input type="file" class="form-control @error('image') is-invalid @enderror " name='image'  >
										@error('image')
										<small class="form-hint text-danger"> {{ $message }} </small>
										@enderror
									</div>
								</div>
							</div>

							<div class="col-md-4">
								<div class="mb-3">
									<label class="form-label required"> Type </label>
									<div>
										<select name="type" id="" class='form-control select' >
											<option value="1" @selected($room->type == 1 ) > Single </option>
											<option value="2" @selected($room->type == 2 ) > Double </option>
											<option value="3" @selected($room->type == 3 ) > Suite </option>
										</select>
										@error('type')
										<small class="form-hint text-danger"> {{ $message }} </small>
										@enderror
									</div>
								</div>
							</div>
							
							<div class="col-md-4">
								<div class="mb-3">
									<label class="form-label required"> Area </label>
									<div>
										<select name="area_id" id="" class='form-control select' >
											@foreach ($areas as $area)
											<option value="{{ $area->id }}" @selected($room->area_id == $area->id ) > {{ $area->name }} </option>
											@endforeach
										</select>
										@error('area_id')
										<small class="form-hint text-danger"> {{ $message }} </small>
										@enderror
									</div>
								</div>
							</div>

							<div class="col-md-4">
								<div class="mb-3">
									<label class="form-label required"> Availability </label>
									<div>
										<select name="availability" id="" class='form-control select' >
											<option value="1" @selected($room->status == 1 ) > availabile </option>
											<option value="2" @selected($room->status == 2 ) > Booked </option>
											<option value="3" @selected($room->status == 3 ) > Pending </option>
										</select>
										@error('availability')
										<small class="form-hint text-danger"> {{ $message }} </small>
										@enderror
									</div>
								</div>
							</div>


							<div class="col-md-4">
								<div class="mb-3">
									<label class="form-label required"> Price </label>
									<div>
										<input type="number" class="form-control @error('price') is-invalid @enderror " name='price' value="{{ $room->price }}" >
										@error('price')
										<small class="form-hint text-danger"> {{ $message }} </small>
										@enderror
									</div>
								</div>
							</div>


							<div class="col-md-12">
								<div class="mb-3">
									<label class="form-label "> More Images </label>
									<div>
										<input type="file" multiple class="form-control @error('images') is-invalid @enderror " name='images[]' >
										@error('images')
										<small class="form-hint text-danger"> {{ $message }} </small>
										@enderror
									</div>
								</div>
							</div>

							<div class="col-md-12">
								<div class="mb-3">
									<label class="form-label required"> Room Details </label>
									<div>
										<textarea name="description" id="" class="form-control" cols="30" rows="10"> {{ $room->description }} </textarea>
										@error('description')
										<small class="form-hint text-danger"> {{ $message }} </small>
										@enderror
									</div>
								</div>
							</div>

							<div class="col-md-12">
								<div class="mb-3">
									<label class="form-label required"> Room Curren Image </label>
									<div>
										<img class=" img-thumbnail" src="{{ Storage::url('rooms/'.$room->image) }}" alt="">
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="card-footer text-end">
						<div class='d-flex' >
							<a href="{{ route('board.rooms.index') }}" class="btn btn-link"> Back </a>
							<button type="submit" class="btn btn-primary ms-auto"> Edit </button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection
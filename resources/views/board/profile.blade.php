@extends('board.layouts.master')

@section('page_content')
<div class="page-header d-print-none">
	<div class="container-xl">
		<div class="row g-2 align-items-center">
			<div class="col">
				<!-- Page pre-title -->
				<div class="page-pretitle">
					تعديل
				</div>
				<h2 class="page-title">
					الملف الشخصى
				</h2>
			</div>

		</div>
	</div>
</div>
<!-- Page body -->
<div class="page-body">
	<div class="container-xl">
		<div class="row row-deck row-cards">
			<div class="col-md-12">
				<form class="card" method='POST' action='{{ route('board.profile.update' ) }}' enctype="multipart/form-data" >
					@csrf
					@method('PATCH')
					<div class="card-header bg-primary">
						<h3 class="card-title text-white"> تعديل الملف الشخصى </h3>
					</div>
					<div class="card-body">

						<div class="mb-3">
							<label class="form-label required"> صوره الملف الشخصى </label>
							<div>
								<input type="file" class="form-control @error('image') is-invalid @enderror " name='image' >
								@error('image')
								<small class="form-hint text-danger"> {{ $message }} </small>
								@enderror
							</div>
						</div>

						<div class="mb-3">
							<label class="form-label required"> الاسم </label>
							<div>
								<input type="text" class="form-control @error('name') is-invalid @enderror " name='name' value="{{ $user->name }}" >
								@error('name')
								<small class="form-hint text-danger"> {{ $message }} </small>
								@enderror
							</div>
						</div>

						<div class="mb-3">
							<label class="form-label required"> البريد الاكترونى </label>
							<div>
								<input type="email" class="form-control @error('email') is-invalid @enderror " name='email' value="{{ $user->email }}" >
								@error('email')
								<small class="form-hint text-danger"> {{ $message }} </small>
								@enderror
							</div>
						</div>

						<div class="mb-3">
							<label class="form-label required"> صوره الملف الشخصى الحاليه هيا  </label>
							<div>
								<img src="{{ Storage::url('users/'.$user->image) }}" alt="">
							</div>
						</div>
					</div>
					<div class="card-footer text-end">
						<div class='d-flex' >
							<a href="{{ route('board.profile.show') }}" class="btn btn-link"> تراجع </a>
							<button type="submit" class="btn btn-primary ms-auto"> تعديل </button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection
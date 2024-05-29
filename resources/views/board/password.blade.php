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
					كلمه المرور
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
				<form class="card" method='POST' action='{{ route('board.password.update' ) }}'  >
					@csrf
					@method('PATCH')
					<div class="card-header bg-primary">
						<h3 class="card-title text-white"> تعديل كلمه المرور </h3>
					</div>
					<div class="card-body">

						<div class="mb-3">
							<label class="form-label required"> كلمه المرور الحاليه </label>
							<div>
								<input type="password" class="form-control @error('current_password') is-invalid @enderror " name='current_password' >
								@error('current_password')
								<small class="form-hint text-danger"> {{ $message }} </small>
								@enderror
							</div>
						</div>

						<div class="mb-3">
							<label class="form-label required"> كلمه المرور الجديده </label>
							<div>
								<input type="password" class="form-control @error('password') is-invalid @enderror " name='password'  >
								@error('password')
								<small class="form-hint text-danger"> {{ $message }} </small>
								@enderror
							</div>
						</div>

						<div class="mb-3">
							<label class="form-label required"> تاكيد كلمه المرور الجديده </label>
							<div>
								<input type="password" class="form-control @error('password_confirmation') is-invalid @enderror " name='password_confirmation'  >
								@error('password_confirmation')
								<small class="form-hint text-danger"> {{ $message }} </small>
								@enderror
							</div>
						</div>

					</div>
					<div class="card-footer text-end">
						<div class='d-flex' >
							<a href="{{ route('board.password.show') }}" class="btn btn-link"> تراجع </a>
							<button type="submit" class="btn btn-primary ms-auto"> تعديل </button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection
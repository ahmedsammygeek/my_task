@extends('board.layouts.master')

@section('page_content')
<div class="page-header d-print-none">
	<div class="container-xl">
		<div class="row g-2 align-items-center">
			<div class="col">
				<!-- Page pre-title -->
				<div class="page-pretitle">
					إضافه
				</div>
				<h2 class="page-title">
					حجوزات المشاريع
				</h2>
			</div>
			<!-- Page title actions -->
			<div class="col-auto ms-auto d-print-none">
				<div class="btn-list">

					<a href="{{ route('board.projects.index') }}" class="btn btn-primary d-none d-sm-inline-block" >
						<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-discount-2" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
							<path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
							<path d="M9 15l6 -6"></path>
							<circle cx="9.5" cy="9.5" r=".5" fill="currentColor"></circle>
							<circle cx="14.5" cy="14.5" r=".5" fill="currentColor"></circle>
							<path d="M5 7.2a2.2 2.2 0 0 1 2.2 -2.2h1a2.2 2.2 0 0 0 1.55 -.64l.7 -.7a2.2 2.2 0 0 1 3.12 0l.7 .7a2.2 2.2 0 0 0 1.55 .64h1a2.2 2.2 0 0 1 2.2 2.2v1a2.2 2.2 0 0 0 .64 1.55l.7 .7a2.2 2.2 0 0 1 0 3.12l-.7 .7a2.2 2.2 0 0 0 -.64 1.55v1a2.2 2.2 0 0 1 -2.2 2.2h-1a2.2 2.2 0 0 0 -1.55 .64l-.7 .7a2.2 2.2 0 0 1 -3.12 0l-.7 -.7a2.2 2.2 0 0 0 -1.55 -.64h-1a2.2 2.2 0 0 1 -2.2 -2.2v-1a2.2 2.2 0 0 0 -.64 -1.55l-.7 -.7a2.2 2.2 0 0 1 0 -3.12l.7 -.7a2.2 2.2 0 0 0 .64 -1.55v-1"></path>
						</svg>
						عرض كافه الحجوزات للمشروع : {{ $project->name }}
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
				<form class="card" method='POST' action='{{ route('board.projects.reservations.store' , $project ) }}' enctype="multipart/form-data" >
					@csrf
					<div class="card-header bg-primary">
						<h3 class="card-title text-white"> إضافه مشروع جديد </h3>
					</div>
					<div class="card-body">

						<div class="row">
							<div class="col-md-3">
								<div class="mb-3">
									<label class="form-label required"> العنوان بالعربيه </label>
									<div>
										<input type="date" class="form-control @error('start_date') is-invalid @enderror " name='start_date' 
										value="{{ old('start_date') }}" required>
										@error('start_date')
										<small class="form-hint text-danger"> {{ $message }} </small>
										@enderror
									</div>
								</div>
							</div>
							<div class="col-md-3">
								<div class="mb-3">
									<label class="form-label required"> صوره المشروع </label>
									<div>
										<input type="date" class="form-control @error('end_date') is-invalid @enderror " name='end_date' 
										value="{{ old('end_date') }}"  required>
										@error('end_date')
										<small class="form-hint text-danger"> {{ $message }} </small>
										@enderror
									</div>
								</div>
							</div>
							<div class="col-md-3">
								<div class="mb-3">
									<label class="form-label "> اسم العميل </label>
									<div>
										<input type="text" class="form-control @error('user_name') is-invalid @enderror " name='user_name' 
										value="{{ old('user_name') }}" >
										@error('user_name')
										<small class="form-hint text-danger"> {{ $message }} </small>
										@enderror
									</div>
								</div>
							</div>
							<div class="col-md-3">
								<div class="mb-3">
									<label class="form-label "> رقم العميل </label>
									<div>
										<input type="text" class="form-control @error('user_phone') is-invalid @enderror " name='user_phone' 
										value="{{ old('user_phone') }}"  >
										@error('user_phone')
										<small class="form-hint text-danger"> {{ $message }} </small>
										@enderror
									</div>
								</div>
							</div>
							<div class="col-md-12">
								<div class="mb-3">
									<label class="form-label "> ملاحظات اضافيه </label>
									<div>
										<input type="text" class="form-control @error('notes') is-invalid @enderror " name='notes' 
										value="{{ old('notes') }}"  >
										@error('notes')
										<small class="form-hint text-danger"> {{ $message }} </small>
										@enderror
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="card-footer text-end">
						<div class='d-flex' >
							<a href="{{ route('board.projects.index') }}" class="btn btn-link"> تراجع </a>
							<button type="submit" class="btn btn-primary ms-auto">إضافه</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection
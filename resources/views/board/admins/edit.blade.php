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
					Admins
				</h2>
			</div>
			<!-- Page title actions -->
			<div class="col-auto ms-auto d-print-none">
				<div class="btn-list">

					<a href="{{ route('board.admins.index') }}" class="btn btn-primary d-none d-sm-inline-block" >
						<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-users-group" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
							<path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
							<path d="M10 13a2 2 0 1 0 4 0a2 2 0 0 0 -4 0"></path>
							<path d="M8 21v-1a2 2 0 0 1 2 -2h4a2 2 0 0 1 2 2v1"></path>
							<path d="M15 5a2 2 0 1 0 4 0a2 2 0 0 0 -4 0"></path>
							<path d="M17 10h2a2 2 0 0 1 2 2v1"></path>
							<path d="M5 5a2 2 0 1 0 4 0a2 2 0 0 0 -4 0"></path>
							<path d="M3 13v-1a2 2 0 0 1 2 -2h2"></path>
						</svg>
						List All Admins
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
				<form class="card" method='POST' action='{{ route('board.admins.update' , $admin ) }}' >
					@csrf
					@method('PATCH')
					<div class="card-header bg-primary">
						<h3 class="card-title text-white"> Edit Admin Details </h3>
					</div>
					<div class="card-body">
						<div class="mb-3">
							<label class="form-label required"> Name </label>
							<div>
								<input type="text" class="form-control @error('name') is-invalid @enderror " name='name' value="{{ $admin->name }}" >
								@error('name')
								<small class="form-hint text-danger"> {{ $message }} </small>
								@enderror
							</div>
						</div>

						<div class="mb-3">
							<label class="form-label required"> Email </label>
							<div>
								<input type="email" class="form-control @error('email') is-invalid @enderror " name='email' value="{{ $admin->email }}" >
								@error('email')
								<small class="form-hint text-danger"> {{ $message }} </small>
								@enderror
							</div>
						</div>

						<div class="mb-3">
							<label class="form-label "> Password </label>
							<div>
								<input type="password" class="form-control @error('password') is-invalid @enderror " name='password'>
								@error('password')
								<small class="form-hint text-danger"> {{ $message }} </small>
								@enderror
							</div>
						</div>




						<div class="mb-3">
							<label class="form-label "> Password Confirmation </label>
							<div>
								<input type="password" class="form-control @error('password_confirmation') is-invalid @enderror " name='password_confirmation'  >
								@error('password_confirmation')
								<small class="form-hint text-danger"> {{ $message }} </small>
								@enderror
							</div>
						</div>


						<div class="mb-3">
							<label class="form-label required"> Permissions </label>
							<div>
								<select name="permissions[]" class='form-control form-select' multiple="multiple" id="select-tags">
									@foreach ($permissions as $permission)
									<option value="{{ $permission->name }}" {{ in_array($permission->name, $user_permissions) ? 'selected="selected"' :"" }} > {{ $permission->name }} </option>
									@endforeach
								</select>
								@error('Permissions')
								<small class="form-hint text-danger"> {{ $message }} </small>
								@enderror
							</div>
						</div>




						<div class="mb-3">
							<label class="form-label"> Active </label>
							<div>
								<label class="form-check">
									<input class="form-check-input" name='active' type="checkbox" {{ $admin->is_active == 1 ? 'checked': '' }}>
									<span class="form-check-label"> allow to login </span>
								</label>
							</div>
						</div>
					</div>
					<div class="card-footer text-end">
						<div class='d-flex' >
							<a href="{{ route('board.admins.index') }}" class="btn btn-link"> Back </a>
							<button type="submit" class="btn btn-primary ms-auto"> Edit </button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection



@section('scripts')
<script src="{{ asset('board_assets/dist/libs/tom-select/dist/js/tom-select.base.min.js') }}" defer></script>
<script>
	$(document).ready(function() {
		window.TomSelect && (new TomSelect(el = document.getElementById('select-tags'), {
			copyClassesToDropdown: false,
		}));
	});
</script>
@endsection
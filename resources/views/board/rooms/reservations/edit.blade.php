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
					المشاريع
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
						عرض كافه المشاريع
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
				<form class="card" method='POST' action='{{ route('board.projects.update' , $project ) }}' enctype="multipart/form-data" >
					@csrf
					@method("PATCH")
					<div class="card-header bg-primary">
						<h3 class="card-title text-white"> تعديل بيانات  المشروع  </h3>
					</div>
					<div class="card-body">

						<div class="row">
							<div class="col-md-4">
								<div class="mb-3">
									<label class="form-label required"> العنوان بالعربيه </label>
									<div>
										<input type="text" class="form-control @error('name_ar') is-invalid @enderror " name='name_ar' value="{{ $project->name }}" >
										@error('name_ar')
										<small class="form-hint text-danger"> {{ $message }} </small>
										@enderror
									</div>
								</div>
							</div>
							<div class="col-md-4">
								<div class="mb-3">
									<label class="form-label "> صوره المشروع </label>
									<div>
										<input type="file" class="form-control @error('image') is-invalid @enderror " name='image'  >
										@error('image')
										<small class="form-hint text-danger"> {{ $message }} </small>
										@enderror
									</div>
								</div>
							</div>

							<div class="col-md-2">
								<div class="mb-3">
									<label class="form-label required"> التصنيف </label>
									<div>
										<select name="category_id" id="" class='form-control select' >
											@foreach ($categories as $category)
											<option value="{{ $category->id }}" {{ $project->category_id == $category->id ? 'selected="selectd"' : '' }} > {{ $category->name }} </option>
											@endforeach
										</select>
										@error('category_id')
										<small class="form-hint text-danger"> {{ $message }} </small>
										@enderror
									</div>
								</div>
							</div>
							
							<div class="col-md-2">
								<div class="mb-3">
									<label class="form-label required"> المنطقه </label>
									<div>
										<select name="area_id" id="" class='form-control select' >
											@foreach ($areas as $area)
											<option value="{{ $area->id }}" {{ $project->area_id == $area->id ? 'selected="selectd"' : '' }} > {{ $area->name }} </option>
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
									<label class="form-label required"> العنوان التصفيلى للمشروع </label>
									<div>
										<input type="text" class="form-control @error('address') is-invalid @enderror " name='address' value="{{ $project->address }}" >
										@error('address')
										<small class="form-hint text-danger"> {{ $message }} </small>
										@enderror
									</div>
								</div>
							</div>

							<div class="col-md-2">
								<div class="mb-3">
									<label class="form-label required"> عدد الغرف </label>
									<div>
										<input type="number" class="form-control @error('rooms') is-invalid @enderror " name='rooms' value="{{ $project->rooms }}" >
										@error('rooms')
										<small class="form-hint text-danger"> {{ $message }} </small>
										@enderror
									</div>
								</div>
							</div>
							<div class="col-md-2">
								<div class="mb-3">
									<label class="form-label required"> عدد الحمامات </label>
									<div>
										<input type="number" class="form-control @error('bathrooms') is-invalid @enderror " name='bathrooms' value="{{ $project->bathrooms }}" >
										@error('bathrooms')
										<small class="form-hint text-danger"> {{ $message }} </small>
										@enderror
									</div>
								</div>
							</div>

							<div class="col-md-2">
								<div class="mb-3">
									<label class="form-label required"> المساجه الكليه </label>
									<div>
										<input type="text" class="form-control @error('total_area') is-invalid @enderror " name='total_area' value="{{ $project->total_area }}" >
										@error('total_area')
										<small class="form-hint text-danger"> {{ $message }} </small>
										@enderror
									</div>
								</div>
							</div>

							<div class="col-md-2">
								<div class="mb-3">
									<label class="form-label required"> السعر </label>
									<div>
										<input type="number" class="form-control @error('price') is-invalid @enderror " name='price' value="{{ $project->price }}" >
										@error('price')
										<small class="form-hint text-danger"> {{ $message }} </small>
										@enderror
									</div>
								</div>
							</div>

							<div class="col-md-3">
								<div class="mb-3">
									<label class="form-label required"> الجراج </label>
									<div>
										<input type="number" class="form-control @error('garage') is-invalid @enderror " name='garage' value="{{ $project->garage }}" >
										@error('garage')
										<small class="form-hint text-danger"> {{ $message }} </small>
										@enderror
									</div>
								</div>
							</div>
							<div class="col-md-3">
								<div class="mb-3">
									<label class="form-label required"> بدروم</label>
									<div>
										<input type="number" class="form-control @error('basement') is-invalid @enderror " name='basement' value="{{ $project->basement }}" >
										@error('basement')
										<small class="form-hint text-danger"> {{ $message }} </small>
										@enderror
									</div>
								</div>
							</div>
							<div class="col-md-3">
								<div class="mb-3">
									<label class="form-label required"> حمام سباحه </label>
									<div>
										<input type="number" class="form-control @error('swimming_pool') is-invalid @enderror " name='swimming_pool' value="{{ $project->swimming_pool }}" >
										@error('swimming_pool')
										<small class="form-hint text-danger"> {{ $message }} </small>
										@enderror
									</div>
								</div>
							</div>
							<div class="col-md-3">
								<div class="mb-3">
									<label class="form-label required"> ايجار & بيع </label>
									<div>
										<select name="type" class='form-control select' >
											<option value="1" {{  $project->type == 1 ? 'selected="selectd"' : '' }} > ايجار </option>
											<option value="2" {{  $project->type == 2 ? 'selected="selectd"' : '' }} > بيع </option>
										</select>
										@error('type')
										<small class="form-hint text-danger"> {{ $message }} </small>
										@enderror
									</div>
								</div>
							</div>

							<div class="col-md-6">
								<div class="mb-3">
									<label class="form-label "> رابط الفديو </label>
									<div>
										<input type="text" class="form-control @error('youtube_link') is-invalid @enderror " name='youtube_link' value="{{ $project->youtube_link }}" >
										@error('youtube_link')
										<small class="form-hint text-danger"> {{ $message }} </small>
										@enderror
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="mb-3">
									<label class="form-label "> صور اضافيه </label>
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
									<label class="form-label "> صور slider </label>
									<div>
										<input type="file" multiple class="form-control @error('slides') is-invalid @enderror " name='slides[]' >
										@error('slides')
										<small class="form-hint text-danger"> {{ $message }} </small>
										@enderror
									</div>
								</div>
							</div>
							<div class="col-md-12">
								<div class="mb-3">
									<label class="form-label required">  تفاصيل المشروع </label>
									<div>
										<textarea name="content" id="" class="form-control" cols="30" rows="10"> {{ $project->content }} </textarea>
										@error('content')
										<small class="form-hint text-danger"> {{ $message }} </small>
										@enderror
									</div>
								</div>
							</div>
						</div>
						<div class="mb-3">
							<label class="form-label"> خصائص </label>
							<div>
								<label class="form-check">
									<input class="form-check-input" name='is_active' type="checkbox" {{ $project->is_active == 1 ? 'checked' : '' }}>
									<span class="form-check-label"> السماح بالعرض </span>
								</label>
							</div>
						</div>
					</div>
					<div class="card-footer text-end">
						<div class='d-flex' >
							<a href="{{ route('board.projects.index') }}" class="btn btn-link"> تراجع </a>
							<button type="submit" class="btn btn-primary ms-auto"> تعديل </button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection
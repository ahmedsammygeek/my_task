@extends('board.layouts.master')

@section('page_content')
<div class="page-header d-print-none">
	<div class="container-xl">
		<div class="row g-2 align-items-center">
			<div class="col">
				<!-- Page pre-title -->
				<div class="page-pretitle">
					عرض
				</div>
				<h2 class="page-title">
					حجوزات المشاريع
				</h2>
			</div>
			<!-- Page title actions -->
			<div class="col-auto ms-auto d-print-none">
				<div class="btn-list">
					<a href="{{ route('board.projects.index' ) }}" class="btn btn-primary d-none d-sm-inline-block" >
						
						الرجوع الى كافه المشاريع
					</a>
					<a href="{{ route('board.projects.reservations.create' , $project ) }}" class="btn btn-primary d-none d-sm-inline-block" >
						<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-plus" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
							<path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
							<path d="M12 5l0 14"></path>
							<path d="M5 12l14 0"></path>
						</svg>
						إضافه حجز  جديد للمشروع : {{ $project->name }}
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
				@livewire('board.projects.list-all-project-reservations' ,  ['project' => $project ] )
			</div>
		</div>
	</div>
</div>
@endsection
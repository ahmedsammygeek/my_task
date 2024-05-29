@extends('board.layouts.master')

@section('page_content')

<div class='page-body'>
	<div class="container-xl">

		<div class="row row-deck row-cards">
			<h2> Welcome in adminpanel </h2>
		</div>

		<div class="row row-deck row-cards">
			<div class="col-12">
				<div class="row row-cards">

					<div class="col-md-4">
						<div class="card card-sm">
							<div class="card-body">
								<div class="row align-items-center">
									<div class="col-auto">
										<span class="bg-primary text-white avatar">
											<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-armchair-2" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
												<path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
												<path d="M5 10v-4a3 3 0 0 1 3 -3h8a3 3 0 0 1 3 3v4"></path>
												<path d="M16 15v-2a3 3 0 1 1 3 3v3h-14v-3a3 3 0 1 1 3 -3v2"></path>
												<path d="M8 12h8"></path>
												<path d="M7 19v2"></path>
												<path d="M17 19v2"></path>
											</svg>
										</span>
									</div>
									<div class="col">
										<div class="font-weight-medium">
											{{ $admins_count }} 
										</div>
										<div class="text-muted">
											Admins
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="col-md-4">
						<div class="card card-sm">
							<div class="card-body">
								<div class="row align-items-center">
									<div class="col-auto">
										<span class="bg-facebook text-white avatar">
											<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-discount-2" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
												<path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
												<path d="M9 15l6 -6"></path>
												<circle cx="9.5" cy="9.5" r=".5" fill="currentColor"></circle>
												<circle cx="14.5" cy="14.5" r=".5" fill="currentColor"></circle>
												<path d="M5 7.2a2.2 2.2 0 0 1 2.2 -2.2h1a2.2 2.2 0 0 0 1.55 -.64l.7 -.7a2.2 2.2 0 0 1 3.12 0l.7 .7a2.2 2.2 0 0 0 1.55 .64h1a2.2 2.2 0 0 1 2.2 2.2v1a2.2 2.2 0 0 0 .64 1.55l.7 .7a2.2 2.2 0 0 1 0 3.12l-.7 .7a2.2 2.2 0 0 0 -.64 1.55v1a2.2 2.2 0 0 1 -2.2 2.2h-1a2.2 2.2 0 0 0 -1.55 .64l-.7 .7a2.2 2.2 0 0 1 -3.12 0l-.7 -.7a2.2 2.2 0 0 0 -1.55 -.64h-1a2.2 2.2 0 0 1 -2.2 -2.2v-1a2.2 2.2 0 0 0 -.64 -1.55l-.7 -.7a2.2 2.2 0 0 1 0 -3.12l.7 -.7a2.2 2.2 0 0 0 .64 -1.55v-1"></path>
											</svg>
										</span>
									</div>
									<div class="col">
										<div class="font-weight-medium">
											{{ $areas_count }}
										</div>
										<div class="text-muted">
											Areas
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-4">
						<div class="card card-sm">
							<div class="card-body">
								<div class="row align-items-center">
									<div class="col-auto">
										<span class="bg-primary text-white avatar">
											<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-armchair-2" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
												<path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
												<path d="M5 10v-4a3 3 0 0 1 3 -3h8a3 3 0 0 1 3 3v4"></path>
												<path d="M16 15v-2a3 3 0 1 1 3 3v3h-14v-3a3 3 0 1 1 3 -3v2"></path>
												<path d="M8 12h8"></path>
												<path d="M7 19v2"></path>
												<path d="M17 19v2"></path>
											</svg>
										</span>
									</div>
									<div class="col">
										<div class="font-weight-medium">
											{{ $rooms_count }} 
										</div>
										<div class="text-muted">
											Rooms
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>


				</div>
			</div>
		</div>
		<hr>
	{{-- 	<div class="row row-deck row-cards">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header">
						<ul class="nav nav-tabs card-header-tabs nav-fill" data-bs-toggle="tabs">
							<li class="nav-item">
								<a href="#tabs-home-7" class="nav-link active " data-bs-toggle="tab">
									<span> المشاريع الاكثر مشاهده </span>
									<span class="badge bg-blue text-blue-fg ms-2   ">10</span>
								</a>
							</li>
							<li class="nav-item">
								<a href="#tabs-profile-7" class="nav-link " data-bs-toggle="tab">
									
									الخدمات الاكثر مشاهده
									<span class="badge bg-blue text-blue-fg ms-2   ">10</span>
								</a>
							</li>
							<li class="nav-item">
								<a href="#tabs-activity-7" class="nav-link " data-bs-toggle="tab">								
									المقالات الاكثر مشاهده
									<span class="badge bg-blue text-blue-fg ms-2   ">10</span>
								</a>
							</li>
						</ul>
					</div>
					<div class="card-body">
						<div class="tab-content">
							<div class="tab-pane active show" id="tabs-home-7">
								<div>
									<table class="table table-vcenter card-table">
										<thead>
											<tr>
												<th> اسم المشروع </th>
												<th> المنطقه </th>
												<th> التصنيف </th>
												<th> عدد مرات الشماهدهس </th>
												<th class="w-1"></th>
											</tr>
										</thead>
										<tbody>
											@foreach ($most_viewd_projects as $project)
											<tr>
												<td> {{ $project->name }} </td>
												<td class="text-secondary">
													{{ $project->area?->name }}
												</td>
												<td class="text-secondary">
													{{ $project->category?->name }}
												</td>
												<td class="text-secondary">
													{{ $project->views_count }}
												</td>
												<td>
													<a href="{{ route('board.projects.show' , $project ) }}"> شاهد </a>
												</td>
											</tr>
											@endforeach
										</tbody>
									</table>
								</div>
							</div>
							<div class="tab-pane" id="tabs-profile-7">
								<div>
									<table class="table table-vcenter card-table">
										<thead>
											<tr>
												<th> اسم الخدمه </th>
												<th> عدد مرات الشماهدهس </th>
												<th class="w-1"></th>
											</tr>
										</thead>
										<tbody>
											@foreach ($most_viewd_projects as $service)
											<tr>
												<td> {{ $service->name }} </td>
												<td class="text-secondary">
													{{ $service->views_count }}
												</td>
												<td>
													<a href="{{ route('board.services.show' , $service ) }}"> شاهد </a>
												</td>
											</tr>
											@endforeach
										</tbody>
									</table>
								</div>
							</div>
							<div class="tab-pane" id="tabs-activity-7">
								<div>
									<table class="table table-vcenter card-table">
										<thead>
											<tr>
												<th> عنوان المقال </th>
												<th> عدد مرات الشماهدهس </th>
												<th class="w-1"></th>
											</tr>
										</thead>
										<tbody>
											@foreach ($most_viewd_topics as $topic)
											<tr>
												<td> {{ $topic->title }} </td>
												<td class="text-secondary">
													{{ $topic->views_count }}
												</td>
												<td>
													<a href="{{ route('board.topics.show' , $topic ) }}"> شاهد </a>
												</td>
											</tr>
											@endforeach
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div> --}}
	</div>
</div>

@endsection
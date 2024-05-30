@extends('board.layouts.master')

@section('page_content')
<div class="page-header d-print-none">
	<div class="container-xl">
		<div class="row g-2 align-items-center">
			<div class="col">
				<!-- Page pre-title -->
				<div class="page-pretitle">
					Reservations
				</div>
				<h2 class="page-title">
					Room Reservations
				</h2>
			</div>
			<!-- Page title actions -->
			<div class="col-auto ms-auto d-print-none">
				<div class="btn-list">
					<a href="{{ route('board.rooms.index' ) }}" class="btn btn-primary d-none d-sm-inline-block" >
						back to all rooms
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
				@livewire('board.rooms.list-all-room-reservations' ,  ['room' => $room ] )
			</div>
		</div>
	</div>
</div>
@endsection
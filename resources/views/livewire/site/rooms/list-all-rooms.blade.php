<div>
    <div class="container">
        <div class="row">
            <div class="col-lg-4" wire:ignore.self >
                <aside> 
                    <div class="search">
                        <i class="bx bx-search"></i>
                        <input type="text" wire:model='search' placeholder="ابحث هنا ...">
                    </div>
                    <div class="accordion" id="accordionExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    مكان العقار
                                </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <ul>
                                        @foreach ($areas as $area)
                                        <li>
                                            <span> {{ $area->name }} </span>
                                            <input type="checkbox" value={{ $area->id }} wire:model='areas_ids'>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button wire:click='resetFilters' class="btn-search"> إعادة تعيين </button>
                </aside>
            </div>
            <div class="col-lg-8">
                <div class="list-heading">
                    <h4>عرض {{ $rooms->count() * $rooms->currentPage() }} نتيجة من {{ $rooms->total() }} </h4>
                </div>

                <div class="text-center col-md-12" wire:loading>
                    <div class="spinner-border" role="status">
                        <span class="visually-hidden"> جارى البحث بناء على طلبك...... </span>
                    </div>
                </div>

                @if (count($rooms))
                @foreach ($rooms as $room)
                <div class="list-item-box" >
                    <div class="list-item-box-img">
                        <img src="{{ Storage::url('rooms/'.$room->image) }}" alt="list item">
                    </div>
                    <div class="list-item-box-text">
                        <div class="top">
                            <div class="name">
                               {{ $room->type }}
                                <a href="{{ $room->urlForSite() }}"> {{ $room->name }} </a>
                            </div>
                            <h4> {{ $room->price }} SAR </h4>
                        </div>
                        <div class="list">
                            <ul>
                                <li>
                                    <i class='bx bx-bed'></i>
                                    {{ $room->roomsTypesAsText() }}
                                </li>
                            </ul>
                        </div>
                        <div class="bottom">
                            <li>
                                <i class='bx bx-location-plus'></i>
                                {{ $room->address }}
                            </li>
                            <button>
                                <a href="{{ $room->urlForSite() }}"> عرض </a>
                            </button>
                        </div>
                    </div>
                </div>
                @endforeach
                @else
                <div class="alert alert-warning text-center mt-4" role="alert">
                   لا يوجد نتائج تطابق بحثك
                </div>
                @endif

                <div class="pagination">
                    {{ $rooms->links() }}
                </div>
            </div>
        </div>
    </div>

</div>

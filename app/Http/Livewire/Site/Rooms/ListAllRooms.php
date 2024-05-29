<?php

namespace App\Http\Livewire\Site\Rooms;

use Livewire\Component;
use App\Models\Area;
use App\Models\Room;
use Livewire\WithPagination;
class ListAllRooms extends Component
{   
    use WithPagination;

    protected $queryString = ['search'  , 'areas_ids' ];

    public $areas;
    public $search;
    public $areas_ids = [];

    protected $paginationTheme = 'bootstrap';

    public function mount()
    {
        $this->areas = Area::where('is_active'  , 1)->get();
    }

    public function resetFilters()
    {
        $this->search = null;
        $this->areas_ids = [];
    }


    public function updated()
    {
        $this->resetPage();
    }

    public function render()
    {
        $rooms = Room::query()
        ->when($this->search , function($query){
            $query->where('name' , 'LIKE' , '%'.$this->search.'%' );
        })
        ->when($this->areas_ids , function($query){
            $query->whereIn('area_id' , $this->areas_ids );
        })
        ->latest()->paginate(10);
        return view('livewire.site.rooms.list-all-rooms' , compact('rooms') );
    }
}

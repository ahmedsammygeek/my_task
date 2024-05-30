<?php

namespace App\Http\Livewire\Board\Rooms;

use Livewire\Component;
use App\Models\Room;
use App\Models\Area;
use Livewire\WithPagination;

class ListAllRooms extends Component
{

    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    protected $listeners = ['deleteITem'];

    public $areas ;
    public $area_id ;
    public $status ;
    public $type ;
    public $search ;



    public function updated()
    {
        $this->resetPage();
    }

    public function deleteITem($itemId)
    {
        $item = Room::find($itemId);
        if ($item) 
            $item->delete();
    }


    public function mount($value='')
    {
        $this->areas = Area::select('id' , 'name' )->get();
    }

    public function render()
    {
        $rooms = Room::with(['area'])
        ->when($this->search , function($query){
            $query->where('name' , 'LIKE' , '%'.$this->search.'%' );
        })
        ->when($this->area_id , function($query){
            $query->where('area_id' , $this->area_id );
        })
        ->when($this->type , function($query){
            $query->where('type' , $this->type );
        })
        ->when($this->status , function($query){
            $query->where('status' , $this->status );
        })
        ->latest()->paginate(10);
        return view('livewire.board.rooms.list-all-rooms' , compact('rooms'));
    }
}

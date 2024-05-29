<?php

namespace App\Http\Livewire\Board\Rooms;

use Livewire\Component;
use App\Models\Room;
use Livewire\WithPagination;

class ListAllRooms extends Component
{

    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    protected $listeners = ['deleteITem'];


    public function deleteITem($itemId)
    {
        $item = Room::find($itemId);
        if ($item) 
            $item->delete();
    }

    public function render()
    {
        $rooms = Room::with(['area'])->latest()->paginate(10);
        return view('livewire.board.rooms.list-all-rooms' , compact('rooms'));
    }
}

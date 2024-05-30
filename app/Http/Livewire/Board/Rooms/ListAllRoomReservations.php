<?php

namespace App\Http\Livewire\Board\Rooms;

use Livewire\Component;
use App\Models\RoomReservation;
use Livewire\WithPagination;
class ListAllRoomReservations extends Component
{
    use WithPagination;
    public $room;

    protected $listeners = ['cancel' , 'approve' ];


    public function approve($itemId)
    {
        $item = RoomReservation::find($itemId);
        if ($item) {
            $item->status = 2 ;
            $item->save();
        }
    }

    public function cancel($itemId)
    {
        $item = RoomReservation::find($itemId);
        if ($item) {
            $item->status = 3 ;
            $item->save();
        }
    }


    public function mount($room)
    {
        $this->room = $room;
    }

    public function render()
    {
        $reservations = RoomReservation::with('user')->where('room_id' , $this->room->id )->latest()->paginate(10);
        return view('livewire.board.rooms.list-all-room-reservations' , compact('reservations'));
    }
}

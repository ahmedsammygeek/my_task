<?php

namespace App\Http\Livewire\Site\Rooms;

use Livewire\Component;
use App\Models\RoomReservation as RoomReservationModel;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Auth;
class RoomReservation extends Component
{
    use LivewireAlert;
    public $start_date;
    public $room;
    public $end_date;

    protected $rules = [
        'start_date' => 'required',
        'end_date' => 'required',
    ];


    public function mount($room)
    {
        $this->room = $room;
    }


    public function send()
    {

        if (!Auth::check()) {
            $this->alert('error', 'برجاء تسجيل الدخول اولا');
            return;
        }

        $this->validate();
        $reservation = new RoomReservationModel;
        $reservation->user_id = Auth::id();
        $reservation->room_id = $this->room->id;
        $reservation->check_in_date = $this->start_date;
        $reservation->check_out_date = $this->end_date;
        $reservation->status = 1;
        $reservation->save();
        $this->alert('success', 'تم تقديم الطلب بنجاح ');

        $this->start_date = null;
        $this->end_date = null;

    }


    public function render()
    {
        return view('livewire.site.rooms.room-reservation');
    }
}

<?php

namespace App\Http\Controllers\Board;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\RoomReservation;
class RoomReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Room $room)
    {
        return view('board.rooms.reservations.index' , compact('room') );
    }
}

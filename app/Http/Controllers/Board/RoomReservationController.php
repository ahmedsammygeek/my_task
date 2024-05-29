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
    public function index(Room $project)
    {
        return view('board.rooms.reservations.index' , compact('project') );
    }

    /**
     * Display the specified resource.
     */
    public function show(Room $project , RoomReservation $reservation)
    {
        return view('board.rooms.reservations.show' , compact('project' , 'reservation' ) );
    }
}

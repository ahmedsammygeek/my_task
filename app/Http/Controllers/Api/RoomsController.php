<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\RoomReservation;
use App\Http\Resources\Api\RoomResource;
use App\Http\Requests\Api\ReserRoomRequest;
use Auth;
class RoomsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rooms = Room::where('status' , 1 )->latest()->get();

        return response()->json([
            'status' => 'success' , 
            'data' => [
                'rooms' => RoomResource::collection($rooms) , 
            ] , 
            'errors' => [] , 
            'message' => ''
        ], 200);
    }



    public function show(Room $room)
    {

        return response()->json([
            'status' => 'success' , 
            'data' => [
                'room' => new RoomResource($room) , 
            ] , 
            'errors' => [] , 
            'message' => ''
        ], 200);
    }


    public function reserve(Room $room , ReserRoomRequest $request)
    {
        
        $reservation = new RoomReservation;
        $reservation->user_id = Auth::id();
        $reservation->room_id = $room->id;
        $reservation->check_in_date = $request->check_in_date;
        $reservation->check_out_date = $request->check_out_date;
        $reservation->status = 1;
        $reservation->save();

        return response()->json([
            'status' => 'success' , 
            'data' => [] , 
            'errors' => [] , 
            'message' => 'request has been send successfully'
        ], 200);
    }


}

<?php

namespace App\Http\Controllers\Board;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Area;
use App\Models\Room;
use App\Models\RoomImage;
use Auth;

use App\Http\Requests\Board\Rooms\StoreRoomRequest;
use App\Http\Requests\Board\Rooms\UpdateRoomRequest;
class RoomController extends Controller
{
     /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize('list rooms');
        return view('board.rooms.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('create rooms');
        $areas = Area::all();
        return view('board.rooms.create' , compact('areas' ) );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRoomRequest $request)
    {
        $this->authorize('create rooms');
        $room = new Room;
        $room->name = $request->name;
        $room->user_id = Auth::id();
        $room->image = basename($request->file('image')->store('rooms'));
        $room->area_id = $request->area_id;
        $room->status = $request->availability;
        $room->type = $request->type;
        $room->price = $request->price;
        $room->description = $request->description;

        $room->save();

        if ($request->hasFile('images')) {
            $room_images = [];
            for ($i=0; $i <count($request->file('images')) ; $i++) { 
                $room_images[] = new RoomImage([
                    'user_id' => Auth::id() , 
                    'image' => basename($request->file('images.'.$i)->store('rooms')) ,
                    'room_id' => $room->id , 
                ]);
            }

            $room->images()->saveMany($room_images);
        }




        return redirect(route('board.rooms.index'))->with('success' , 'Room Added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Room $room)
    {
        $this->authorize('show rooms');
        $room->load(['user' , 'area'  , 'images' ]);
        return view('board.rooms.show' , compact('room') );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Room $room)
    {
        $this->authorize('update rooms');
        $areas = Area::all();
        return view('board.rooms.edit' , compact('room' , 'areas'  ) );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRoomRequest $request, Room $room)
    {

        $this->authorize('update rooms');
        if ($request->hasFile('image')) {
            $room->image = basename($request->file('image')->store('rooms'));
        }
        $room->name = $request->name;
        $room->user_id = Auth::id();
        $room->area_id = $request->area_id;
        $room->status = $request->availability;
        $room->type = $request->type;
        $room->price = $request->price;
        $room->description = $request->description;

        $room->save();

        if ($request->hasFile('images')) {
            $room_images = [];
            for ($i=0; $i <count($request->file('images')) ; $i++) { 
                $room_images[] = new RoomImage([
                    'user_id' => Auth::id() , 
                    'image' => basename($request->file('images.'.$i)->store('rooms')) ,
                    'room_id' => $room->id , 
                ]);
            }

            $room->images()->saveMany($room_images);
        }
        return redirect(route('board.rooms.index'))->with('success' , 'Room Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

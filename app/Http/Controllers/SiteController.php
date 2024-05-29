<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Area;
use App\Models\Room;
use App\Http\Requests\Site\ContactUsRequest;

class SiteController extends Controller
{

    public function index()
    {
        $rooms = Room::where('status' , 1 )->latest()->get();
        $areas = Area::withCount('rooms')->where('is_active' , 1 )->get();

        return view('site.index' , compact('rooms' , 'areas') );
    }

    public function rooms()
    {
        $rooms = Room::where('status' , 1 )->latest()->get();
        return view('site.rooms' , compact('rooms') );
    }


    public function show(Room $room)
    {
        $room->load('area');
        return view('site.room' , compact('room') );
    }

}

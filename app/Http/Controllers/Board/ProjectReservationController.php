<?php

namespace App\Http\Controllers\Board;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\ProjectReservation;
use Auth;
class ProjectReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Project $project)
    {
        return view('board.projects.reservations.index' , compact('project') );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Project  $project)
    {
        return view('board.projects.reservations.create' , compact('project') );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request ,Project $project)
    {
        $reservation = new ProjectReservation;
        $reservation->project_id = $project->id;
        $reservation->start_date = $request->start_date;
        $reservation->end_date = $request->end_date;
        $reservation->user_id = Auth::id();
        $reservation->user_name = $request->user_name;
        $reservation->user_phone = $request->user_phone;
        $reservation->notes = $request->notes;
        $reservation->save();

        return redirect(route('board.projects.reservations.index' , $project ))->with('success' , 'تم اضفاه ميعاد الحجز بنجاح' );
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project , ProjectReservation $reservation)
    {
        return view('board.projects.reservations.show' , compact('project' , 'reservation' ) );
    }

}

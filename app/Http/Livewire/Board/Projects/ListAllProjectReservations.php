<?php

namespace App\Http\Livewire\Board\Projects;

use Livewire\Component;
use App\Models\ProjectReservation;
class ListAllProjectReservations extends Component
{

    public $project;

    protected $listeners = ['deleteITem'];


    public function deleteITem($itemId)
    {
        $item = ProjectReservation::find($itemId);
        if ($item) 
            $item->delete();
    }

    public function render()
    {
        $reservations = ProjectReservation::with('user')->latest()->get();
        return view('livewire.board.projects.list-all-project-reservations' , compact('reservations'));
    }
}

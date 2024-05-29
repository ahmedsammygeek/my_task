<?php

namespace App\Http\Livewire\Board\Projects;

use Livewire\Component;
use App\Models\Project;
class ListAllProjects extends Component
{


    protected $listeners = ['deleteITem'];


    public function deleteITem($itemId)
    {
        $item = Project::find($itemId);
        if ($item) 
            $item->delete();
    }

    public function render()
    {
        $projects = Project::with(['category' , 'area'  ])->latest()->get();
        return view('livewire.board.projects.list-all-projects' , compact('projects'));
    }
}

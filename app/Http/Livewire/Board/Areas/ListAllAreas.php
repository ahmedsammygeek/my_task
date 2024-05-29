<?php

namespace App\Http\Livewire\Board\Areas;

use Livewire\Component;
use App\Models\Area;
use Livewire\WithPagination;
class ListAllAreas extends Component
{

      use WithPagination;

    protected $paginationTheme = 'bootstrap';

    protected $listeners = ['deleteITem'];


    public function deleteITem($itemId)
    {
        $item = Area::find($itemId);
        if ($item) 
            $item->delete();
    }

    public function render()
    {
        $areas = Area::withCount('rooms')->with('user')->paginate(10);
        return view('livewire.board.areas.list-all-areas' , compact('areas'));
    }
}

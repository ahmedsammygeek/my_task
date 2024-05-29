<?php

namespace App\Http\Livewire\Board\Admins;

use Livewire\Component;
use App\Models\User;
class ListAllAdmins extends Component
{


    protected $listeners = ['deleteITem'];


    public function deleteITem($itemId)
    {
        $item = User::find($itemId);
        if ($item) 
            $item->delete();
    }

    public function render()
    {
        $users = User::with('user')->get();
        return view('livewire.board.admins.list-all-admins' , compact('users'));
    }
}

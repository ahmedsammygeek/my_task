<?php

namespace App\Http\Livewire\Site\Projects;

use Livewire\Component;
use App\Models\ProjectMessage;
use Jantinnerezo\LivewireAlert\LivewireAlert;
class ProjectSendMessage extends Component
{
     use LivewireAlert;
    public $name;
    public $email;
    public $phone;
    public $message;
    public $project;

    protected $rules = [
        'name' => 'required|min:6',
        'email' => 'nullable|email',
        'phone' => 'required' , 
        'message' => 'required'  , 
    ];



    public function send()
    {
        $this->validate();
        $message = new ProjectMessage;
        $message->message = $this->message;
        $message->name = $this->name;
        $message->email = $this->email;
        $message->phone = $this->phone;
        $message->project_id = $this->project->id;
        $message->save();
        $this->alert('success', 'تم استقابل رسالت بنجاح و سف يتم التواصل معك');

        $this->message = null;
        $this->name = null;
        $this->email = null;
        $this->phone = null;

    }


    public function render()
    {
        return view('livewire.site.projects.project-send-message');
    }
}

<?php

namespace App\Http\Livewire\Site;

use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use App\Mail\ContactUsMail;
use Mail;
class ContactUs extends Component
{
    use LivewireAlert;
    public $name;
    public $phone;
    public $email;
    public $message;

    protected $rules = [
        'name' => 'required' , 
        'email' => 'required|email' , 
        'phone' => 'required' , 
        'message' => 'required' , 
    ];

    public function send() {
        $this->validate();
        $this->alert('success', 'تم استقابل رسالت بنجاح و سف يتم التواصل معك');
        $this->message = null;
        $this->name = null;
        $this->email = null;
        $this->phone = null;
        $data = [
            'name' => $this->name , 
            'phone' => $this->phone , 
            'email' => $this->email , 
            'message' => $this->message , 

        ];
        // Mail::to('ahmedsamigeek@gmail.com')->send(new ContactUsMail($data));
    }


    public function render()
    {
        return view('livewire.site.contact-us');
    }
}

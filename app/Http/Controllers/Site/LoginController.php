<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Site\LoginRequest;
use App\Models\User;
use Hash;
class LoginController extends Controller
{
    
    /**
     * Show the form for creating a new resource.
     */
    public function login_form()
    {
        return view('site.login');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function login(LoginRequest $request)
    {
        $user = new User;
        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->is_active = 1;
        $user->is_admin = 0;
        $user->save();

        Auth::login($user);

        return view('site.profile');
    }
}

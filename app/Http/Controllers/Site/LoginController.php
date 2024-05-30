<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Site\LoginRequest;
use App\Models\User;
use Hash;
use Auth;
class LoginController extends Controller
{
    
    /**
     * Show the form for creating a new resource.
     */
    public function form()
    {
        return view('site.login');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function login(LoginRequest $request)
    {
        $credentials = $request->only('password' , 'email' );

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect(route('index'))->with('success' , 'Login success' );
        }

        return back()->with('error' , 'credentials are not valid' );
    }
}

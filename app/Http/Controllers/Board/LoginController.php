<?php

namespace App\Http\Controllers\Board;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Board\LoginRequest;
use Auth;
class LoginController extends Controller
{
    public function form()
    {
        return view('board.login');
    }


    public function login(LoginRequest $request)
    {
        $credentials = $request->only('password' , 'email' );

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect(route('board.index'))->with('success' , 'تم تسجيل الدخول بنجاح' );
        }

        return back()->with('error' , 'بيانات الدخول غير صحيحه' );
    }
}

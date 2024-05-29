<?php

namespace App\Http\Controllers\Board;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Hash;
use App\Models\User;
use App\Models\Area;
use App\Models\Room;


use App\Http\Requests\Board\UpdateProfileRequest;
use App\Http\Requests\Board\UpdatePasswordRequest;
class BoardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       
        $areas_count = Area::count();
        $rooms_count = Room::count();
        $admins_count = User::count();
        
        return view('board.index' , compact( 'rooms_count' ,  'areas_count' , 'admins_count'));
    }

    public function logout() {
        Auth::logout();
        return redirect(url('/'));
    }


    public function show_profile() {

        $user = Auth::user();
        return view('board.profile' , compact('user'));
    }


    public function update_profile(UpdateProfileRequest $request)
    {
        $user = Auth::user();
        if ($request->hasFile('image')) {
            $user->image = basename($request->file('image')->store('users'));
        }
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

        return redirect()->back()->with('success' , 'تم تعديل الملف الشخصى بنجاح' );
    }


    public function show_password() {
        return view('board.password');
    }


    public function update_password(UpdatePasswordRequest $request)
    {
        if (!Hash::check($request->current_password, Auth::user()->password )) {
            return back()->with('error' , 'كلمه المرور الحالهي غير صحيحه لا يمكن تعديل كلمه المرور' );
        }

        $user = Auth::user();
        $user->password = Hash::make($request->password);
        $user->save();
        return back()->with('success' , 'تم تعديل كلمه المرور بنجاح' );
    }




}

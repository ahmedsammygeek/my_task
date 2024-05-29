<?php

namespace App\Http\Controllers\Board;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Board\Users\StoreUserRequest;
use App\Http\Requests\Board\Users\UpdateUserRequest;
use Auth;
use Hash;
use App\Models\User;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('board.users.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('board.users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->is_active = $request->filled('active') ? 1 : 0;
        $user->user_id = Auth::id();
        $user->save();
        return redirect(route('board.users.index'))->with('success' , 'تم إضافه المستخدم بنجاح' );
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        $user->load('user');
        return view('board.users.show' , compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('board.users.edit' , compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        $user->name = $request->name;
        $user->email = $request->email;
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }
        $user->is_active = $request->filled('active') ? 1 : 0;
        $user->save();
        return redirect(route('board.users.index'))->with('success' , 'تم تعديل المستخدم بنجاح' );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

<?php

namespace App\Http\Controllers\Board;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use Hash;
use App\Http\Requests\Board\Admins\StoreAdminRequest;
use App\Http\Requests\Board\Admins\UpdateAdminRequest;

use Spatie\Permission\Models\Permission;
class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('board.admins.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $permissions = Permission::get();
        return view('board.admins.create' , compact('permissions') );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAdminRequest $request)
    {
        $admin = new User;
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->password = Hash::make($request->password);
        $admin->is_active = $request->filled('active') ? 1 : 0;
        $admin->is_admin = 1;
        $admin->user_id = Auth::id();
        $admin->save();

        $admin->syncPermissions($request->permissions);

        return redirect(route('board.admins.index'))->with('success' , 'Admin Added successfully' );
    }

    /**
     * Display the specified resource.
     */
    public function show(User $admin)
    {
        $admin->load('user' , 'permissions' );
        return view('board.admins.show' , compact('admin'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $admin)
    {
        $user_permissions = $admin->permissions()->pluck('name')->toArray();
        $permissions = Permission::get();
        return view('board.admins.edit' , compact('admin' , 'permissions' , 'user_permissions' ));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAdminRequest $request, User $admin)
    {
        $admin->name = $request->name;
        $admin->email = $request->email;
        if ($request->filled('password')) {
            $admin->password = Hash::make($request->password);
        }
        $admin->is_active = $request->filled('active') ? 1 : 0;
        $admin->save();
        $admin->syncPermissions($request->permissions);

        return redirect(route('board.admins.index'))->with('success' , 'تم تعديل المستخدم بنجاح' );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

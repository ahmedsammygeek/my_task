<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Api\RegisterRequest;
use Auth;
use Hash;
use App\Models\User;
use App\Http\Resources\Api\UserResource;
class RegisterController extends Controller
{


    /**
     * Store a newly created resource in storage.
     */
    public function register(RegisterRequest $request)
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
    

        return response()->json([
            'data' => [
                'token' => $user->createToken('api token')->plainTextToken , 
                'user' => new UserResource($user) , 
            ] , 
            'message' => 'register successfully' , 
            'errors' => [] , 
            'status' => 'success' , 
        ] , 200);
    }


}

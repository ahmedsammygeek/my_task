<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Api\LoginRequest;
use App\Models\User;
use Hash;
use App\Http\Resources\Api\UserResource;
class LoginController extends Controller
{


    public function login(LoginRequest $request)
    {

        $user = User::where('email', $request->email)->first();

        if (! $user || ! Hash::check($request->password, $user->password)) {

            return response()->json([
                'data' => [] , 
                'message' => 'The provided credentials are incorrect.' , 
                'errors' => [] , 
                'status' => 'error' , 
            ] , 403);

        }

        

        return response()->json([
            'data' => [
                'token' => $user->createToken('api token')->plainTextToken , 
                  'user' => new UserResource($user) , 
            ] , 
            'message' => 'login successfully' , 
            'errors' => [] , 
            'status' => 'success' , 
        ] , 200);

    }


}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Tymon\JWTAuth\Exceptions\JWTException;
use JWTAuth;

class UserApiController extends Controller
{
    //

    public function signup(Request $request){


    	$this->validate($request, [
    		'name' => 'required',
    		'email' => 'required|email|unique:users',
    		'password' => 'required'
    	]);

    	$user = User::create([
    		'name' => $request->name,
    		'email' => $request->email,
    		'password' => bcrypt($request->password)
    	]);

    	return response()->json([
    		'message' => 'Successfully created user'
    	], 201);
    }

    public function signin(Request $request){
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required'
        ]);
        $cred = $request->only(['email', 'password']);

        try{
            if(!$token = JWTAuth::attempt($cred)){
                return response()->json([
                    'error' => 'invalid credentials'
                ], 401);
            }
        }catch(JwtException $e){
            return response()->json([
                'error' => 'fuck of'
            ], 500);
        }

        return response()->json([
            'token' => $token
        ], 200);
    }
}

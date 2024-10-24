<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ApiAuthController extends Controller
{
    public function register(Request $request){
        $validator = Validator::make($request->all(), [
            "name" => "required|string",
            "email" => "required|string",
            "password" => "required|string|confirmed",
        ]);
        // check errors
        if($validator->fails()){
            return response()->json([
                "error" => $validator->errors(),
            ], 301);
        }
        // password hash
        $password = bcrypt($request->password);

        // generate access token
        $access_token = Str::random(72);

        // create
        User::create([
            "name" => $request->name,
            "email" => $request->email,
            "password" => $password,
            "access_token" => $access_token,
        ]);
        // msg
        return response()->json([
            "msg" => "user created successfully",
            "access_token" => $access_token
        ], 201);
    }
    public function login(Request $request){
        $validator = Validator::make($request->all(),[
            "email" => "required|email",
            "password" => "required|string",
        ]);

        // check errors
        if($validator->fails()){
            return response()->json([
                "error" => $validator->errors(),
            ], 301);
        }

        // check email
        $user = User::where("email", $request->email)->first();
        if ($user) {
            // check password
            $isValid = Hash::check($request->password, $user->password);
            $access_token = Str::random(72);
            if ($isValid) {
                $user->update([
                    "access_token" => $access_token,
                ]);
                return response()->json([
                    "msg" => "login successful",
                    "access_token" => $access_token,
                ], 201);
            } else {
                return response()->json([
                    "msg" => "credentials not correct",
                ], 404);
            }
            
        } else {
            return response()->json([
                "msg" => "credentials not correct",
            ], 404);
        }
        
    }

    public function logout(Request $request){
        $access_token = $request->header('access_token');

        if ($access_token != null){
            $user = User::where("access_token", $access_token)->first();
            if($user){
                $user->update([
                    "access_token" => null,
                ]);
                return response()->json([
                    "msg" => "logout successfully",
                ], 201);
            }else{
                return response()->json([
                    "msg" => "access token not correct",
                ], 404);
            }
        }else{
            return response()->json([
                "msg" => "access token not found",
            ], 404);
        }
    }
}

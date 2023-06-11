<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Facades\Validator;

class ApiController extends Controller
{
    public function login(Request $request)
    {
        $inputs = $request->only("email", "password");
        $jwt_token = JWTAuth::attempt($inputs);

        if($jwt_token) {
            return response()->json([
                "condition" => true,
                "msg" => "Success Login",
                "token" => $jwt_token
            ]);
        } else {
            return response()->json([
                "condition" => false,
                "msg" => "Credentials error",
            ]);
        }
    }

    public function me()
    {
        return response()->json([
            "condition" => "true",
            "msg" => "Login success",
            "user" => auth()->user()
        ]);
    }

    public function register(Request $request)
    {
        $validate = Validator::make($request->all(), [
            "name" => "required",
            "email" => "required|email",
            "phone" => "required|digits_between:7,11",
            "password" => "required",
            "password2" => "required|same:password"
        ]);
        
        if($validate->fails()) {
            return response()->json([
                "condition" => false,
                "msg" => "Fail",
            ]);


        }

    }
}

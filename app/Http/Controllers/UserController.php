<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserLoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function login(UserLoginRequest $request)
    {

        $phone = $request->phone;
        $password = $request->password;

        $user = User::where("phone", $phone)->first();

        if($user) {

            if(Hash::check($password, $user->password)) {

                Auth::login($user);

                return redirect()->route('admin.home')->with("success", "Welcome $user->name nice to see you again!");

            } else {

                return redirect()->back()->with("error", "Credentials error");
            }

        } else {

            return redirect()->back()->with("error", "Credentials error");

        }

    }


    public function logout()
    {
        Auth::logout();
        return redirect()->route('admins.login');
    }
}

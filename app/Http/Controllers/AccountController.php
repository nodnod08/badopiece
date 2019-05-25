<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\User;
use DB;

class AccountController extends Controller
{

    public function login(Request $request) {

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            // Authentication passed...
            return "ok";
        } else {
            return "not ok";
        }
    }

    protected function create(Request $request)
    {
        return User::create([
            'name' => $request->firstname.' '.$request->lastname,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
    }

}

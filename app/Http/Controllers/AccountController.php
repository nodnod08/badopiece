<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
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

    public function checkEmail(Request $request) {

        $user = User::where('email', $request->email)->get()->count();

        if($user != 0) {
            return "already";
        } else {
            return "available";
        }
    }

    protected function create(Request $request)
    {
        $client = new Client();
        $response = $client->post('https://www.google.com/recaptcha/api/siteverify', [
                        'form_params' => array(
                            'secret' => '6LdV0qwUAAAAAOdCkOmmo_hX80fW3zvtdeCFTrQq',
                            'response' => $request->input('token')
                        )
                    ]);
        $result = json_decode($response->getBody()->getContents());

        if($result->success) {
            User::create([
                'name' => $request->firstname.' '.$request->lastname,
                'firstname' => $request->firstname,
                'lastname' => $request->lastname,
                'username' => $request->username,
                'user_type' => 'user',
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);
            return 'success';
        } else {
            return 'recaptcha-error';
        }
    }

    protected function addUser(Request $request)
    {
        
            $user = User::create([
                'name' => 'Administrator',
                'firstname' => $request->firstname,
                'lastname' => $request->lastname,
                'username' => $request->username,
                'user_type' => 'admin',
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);
            return $user;
    }

    public function updatePassword(Request $request) {
        if(!Hash::check($request->opassword, Auth::user()->password)) {
            return 0;
        } else {
            $newPass = Hash::make($request->npassword);
            User::where('id', Auth::user()->id)
                ->update(['password' => $newPass]);
            
            return 1;    
        }
    }

    public function admin_attempt(Request $request) {
        if (Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
            // Authentication passed...
            return 1;
        } else {
            return 0;
        }
    }
}

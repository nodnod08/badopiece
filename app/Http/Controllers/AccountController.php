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
                'username' => $request->username,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);
            return 'success';
        } else {
            return 'recaptcha-error';
        }
    }

}

<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail;
use App\Notifications\NewInquiry;
use Illuminate\Support\Facades\Notification;
use App\Mail\NewInquire;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use App\Subscribes;
use App\User;

class SubscribeController extends Controller
{
    public function inquire(Request $request) {

        $client = new Client();
        $response = $client->post('https://www.google.com/recaptcha/api/siteverify', [
                        'form_params' => array(
                            'secret' => '6LdV0qwUAAAAAOdCkOmmo_hX80fW3zvtdeCFTrQq',
                            'response' => $request->input('token')
                        )
                    ]);
        $result = json_decode($response->getBody()->getContents());

        if($result->success) {
            $inquire = new Subscribes;

            $inquire->fullname = $request->fullname;
            $inquire->email = $request->email;
            $inquire->message = $request->message;
            $inquire->save();

            Mail::send(new NewInquire($inquire));
            $admins = User::where('user_type', 'admin')->get();
            Notification::send($admins, new NewInquiry($inquire));
            return "ok";
        } else {
            return 'recaptcha-error';
        }
    }

}

<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail;
use App\Mail\NewInquire;
use Illuminate\Http\Request;
use App\Subscribes;

class SubscribeController extends Controller
{
    public function inquire(Request $request) {
        $inquire = new Subscribes;

        $inquire->fullname = $request->fullname;
        $inquire->email = $request->email;
        $inquire->message = $request->message;
        $inquire->save();

        Mail::send(new NewInquire($inquire));

        return "ok";
    }
}

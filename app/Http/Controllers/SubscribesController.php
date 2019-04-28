<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Subscribes;

class SubscribeController extends Controller
{
    public function subscribe(Request $request) {
        $subscribe = new Subscribes;

        $subscribe->email = $request->email;
        $subscribe->save();

        return $subscribe;
    }
}

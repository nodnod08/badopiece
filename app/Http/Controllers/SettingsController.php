<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Settings;

class SettingsController extends Controller
{
    public function getLogo() {
        $logo = Settings::where('id', 1)->get();
        return $logo;
    }
}

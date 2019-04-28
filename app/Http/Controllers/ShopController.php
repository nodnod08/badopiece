<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Printers;
use App\Cartridges;
use DB;

class ShopController extends Controller
{
    public function printers() {
        return view('shop');
    }

    public function showPrinter($id) {
        $app = [
            'type' => 'printers',
            'id' => $id
        ];
        return view('view')->with('content', $app);
    }

    public function getPrinters($search) {
        if($search == 'default') {
            $printers = DB::table('printers')->paginate(9);
        } else {
            $printers = DB::table('printers')
                        ->where('printer_type', 'like', '%'.$search.'%')    
                        ->orWhere('printer_type', 'like', '%'.$search.'%')    
                        ->orWhere('printer_name', 'like', '%'.$search.'%')    
                        ->paginate(9);
        }

        return $printers;
    }

    public function cartridges() {
        return view('shop');
    }

    public function showCartridge($id) {
        $app = [
            'type' => 'cartridges',
            'id' => $id
        ];
        return view('view')->with('content', $app);
    }

    public function getCartridges($search) {
        if($search == 'default') {
            $printers = DB::table('cartridges')->paginate(9);
        } else {
            $printers = DB::table('cartridges')
                        ->where('cartridge_type', 'like', '%'.$search.'%')    
                        ->orWhere('cartridge_color', 'like', '%'.$search.'%')    
                        ->orWhere('cartridge_name', 'like', '%'.$search.'%')    
                        ->paginate(9);
        }

        return $printers;
    }

    public function getItems($type, $id) {
        $item = DB::table($type)->where('id', $id)->get();

        return $item;
    }
}

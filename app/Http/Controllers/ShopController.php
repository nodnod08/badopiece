<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\User;
use DB;

class ShopController extends Controller
{
    public function products() {
        return view('shop');
    }

    public function showProducts($id) {
        $app = [
            'type' => 'products',
            'id' => $id
        ];
        return view('view')->with('content', $app);
    }

    public function getProducts($search) {
        if($search == 'default') {
            $products = DB::table('products')->paginate(9);
        } else {
            $products = DB::table('products')
                        ->where('product_name', 'like', '%'.$search.'%')    
                        ->orWhere('product_category', 'like', '%'.$search.'%')    
                        ->paginate(9);
        }

        return $products;
    }

    public function getItems($type, $id) {
        $item = DB::table($type)->where('product_id', $id)->get();

        return $item;
    }
    
}

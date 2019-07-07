<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Darryldecode\Cart\Cart;
use App\User;
use App\Products;
use DB;

class CartController extends Controller
{
    public function add(Request $request) {
        $item = Products::where('product_id', $request->id)
            ->first();   

        $check = \Cart::get($request->id);    
        
        if(empty($check)) {
            \Cart::add(array(
                'id' => $item->product_id,
                'name' => $item->product_name.'-'.$item->product_code,
                'price' => $item->product_price,
                'quantity' => 1,
                'attributes' => array(
                    'photo' => $item->product_photo
                 )
            ));
        } else {
            return 'already';
        }

        return \Cart::getContent()->count();

    }

    public function countCart() {
        return \Cart::getContent()->count();
    }
}

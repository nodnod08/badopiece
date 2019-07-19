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
                'name' => $item->product_name,
                'price' => $item->product_price,
                'quantity' => 1,
                'attributes' => array(
                    'photo' => $item->product_photo,
                    'description' => $item->product_desc,
                    'stocks' => $item->product_stocks,
                    'code' => $item->product_code,
                 )
            ));
        } else {
            return 'already';
        }

        return \Cart::getContent()->count();

    }

    public function updateCart(Request $request) {
        \Cart::update($request->id, array(
            'quantity' => array(
                'relative' => false,
                'value' => $request->count
            ),
        ));

        return "updated";
    }

    public function countCart() {
        return \Cart::getContent()->count();
    }

    public function removeItem(Request $request) {
        \Cart::remove($request->id);

        return "removed";
    }

    public function getSubtotal() {
        return \Cart::getSubTotal();
    }

    public function getCartContent() {
        return \Cart::getContent();
    }

    public function index() {
        return view('cart');
    }

    public function billing() {

        $data['count'] = \Cart::getContent()->count();
        $data['subTotal'] =  \Cart::getSubTotal();
        $data['Total'] =  \Cart::getTotal();

        return view('billing')->with('data', $data);
    }
}

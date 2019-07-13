<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\User;
use App\Products;
use App\Categories;
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
            $products = Products::where('product_stocks', '!=', 0)->with('category')->paginate(9);
        } else {
            $products = Products::
                        where('product_name', 'like', '%'.$search.'%')    
                        ->orWhere('product_category', 'like', '%'.$search.'%')    
                        ->with('category')
                        ->paginate(9);
        }

        return $products;
    }

    public function getItems($type, $id) {
        $item = Products::where('product_id', $id)->with('category')->get();

        return $item;
    }
    
}

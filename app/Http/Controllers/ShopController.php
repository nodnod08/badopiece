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

    public function getProducts() {
        $products = Products::where('product_stocks', '!=', 0)
                            ->orderBy('created_at', 'DESC')
                            ->with('category')->paginate(9);

        return $products;
    }

    public function getProductsFilter($from, $to, $category) {
        if($category == 'all') {
            $products = Products::whereBetween('product_price',[$from, $to])
                            ->where('product_stocks', '!=', 0)
                            ->with('category')
                            ->orderBy('created_at', 'DESC')
                            ->paginate(9);
        } else {
            $products = Products::whereBetween('product_price',[$from, $to])
                            ->where('product_category', $category)
                            ->where('product_stocks', '!=', 0)
                            ->with('category')
                            ->orderBy('created_at', 'DESC')
                            ->paginate(9);
        }

        return $products;
    }

    public function getItems($type, $id) {
        $item = Products::where('product_id', $id)->with('category')->get();

        return $item;
    }

    public function getCategories() {
        $categories = Categories::all();

        return $categories;
    }

    public function passBill() {
        redirect('/');
    }
    
}

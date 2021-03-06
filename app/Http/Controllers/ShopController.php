<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Notifications\NewComment;
use Illuminate\Support\Facades\Notification;
use Illuminate\Http\Request;
use App\User;
use App\Products;
use App\Categories;
use App\Feedbacks;
use DB;

class ShopController extends Controller
{
    public function products() {
        return view('shop');
    }

    public function feedback(Request $request) {
        $feedback = Feedbacks::create([
            'transaction_id' => $request->transaction_id,
            'product_id' => $request->product_id,
            'item_name' => $request->item_name,
            'item_code' => $request->item_code,
            'item_photo' => $request->item_photo,
            'name' => $request->name,
            'feedback' => $request->feedback,
            'rate' => $request->rating,
        ]);
        $admins = User::where('user_type', 'admin')->get();
        Notification::send($admins, new NewComment($feedback));

        return $feedback;
    }

    public function showProducts($id) {
        $app = [
            'type' => 'products',
            'id' => $id
        ];
        return view('view')->with('content', $app);
    }

    public function getProducts() {
        $products = Products::where('product_stocks', '>', 0)
                            ->orderBy('created_at', 'DESC')
                            ->with('category')->paginate(9);

        return $products;
    }

    public function getProductsFilter($from, $to, $category) {
        if($category == 'all') {
            $products = Products::whereBetween('product_price',[$from, $to])
                            ->where('product_stocks', '>', 0)
                            ->with('category')
                            ->orderBy('created_at', 'DESC')
                            ->paginate(9);
        } else {
            $products = Products::whereBetween('product_price',[$from, $to])
                            ->where('product_category', $category)
                            ->where('product_stocks', '>', 0)
                            ->with('category')
                            ->orderBy('created_at', 'DESC')
                            ->paginate(9);
        }

        return $products;
    }

    public function getItems($type, $id) {
        $item = Products::where('product_id', $id)->with('category')->get();
        $feedbacks = Feedbacks::where('product_id', $item[0]->product_id)->get();

        return [$item, $feedbacks];
    }

    // public function getItems($type, $id) {
    //     $item = Products::join('feedback', 'products.product_id', '=', 'feedback.item_id')
    //                     ->join('category', 'products.product_category', '=', 'category.id')
    //                     ->select('category.*', 'products.*', 'feedback.*')
    //                     ->where('products.product_id', $id)
    //                     ->get();

    //     return $item;
    // }

    public function getCategories() {
        $categories = Categories::all();

        return $categories;
    }

    public function passBill() {
        redirect('/');
    }
    
}

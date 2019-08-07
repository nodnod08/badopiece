<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Carbon;
use App\Products;
use App\Categories;
use App\Items;
use DB;

class InventoryController extends Controller
{
    public function getInventories($year, $from, $to)
    {
        // ($month == "current")? $month = 'current' : $month;
        // ($month == "current")? $counter = 12 : $counter = 0;

        // ($month == 'current')? $number_of_days = Carbon::now()->daysInMonth : $number_of_days = Carbon::parse($year.'-'.$month.'-01')->daysInMonth;
        $from = $from.' 00:00:00';
        $to = $to.' 23:59:59';
        $labels = [];
        $month = 0;
        $datas = [];
        $data = [];
        $data_quantity = [];
        $inventories = Products::join('category', 'products.product_category', '=', 'category.id')
                                ->select(
                                    'category.*',
                                    'products.product_stocks',
                                    'products.product_category',
                                    'products.product_id',
                                    DB::raw('SUM(products.product_stocks) stocks'),
                                    DB::raw('DAY(products.created_at) day'),
                                    'products.created_at'
                                    )
                                ->whereBetween('products.created_at', [$from, $to])
                                ->orderBy('products.created_at')
                                ->groupBy(['day', 'products.product_category'])
                                ->get();

        foreach ($inventories as $key => $value) {
            $datas = [
                'category' => $value->category,
                'quantity' => (int)$value->stocks,
                'date' => ($from == 'not day' && $to == 'not day') ? Carbon::parse($value->created_at)->englishMonth : Carbon::parse($value->created_at)->englishMonth.' '.Carbon::parse($value->created_at)->day.', '.Carbon::parse($value->created_at)->year.' '.Carbon::parse($value->created_at)->englishDayOfWeek,
            ];
            array_push($data, $datas);
            array_push($labels, "".($from == 'not day' && $to == 'not day') ? Carbon::parse($value->created_at)->englishMonth : Carbon::parse($value->created_at)->englishMonth.' '.Carbon::parse($value->created_at)->day.', '.Carbon::parse($value->created_at)->year.' '.Carbon::parse($value->created_at)->englishDayOfWeek."");
        }
        array_push($data, $labels);    
        return $data;
    }

    public function getInventoriesItem($year, $from, $to)
    {
        // ($month == "current")? $month = 'current' : $month;
        // ($month == "current")? $counter = 12 : $counter = 0;

        // ($month == 'current')? $number_of_days = Carbon::now()->daysInMonth : $number_of_days = Carbon::parse($year.'-'.$month.'-01')->daysInMonth;
        $from = $from.' 00:00:00';
        $to = $to.' 23:59:59';
        $labels = [];
        $month = 0;
        $datas = [];
        $data = [];
        $data_quantity = [];
        $inventories = Items::with('product.category')
                                ->select(
                                    'category.*',
                                    'items.*',
                                    'products.product_stocks',
                                    'products.product_category',
                                    'products.product_id',
                                    DB::raw('SUM(items.product_quantity) stocks'),
                                    DB::raw('DAY(items.created_at) day'),
                                    'items.created_at'
                                    )
                                ->whereBetween('items.created_at', [$from, $to])
                                ->orderBy('items.created_at')
                                ->groupBy(['day', 'products.product_category'])
                                ->get();

        foreach ($inventories as $key => $value) {
            $datas = [
                'category' => $value->category,
                'quantity' => (int)$value->stocks,
                'date' => ($from == 'not day' && $to == 'not day') ? Carbon::parse($value->created_at)->englishMonth : Carbon::parse($value->created_at)->englishMonth.' '.Carbon::parse($value->created_at)->day.', '.Carbon::parse($value->created_at)->year.' '.Carbon::parse($value->created_at)->englishDayOfWeek,
            ];
            array_push($data, $datas);
            array_push($labels, "".($from == 'not day' && $to == 'not day') ? Carbon::parse($value->created_at)->englishMonth : Carbon::parse($value->created_at)->englishMonth.' '.Carbon::parse($value->created_at)->day.', '.Carbon::parse($value->created_at)->year.' '.Carbon::parse($value->created_at)->englishDayOfWeek."");
        }
        array_push($data, $labels);    
        return $data;
    }

    public function getCategories() {
        $categories = Categories::all();
        
        return $categories;
    }

    public function addItem(Request $request) {
        $filenameWithExtension = $request->image->getClientOriginalName();
        $filename = pathinfo($filenameWithExtension, PATHINFO_FILENAME);
        $extension = $request->image->getClientOriginalExtension();
        $filenameToStore = $filename.'_'.time().'.'.$extension;
        $path = $request->image->storeAs('public/img/offer-img', $filenameToStore);

        $product = Products::create([
            'product_photo' => $filenameToStore,
            'product_name' => $request->name,
            'product_code' => $request->code,
            'product_price' => $request->price,
            'product_price_previous' => $request->price,
            'product_size' => '1',
            'product_category' => $request->category,
            'product_stocks' => $request->quantity,
            'product_desc' => $request->description,
            'product_date' => Carbon::now(),
        ]);    
        
        return $product;
    }

    public function addCategory(Request $request) {
        $category = Categories::create([
            'category' => $request->category,
        ]); 

        return $category;
    }

    public function getAllItems() {
        $inventories = Products::where('product_stocks','!=', null)
                                ->with('category')
                                ->get();


        $inventories = collect($inventories->groupBy('category.category'));

        return $inventories;

    }

    public function updateItem(Request $request) {
        if ($request->hasFile('image')) {
            $filenameWithExtension = $request->image->getClientOriginalName();
            $filename = pathinfo($filenameWithExtension, PATHINFO_FILENAME);
            $extension = $request->image->getClientOriginalExtension();
            $filenameToStore = $filename.'_'.time().'.'.$extension;
            $path = $request->image->storeAs('public/img/offer-img', $filenameToStore);

            $product = Products::where('product_id', $request->id)
                            ->update([
                                'product_photo' => $filenameToStore,
                                'product_name' => $request->name,
                                'product_code' => $request->code,
                                'product_price' => $request->price,
                                'product_price_previous' => $request->price,
                                'product_size' => '1',
                                'product_category' => $request->category,
                                'product_stocks' => $request->quantity,
                                'product_desc' => $request->description,
                                'product_date' => Carbon::now(),
                            ]);    
        } else {
            $product = Products::where('product_id', $request->id)
                            ->update([
                                'product_name' => $request->name,
                                'product_code' => $request->code,
                                'product_price' => $request->price,
                                'product_price_previous' => $request->price,
                                'product_size' => '1',
                                'product_category' => $request->category,
                                'product_stocks' => $request->quantity,
                                'product_desc' => $request->description,
                                'product_date' => Carbon::now(),
                            ]);    
        }

        
        return $product;
    }

    public function defaultPrice(Request $request) {
        $category = Categories::where('category', $request->category)->get();
        
        foreach ($category as $key => $value) {
            $inventory = Products::where('product_category', $value->id)
                                   ->update([
                                       'product_price' => $request->price
                                   ]);
            return $inventory;                       
        }
    }

    public function getDress() {
        return Products::where('product_category', 43)->get()->count();
    }

    public function getPolo() {
        return Products::where('product_category', 48)->get()->count();
    }

    public function getShort() {
        return Products::where('product_category', 46)->get()->count();
    }

    public function getShoes() {
        return Products::where('product_category', 44)->get()->count();
    }

    public function getJackets() {
        return Products::where('product_category', 49)->get()->count();
    }

    public function getBags() {
        return Products::where('product_category', 45)->get()->count();
    }

    public function remove(Request $request) {
        $inventory = Products::where('product_id', $request->id)->delete();

        return $inventory;
    }
}

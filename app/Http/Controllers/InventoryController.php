<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Carbon;
use App\Products;
use DB;

class InventoryController extends Controller
{
    public function getInventories()
    {
        // ($month == "current")? $month = 'current' : $month;
        // ($month == "current")? $counter = 12 : $counter = 0;

        // ($month == 'current')? $number_of_days = Carbon::now()->daysInMonth : $number_of_days = Carbon::parse($year.'-'.$month.'-01')->daysInMonth;
        // $from = $from.' 00:00:00';
        // $to = $to.' 23:59:59';
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
                                    DB::raw('SUM(products.product_stocks) stocks')
                                    )
                                // ->whereBetween('products.created_at', [$from, $to])
                                ->groupBy(['products.product_category'])
                                ->get();
        // $vendors = $inventories->unique('details.vendor')->get('details.vendor', 'quantity');

        // return $inventories;
        foreach ($inventories as $key => $value) {
            $datas = [
                'category' => $value->category,
                'quantity' => (int)$value->stocks,
                // 'date' => ($from == 'not day' && $to == 'not day') ? Carbon::parse($value->created_at)->englishMonth : Carbon::parse($value->created_at)->englishMonth.' '.Carbon::parse($value->created_at)->day.', '.Carbon::parse($value->created_at)->year.' '.Carbon::parse($value->created_at)->englishDayOfWeek,
            ];
            array_push($data, $datas);
            array_push($labels, $value->category);
        }
        array_push($data, $labels);    
        return $data;
    }
}

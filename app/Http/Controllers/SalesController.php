<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Carbon;
use App\Transactions;
use DB;

class SalesController extends Controller
{
    public function monthPaids() {
        $month = (Carbon::now()->month > 10) ? Carbon::now()->month : '0'.Carbon::now()->month;
        $date = Carbon::now()->year.'-'.$month;
        $transactions = Transactions::where('payment_status_id', 1)
                                    ->select(
                                        DB::raw('SUM(amount) as amount')
                                            )
                                      ->where('created_at', 'like', '%'.$date.'%')
                                      ->get();
        return $transactions;                              
    }

    public function getYear() {
        $date = Carbon::now()->year;
        $transactions = Transactions::select(
                                        DB::raw('SUM(amount) as amount')
                                            )
                                      ->where('created_at', 'like', '%'.$date.'%')
                                      ->get();
        return $transactions;                              
    }

    public function monthSales() {
        $month = (Carbon::now()->month > 10) ? Carbon::now()->month : '0'.Carbon::now()->month;
        $date = Carbon::now()->year.'-'.$month;
        $transactions = Transactions::select(
                                        DB::raw('SUM(amount) as amount')
                                            )
                                      ->where('created_at', 'like', '%'.$date.'%')
                                      ->get();
        return $transactions;                              
    }
}

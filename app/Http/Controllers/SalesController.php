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

    public function getData($year, $from, $to) {

        $labels = [];
        $data = [];
        $dataContent = [];
        
        if($from == 'not day' && $to == 'not day') {
            $sales = Transactions::join('statuses', 'transactions.transaction_status_id', '=', 'statuses.id')
                                ->select
                                (
                                    'statuses.*',
                                    'transactions.payment_status_id',
                                    DB::raw('SUM(transactions.amount) total_price'),
                                    DB::raw('MONTH(transactions.created_at) month'),
                                    'transactions.transaction_status_id',
                                    'transactions.created_at'
                                )
                                ->where('transactions.created_at','like','%'.$year.'%')
                                ->orderBy('transactions.created_at')
                                ->groupBy(['month', 'transactions.transaction_status_id', 'transactions.payment_status_id'])
                                ->get();
        } else {
            $from = $from.' 00:00:00';
            $to = $to.' 23:59:59';
            $sales = Transactions::join('statuses', 'transactions.transaction_status_id', '=', 'statuses.id')
                                ->select
                                (
                                    'statuses.*',
                                    'transactions.payment_status_id',
                                    DB::raw('SUM(transactions.amount) total_price'),
                                    DB::raw('DAY(transactions.created_at) day'),
                                    'transactions.transaction_status_id',
                                    'transactions.created_at'
                                )
                                ->whereBetween('transactions.created_at',[$from, $to])
                                ->orderBy('transactions.created_at')
                                ->groupBy(['day', 'transactions.transaction_status_id', 'transactions.payment_status_id'])
                                ->get();
        }   
        
        foreach ($sales as $key => $value) {
            $name = "";
            if($value->transaction_status_id == 1 || $value->transaction_status_id == 2) {
                $name = 'Unfulfilled';
            } else {
                if($value->payment_status_id == 1) {
                    $name = 'Fulfilled';
                } else {
                    $name = 'Unfulfilled';
                }
            }
        
            $dataContent = [
                'total_price' => (int)$value->total_price,
                'date' => ($from == 'not day' && $to == 'not day') ? Carbon::parse($value->created_at)->englishMonth : Carbon::parse($value->created_at)->englishMonth.' '.Carbon::parse($value->created_at)->day.', '.Carbon::parse($value->created_at)->year.' '.Carbon::parse($value->created_at)->englishDayOfWeek,
                'payment_status' => $value->payment_status_id,
                'name' => $name,
            ];
            array_push($data, $dataContent);
            array_push($labels, "".($from == 'not day' && $to == 'not day') ? Carbon::parse($value->created_at)->englishMonth : Carbon::parse($value->created_at)->englishMonth.' '.Carbon::parse($value->created_at)->day.', '.Carbon::parse($value->created_at)->year.' '.Carbon::parse($value->created_at)->englishDayOfWeek."");
        }            

        array_push($data, $labels);    
        
        return $data;  
    }

}

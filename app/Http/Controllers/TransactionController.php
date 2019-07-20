<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Darryldecode\Cart\Cart;
use App\Transactions;
use App\Items;
use App\Shipping_details;

class TransactionController extends Controller
{
    public function transaction($transactionId) {
        $id = $transactionId;

        return view('transaction')->with('id', $transactionId);
    }

    public function getTransaction($transactionId) {
        $id = $transactionId;

        $transaction = Transactions::where('id', $id)
                                    ->with('items', 'shipping', 'customer', 'transaction_type', 'transaction_status', 'payment_status')
                                    ->get();

        return $transaction;                            
    }
}

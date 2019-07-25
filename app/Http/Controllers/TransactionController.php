<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Darryldecode\Cart\Cart;
use App\Transactions;
use App\Transaction_records;
use App\Items;
use App\Shipping_details;

class TransactionController extends Controller
{
    public function transaction($transactionId) {
        $id = $transactionId;

        return view('transaction')->with('id', $transactionId);
    }

    public function checkNew($id) {

        $record = Transaction_records::where('transaction_id', $id)->get();

        if($record->count() > 0) {
            return "exist";
        } else {
            return "none";
        }
    }

    public function recordTransaction($id) {

        $record = Transaction_records::create([
            'transaction_id' => $id,
        ]);

        if($record) {
            return $record;
        } else {
            return "error";
        }
    }

    public function getTransactions() {
        $transactions = Transactions::where('customer_id', Auth::user()->id)
                                    ->with('items', 'shipping', 'customer', 'transaction_type', 'transaction_status', 'payment_status')
                                    ->paginate(10);

        return $transactions;
    }

    public function getTransaction($transactionId) {
        $id = $transactionId;

        $transaction = Transactions::where('id', $id)
                                    ->with('items', 'shipping', 'customer', 'transaction_type', 'transaction_status', 'payment_status')
                                    ->get();

        return $transaction;                            
    }
}

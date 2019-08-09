<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Darryldecode\Cart\Cart;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendTransaction;
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

    public function perTransactionView($transactionId) {
        $id = $transactionId;

        return view('admin.perTransaction')->with('id', $transactionId);
    }

    public function sendTransaction(Request $request) {
        $transaction['email'] = $request->email;
        $transaction['data'] = $request->data;
        Mail::send(new sendTransaction($transaction));

        // return $transaction['data'];
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
                                    ->orderBy('created_at', 'DESC')
                                    ->paginate(10);

        return $transactions;
    }

    public function getOverAllTransactions() {
        $transactions = Transactions::with('items', 'shipping', 'customer', 'transaction_type', 'transaction_status', 'payment_status')
                                    ->orderBy('created_at', 'DESC')
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

    public function perTransaction($transactionId) {
        $id = $transactionId;

        $transaction = Transactions::where('id', $id)
                                    ->with('items', 'shipping', 'customer', 'transaction_type', 'transaction_status', 'payment_status')
                                    ->get();

        return $transaction;                            
    }
}

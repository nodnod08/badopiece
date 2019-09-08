<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Darryldecode\Cart\Cart;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendTransaction;
use App\Transactions;
use App\Subscribes;
use App\Feedbacks;
use App\Transaction_records;
use App\Items;
use App\Shipping_details;
use App\Notifications;
use App\Events\UpdateStatus;
use Illuminate\Support\Carbon;

class TransactionController extends Controller
{
    public function transaction($transactionId) {
        $id = $transactionId;

        return view('transaction')->with('id', $transactionId);
    }

    public function viewStatus($transactionId) {
        $id = $transactionId;

        return view('admin.status_portal')->with('id', $transactionId);
    }

    public function status($transactionId) {
        $id = $transactionId;

        return view('status')->with('id', $transactionId);
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

    public function getTransactionInfo($id) {
        $transactions = Transactions::where('id', $id)
                                    ->with('items', 'item_status', 'shipping', 'customer', 'transaction_type', 'transaction_status', 'payment_status')
                                    ->orderBy('created_at', 'DESC')
                                    ->get();

        return $transactions;
    }

    public function getOverAllTransactions() {
        $transactions = Transactions::with('items', 'shipping', 'customer', 'transaction_type', 'transaction_status', 'payment_status')
                                    ->orderBy('created_at', 'DESC')
                                    ->paginate(10);

        return $transactions;
    }

    public function getOverAllTransactionSearch($search) {
        $transactions = Transactions::with('items', 'shipping', 'customer', 'transaction_type', 'transaction_status', 'payment_status')
                                    ->where('transaction_id', 'like', '%'.$search.'%')
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

    public function perFeedback($feedbackId) {
        $id = $feedbackId;

        $feedback = Feedbacks::where('id', $id)->get();

        return $feedback;                            
    }

    public function perFeedbackView($feedbackId) {
        $id = $feedbackId;

        return view('admin.perFeedback')->with('id', $feedbackId);
    }

    public function perTransaction_2($transactionId, $notificationId) {
        Notifications::where('notifiable_id', Auth::user()->id)->where('id', $notificationId)->update(['read_at' => Carbon::now()]);
        $id = $transactionId;

        return view('admin.perTransaction')->with('id', $transactionId);                     
    }

    public function perFeedback_2($feedbackId, $notificationId) {
        Notifications::where('notifiable_id', Auth::user()->id)->where('id', $notificationId)->update(['read_at' => Carbon::now()]);
        $id = $feedbackId;

        return view('admin.perFeedback')->with('id', $feedbackId);                     
    }

    public function updateNow($transactionId, $status) {
        if($status == 1 || $status == 2 || $status == 5 || $status == 6) {
            $st = 1;
        } else if($status == 3 || $status == 7){
            $st = 2;
        } else {
            $st = 3;
        }
        if($status == 1 || $status == 5) {
            $statusNow = 'PREPARING THE ITEM';
        } else if($status == 2) {
            $statusNow = 'READY FOR DELIVERY';
        } else if($status == 3){
            $statusNow = 'IN DELIVERY';
        } else if($status == 6) {
            $statusNow = 'ITEM(S) READY';
        } else if($status == 7){
            $statusNow = 'READY FOR MEET UP';
        } else if($status == 4 || $status == 8){
            $statusNow = 'PICKED UP / RECEIVED';
        }
        $transactionUpdate = Transactions::where('id', $transactionId)
                                    ->update([
                                        'transaction_item_status_id' => $status,
                                        'transaction_status_id' => $st
                                    ]);
        if($status == 4 || $status == 8) {
            $transactionUpdate = Transactions::where('id', $transactionId)
                                    ->update([
                                        'payment_status_id' => 1
                                    ]);
        }                            
        $transaction = Transactions::where('id', $transactionId)
                                    ->with('shipping')
                                    ->orderBy('created_at', 'DESC')
                                    ->get();
                                    
        
        // event(new UpdateStatus($transaction));
        $contact = $transaction[0]->shipping->phone;    
        $message = "From Badopiece Collection\n\nTransaction ID of ".$transaction[0]->transaction_id." was change the status to ".$statusNow."\n";
        function itexmo($number,$message,$apicode) {
                $url = 'https://www.itexmo.com/php_api/api.php';
                $itexmo = array('1' => $number, '2' => $message, '3' => $apicode);
                $param = array(
                    'http' => array(
                        'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
                        'method'  => 'POST',
                        'content' => http_build_query($itexmo),
                    ),
                );
                $context  = stream_context_create($param);
                return file_get_contents($url, false, $context);
        }
        $result = itexmo($contact,$message,env('ITEXTMO_API'));                        
    }

    public function getAllFeedbacks() {
        $feedbacks = Feedbacks::where('id', '!=', null)->orderBy('created_at', 'DESC')->paginate(10);

        return $feedbacks;
    }

    public function getAllFeedbacksSearch($search) {
        $feedbacks = Feedbacks::where(function ($query) use($search) {
                                    $query->where('name','like', '%'.$search.'%')
                                            ->orWhere('rate','like', '%'.$search.'%')
                                            ->orWhere('feedback','like', '%'.$search.'%')
                                            ->orWhere('item_name','like', '%'.$search.'%')
                                            ->orWhere('item_code','like', '%'.$search.'%');
                                    })
                                    ->orderBy('created_at', 'DESC')
                                    ->paginate(10);

        return $feedbacks;
    }
    
    public function getAllInquiries() {
        $inquiries = Subscribes::where('id', '!=', null)->orderBy('created_at', 'DESC')->paginate(10);

        return $inquiries;
    }

    public function getAllInquiriesSearch($search) {
        $inquiries = Subscribes::where(function ($query) use($search) {
                                    $query->where('fullname','like', '%'.$search.'%')
                                            ->orWhere('email','like', '%'.$search.'%')
                                            ->orWhere('message','like', '%'.$search.'%');
                                    })
                                    ->orderBy('created_at', 'DESC')
                                    ->paginate(10);

        return $inquiries;
    }

    public function perInquiry_2($InquiryId, $notificationId) {
        Notifications::where('notifiable_id', Auth::user()->id)->where('id', $notificationId)->update(['read_at' => Carbon::now()]);
        $id = $InquiryId;

        return view('admin.perInquiry')->with('id', $InquiryId);                     
    }

    public function perInquiry($inquirykId) {
        $id = $inquirykId;

        $inquiry = Subscribes::where('id', $id)->get();

        return $inquiry;                            
    }

    public function perInquiryView($inquiryId) {
        $id = $inquiryId;

        return view('admin.perInquiry')->with('id', $inquiryId);
    }
}

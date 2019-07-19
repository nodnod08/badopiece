<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
// use Braintree_Transaction;
use Darryldecode\Cart\Cart;

class PaymentController extends Controller
{
    public function processPayment(Request $request) {
        $items = [];

        foreach (\Cart::getContent() as $key => $value) {
            $item = array(
                'name' => $value->name,
                'kind' => "debit",
                'quantity'=> $value->quantity,
                'unitAmount'=> $value->price,
                'unitOfMeasure'=> "unit",
                'totalAmount'=> $value->price * $value->quantity,
                'productCode'=> $value->attributes->code,
                'taxAmount' => '0.00',
                'discountAmount' => '0.00',
                'commodityCode' => $value->attributes->code
            );
            array_push($items, $item);
        }

        $nonce = $request->payment_method_nonce;

        $gateway = new \Braintree_Gateway([
            'environment' => config('services.braintree.environment'),
            'merchantId' => config('services.braintree.merchangtId'),
            'publicKey' => config('services.braintree.publicKey'),
            'privateKey' => config('services.braintree.privateKey')
        ]);

        $status = $gateway->transaction()->sale([
            'amount' => (\Cart::getSubTotal() > 500) ? \Cart::getSubTotal() : \Cart::getSubTotal() + 100,
            'shippingAmount' => (\Cart::getSubTotal() > 500) ? "0.00" : "100.00",
            'paymentMethodNonce' => $nonce,
            'customer' => [
                'firstName' => $request->firstname,
                'lastName' => $request->lastname,
                'phone' => $request->phone,
                'email' => $request->email
            ],
            'shipping' => [
                'firstName' => $request->firstname,
                'lastName' => $request->lastname,
                'streetAddress' => $request->address,
                'locality' => $request->city,
                'region' => $request->state,
                'postalCode' => $request->postal,
                'countryCodeAlpha2' => 'PH'
            ],
            'billing' => [
                'firstName' => $request->firstname,
                'lastName' => $request->lastname,
                'streetAddress' => $request->address,
                'locality' => $request->city,
                'region' => $request->state,
                'postalCode' => $request->postal,
                'countryCodeAlpha2' => 'PH'
            ],
            'lineItems' => $items,
            'options' => [
                'submitForSettlement' => True
            ]
        ]);

        if($status->success) {
            $transaction = $status->transaction;
            $response = $gateway->transaction()->find($transaction->id);
            return dd($response);
        } else {
            return dd($status->errors);
        }
    }
}

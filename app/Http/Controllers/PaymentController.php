<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Darryldecode\Cart\Cart;
use App\Transactions;
use App\Items;
use App\Shipping_details;

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

        if($request->transaction_type == 3) {
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
                // return dd($response);
    
                $transactions = Transactions::create([
                    'transaction_id' => $response->id,
                    'transaction_type_id' => $request->transaction_type,
                    'transaction_status_id' => '1',
                    'payment_status_id' => ($request->transaction_type == 3) ? '1' : '2',
                    'amount' => $response->amount,
                    'customer_id' => Auth::user()->id,
                    'shipping_amount' => $response->shippingAmount,
                    'process_authorization_code' => $response->processorAuthorizationCode,
                    'payment_type' => ($request->transaction_type == 2) ? 'MEET UP' : ($request->transaction_type == 1) ? 'COD' : $response->paymentInstrumentType,
                ]);
    
                $shipping = Shipping_details::create([
                    'transaction_id' => $transactions->id,
                    'firstname' => ($request->transaction_type == 3 || $request->transaction_type == 1) ? $request->firstname : $request->firstname,
                    'lastname' => ($request->transaction_type == 3 || $request->transaction_type == 1) ? $request->lastname : $request->lastname,
                    'phone' => $request->phone,
                    'email' => $request->email,
                    'street_address' => ($request->transaction_type == 3) ? $request->address : $request->address,
                    'city' => ($request->transaction_type == 3 || $request->transaction_type == 1) ? $request->city : $request->city,
                    'state' => ($request->transaction_type == 3 || $request->transaction_type == 1) ?  $request->state : $request->state,
                    'postal' => ($request->transaction_type == 3 || $request->transaction_type == 1) ?  $request->postal : $request->postal,
                    'country' => ($request->transaction_type == 3 || $request->transaction_type == 1) ? 'Philippines' : 'Philippines'
                ]);
    
                foreach (\Cart::getContent() as $key => $value) {
                    $items = Items::create([
                        'transaction_id' => $transactions->id,
                        'product_id' => $value->id,
                        'product_photo' => $value->attributes->photo,
                        'product_name' => $value->name,
                        'product_code' => $value->attributes->code,
                        'product_price' => $value->price,
                        'product_quantity' =>$value->quantity,
                        'product_description' => $value->attributes->description,
                    ]);
                }
    
                return redirect('/transaction/'.$transactions->id);
    
            } else {
                $errorString = "";
                
                foreach ($status->errors->deepAll() as $error => $value) {
                    $errorString .= "Error: ".$error->code.": ".$error->message."\n";
                }
                return back()->with('error',$errorString);
            }
        } else if($request->transaction_type == 1){
            $transactions = Transactions::create([
                'transaction_id' => '1',
                'transaction_type_id' => $request->transaction_type,
                'transaction_status_id' => '1',
                'payment_status_id' => ($request->transaction_type == 3) ? '1' : '2',
                'amount' => (\Cart::getSubTotal() > 500) ? \Cart::getSubTotal() : \Cart::getSubTotal() + 100,
                'customer_id' => Auth::user()->id,
                'shipping_amount' => (\Cart::getSubTotal() > 500) ? '0' : '100',
                'process_authorization_code' => '1',
                'payment_type' => 'COD',
            ]);

            $shipping = Shipping_details::create([
                'transaction_id' => $transactions->id,
                'firstname' => $request->firstname,
                'lastname' => $request->lastname,
                'phone' => $request->phone,
                'email' => $request->email,
                'street_address' => $request->address,
                'city' => $request->city,
                'state' => $request->state,
                'postal' => $request->postal,
                'country' => 'Philippines'
            ]);

            foreach (\Cart::getContent() as $key => $value) {
                $items = Items::create([
                    'transaction_id' => $transactions->id,
                    'product_id' => $value->id,
                    'product_photo' => $value->attributes->photo,
                    'product_name' => $value->name,
                    'product_code' => $value->attributes->code,
                    'product_price' => $value->price,
                    'product_quantity' =>$value->quantity,
                    'product_description' => $value->attributes->description,
                ]);
            }

            return redirect('/transaction/'.$transactions->id);
        } else {
            $transactions = Transactions::create([
                'transaction_id' => '1',
                'transaction_type_id' => $request->transaction_type,
                'transaction_status_id' => '1',
                'payment_status_id' => ($request->transaction_type == 3) ? '1' : '2',
                'amount' => (\Cart::getSubTotal() > 500) ? \Cart::getSubTotal() : \Cart::getSubTotal() + 100,
                'customer_id' => Auth::user()->id,
                'shipping_amount' => (\Cart::getSubTotal() > 500) ? '0' : '100',
                'process_authorization_code' => '1',
                'payment_type' => 'MEET UP',
            ]);

            $shipping = Shipping_details::create([
                'transaction_id' => $transactions->id,
                'firstname' => $request->firstname,
                'lastname' => $request->lastname,
                'phone' => $request->phone,
                'email' => $request->email,
                'street_address' => $request->address,
                'city' => 'Calamba',
                'state' => 'Laguna',
                'postal' => '4027',
                'country' => 'Philippines'
            ]);

            foreach (\Cart::getContent() as $key => $value) {
                $items = Items::create([
                    'transaction_id' => $transactions->id,
                    'product_id' => $value->id,
                    'product_photo' => $value->attributes->photo,
                    'product_name' => $value->name,
                    'product_code' => $value->attributes->code,
                    'product_price' => $value->price,
                    'product_quantity' =>$value->quantity,
                    'product_description' => $value->attributes->description,
                ]);
            }

            return redirect('/transaction/'.$transactions->id);
        }
    }
}
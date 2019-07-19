<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        \Braintree_Configuration::environment(env('BT_ENVIRONMENT'));
        \Braintree_Configuration::merchantId(env('BT_MERCHANT_ID'));
        \Braintree_Configuration::publicKey(env('BT_PUBLIC_KEY'));
        \Braintree_Configuration::privateKey(env('BT_PRIVATE_KEY'));

        // $gateway = new Braintree_Gateway([
        //     'environment' => config('services.braintree.environment'),
        //     'merchantId' => config('services.braintree.merchangtId'),
        //     'publicKey' => config('services.braintree.publicKey'),
        //     'privateKey' => config('services.braintree.privateKey')
        // ]);
    }
}

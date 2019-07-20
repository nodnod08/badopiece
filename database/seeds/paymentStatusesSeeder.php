<?php

use Illuminate\Database\Seeder;
use App\PaymentStatuses;

class paymentStatusesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PaymentStatuses::create(['status' => 'PAID']);
        PaymentStatuses::create(['status' => 'UNPAID']);
    }
}


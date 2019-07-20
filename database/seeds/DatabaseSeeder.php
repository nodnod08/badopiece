<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(paymentStatusesSeeder::class);
        // $this->call(statusesSeeder::class);
        $this->call(transactionTypesSeeder::class);
    }
}

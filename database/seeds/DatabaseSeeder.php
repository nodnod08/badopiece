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
        $this->call(paymentStatusesSeeder::class);
        $this->call(statusesSeeder::class);
        $this->call(transactionTypesSeeder::class);
        $this->call(settingsSeeder::class);
        $this->call(usersSeeder::class);
        $this->call(itemStatusesSeeder::class);
        $this->call(productsSeeder::class);
        $this->call(categorySeeder::class);
    }
}

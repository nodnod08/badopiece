<?php

use Illuminate\Database\Seeder;
use App\Transaction_types;

class transactionTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Transaction_types::create(['transaction_type' => 'COD']);
        Transaction_types::create(['transaction_type' => 'MEET UP']);
        Transaction_types::create(['transaction_type' => 'Online Payment']);
    }
}

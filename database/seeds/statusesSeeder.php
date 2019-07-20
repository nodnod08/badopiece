<?php

use Illuminate\Database\Seeder;
use App\Statuses;

class statusesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Statuses::create(['status' => 'For process']);
        Statuses::create(['status' => 'In transit']);
        Statuses::create(['status' => 'Delivered']);
        Statuses::create(['status' => 'Picked up']);
    }
}

<?php

use Illuminate\Database\Seeder;
use App\ItemStatuses;

class itemStatusesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ItemStatuses::create(['status' => 'For process']);
        ItemStatuses::create(['status' => 'In transit']);
        ItemStatuses::create(['status' => 'Delivered']);
        ItemStatuses::create(['status' => 'Picked up']);
    }
}

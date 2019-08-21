<?php

use Illuminate\Database\Seeder;
use App\Categories;

class categorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Categories::create(['id' => '43', 'category' => 'Dress']);
        Categories::create(['id' => '44', 'category' => 'Shoes']);
        Categories::create(['id' => '45', 'category' => 'Bag']);
        Categories::create(['id' => '46', 'category' => 'Shorts']);
        Categories::create(['id' => '47', 'category' => 'Others']);
        Categories::create(['id' => '48', 'category' => 'Polo']);
        Categories::create(['id' => '49', 'category' => 'Jacket']);
    }
}

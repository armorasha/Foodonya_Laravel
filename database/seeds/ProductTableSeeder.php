<?php

use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //create 10 products each with categories_category_id 1 to 7
        for ($x = 1; $x <= 7; $x++) {
            factory(App\Product::class, 10)->create(['categories_category_id' => $x]);
        }
    }
}

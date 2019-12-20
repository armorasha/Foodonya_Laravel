<?php

use Illuminate\Database\Seeder;

class SizeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //create 3 sizes each with products_item_id 1 to 70
        for ($x = 1; $x <= 70; $x++) {
            
            //BEFORE with random size_code
            //factory(App\Size::class, 3)->create(['products_item_id' => $x]);

            //AFTER with preset size_codes
            factory(App\Size::class)->create(['products_item_id' => $x, 'size_code' => 'Regular', 'default_size' => 1]);
            factory(App\Size::class)->create(['products_item_id' => $x, 'size_code' => 'Small']);
            factory(App\Size::class)->create(['products_item_id' => $x, 'size_code' => 'Party']);
            //you can also add price in the create() variables as in -cheaper price for small size and expensive for party size
        }
    }
}

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
        $this->call([
            //must follow catergory->product->size order
            //You cannot create faker data for products table if the product’s category doesn’t exists..
            //..because of the foreign key ‘categories_category_id’ in products table. That’s how we set it up.
            CategoryTableSeeder::class,
            ProductTableSeeder::class,
            SizeTableSeeder::class,
            UserTableSeeder::class,
        ]);
    }
}

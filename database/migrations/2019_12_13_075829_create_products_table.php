<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('item_id');
            $table->string('item_name', 45);
            $table->text('item_desc', 150)->nullable();
            $table->string('item_image_ref', 100)->nullable();
            $table->boolean('archived')->default(false);
            $table->unsignedBigInteger('categories_category_id');

            $table->foreign('categories_category_id')->references('category_id')
                ->on('categories')->onDelete('cascade'); 
            //defining foreign key relationship and telling what to do on ..
            //..primary key deletion ('cascade' means 'delete this record too')
            
            $table->boolean('is_veg')->default(0);
            $table->timestamps(); 
            //timestamps() dont accept any argument and 
            //creates two columns : created_at and updated_at

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}

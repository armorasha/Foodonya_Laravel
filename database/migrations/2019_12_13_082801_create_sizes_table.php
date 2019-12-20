<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSizesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sizes', function (Blueprint $table) {

            $table->unsignedBigInteger('products_item_id');
            $table->foreign('products_item_id')->references('item_id')->on('products')->onDelete('cascade'); 
            //defining foreign key relationship and telling what to do on primary key deletion ('cascade' means 'delete this record too')

            $table->string('size_code', 25);
            $table->decimal('price', 13, 2);
            $table->boolean('default_size')->nullable()->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sizes');
    }
}

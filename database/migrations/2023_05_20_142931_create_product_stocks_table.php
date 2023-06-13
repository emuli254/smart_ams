<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductStocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_stocks', function (Blueprint $table) {
            $table->integer('product_id')->unsigned();
           // $table->integer('office_location_id')->unsigned();
           // $table->integer('quantity')->after('office_location_id');
           // $table->foreign('product_id')->references('id')->on('products');
           // $table->foreign('office_location_id')->references('id')->on('office_locations');
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
        Schema::dropIfExists('product_stocks');
    }
}

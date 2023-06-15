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
            $table->increments('id');
            $table->integer('product_id')->unsigned();
            $table->mediumText('description');
            $table->mediumText('serial_part_no');
            $table->mediumText('asset_tag_no');
            $table->integer('supplier_id')->unsigned();
            $table->decimal('buy_price', 8, 2);
            // $table->mediumText('buy_date');
            $table->boolean('in_stock');
            $table->boolean('discontinued');

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

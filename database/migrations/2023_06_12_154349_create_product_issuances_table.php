<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('product_issuances', function (Blueprint $table) {
            // $table->id();

            $table->increments('id');
            $table->integer('staff_id')->unsigned();
            $table->integer('product_id')->unsigned();
            $table->integer('issued_by_id')->unsigned();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_issuances');
    }
};

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
        //

        Schema::table('orders', function (Blueprint $table) {
            //
            // $table->addColumn('product_id')->unsigned()->after('staff_id');
            $table->unsignedInteger('product_id')->after('staff_id');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //

        Schema::table('orders', function (Blueprint $table) {
            //
            $table->dropColumn('product_id');
        });
    }
};

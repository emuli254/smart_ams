<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOfficeLocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('office_locations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('county');
            $table->string('subcounty');
            $table->string('street');
            $table->string('building');
            $table->string('office_code');
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
        Schema::dropIfExists('office_locations');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdApartmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ad_apartment', function (Blueprint $table) {
            $table->bigInteger('apartment_id')->unsigned();
            $table->bigInteger('ad_id')->unsigned();
            $table->foreign('apartment_id')->references('id')->on('apartments');
            $table->foreign('ad_id')->references('id')->on('ads');
            $table->primary(['apartment_id','ad_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ad_apartment');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApartmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apartments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('sommary_title');
            $table->smallInteger('room_number');
            $table->smallInteger('guest_number');
            $table->smallInteger('wc_number');
            $table->smallInteger('square_meters');
            $table->decimal('latitude', 10,8);
            $table->decimal('longitude', 11,8);
            $table->string('cover_image');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('apartments');
    }
}

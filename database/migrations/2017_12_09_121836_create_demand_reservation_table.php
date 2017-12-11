<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDemandReservationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('demand_reservation', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();

            $table->integer('reservation_id')->unsigned();
            $table->integer('demand_id')->unsigned();

             # Make foreign keys
            $table->foreign('reservation_id')->references('id')->on('reservations');
            $table->foreign('demand_id')->references('id')->on('demands');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('demand_reservation');
    }
}

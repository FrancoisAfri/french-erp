<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddBookingstatusToVehicleDettails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('vehicle_details', function (Blueprint $table) {
           // $table->integer('booking_status')->nullable()->unsigned()->index();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('vehicle_details', function (Blueprint $table) {
            //$table->integer('booking_status')->nullable()->unsigned()->index();
        });
    }
}

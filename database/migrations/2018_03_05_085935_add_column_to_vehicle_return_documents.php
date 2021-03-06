<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnToVehicleReturnDocuments extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('vehicle_return_documents', function (Blueprint $table) {
           $table->Integer('bookingID ')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('vehicle_return_documents', function (Blueprint $table) {
            $table->dropColumn('bookingID ');
        });
    }
}


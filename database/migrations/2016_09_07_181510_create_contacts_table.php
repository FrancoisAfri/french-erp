<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts_contacts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->index()->nullable();
            $table->string('title')->nullable();
            $table->string('first_name')->nullable();
            $table->string('surname')->nullable();
            $table->string('middle_name')->nullable();
            $table->string('maiden_name')->nullable();
            $table->string('aka')->nullable();
            $table->string('initial')->nullable();
            $table->smallInteger('position')->nullable();
            $table->string('email')->nullable();
            $table->string('cell_number')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('id_number')->nullable();
            $table->string('res_address')->nullable();
            $table->string('res_suburb')->nullable();
            $table->string('res_city')->nullable();
            $table->integer('res_postal_code')->nullable();
            $table->integer('res_province_id')->nullable();
            $table->integer('res_country_id')->nullable();
            $table->bigInteger('date_of_birth')->nullable();
            $table->string('passport_number')->nullable();
            $table->string('drivers_licence_number')->nullable();
            $table->string('drivers_licence_code')->nullable();
            $table->string('proof_drive_permit', 100)->nullable();
            $table->bigInteger('proof_drive_permit_exp_date')->nullable();
            $table->bigInteger('drivers_licence_exp_date')->nullable();
            $table->smallInteger('gender')->nullable();
            $table->smallInteger('own_transport')->nullable();
            $table->integer('marital_status')->nullable();
            $table->integer('ethnicity')->nullable();
            $table->string('profile_pic')->nullable();
            $table->integer('how_married')->nullable();
            $table->integer('spouse_id')->nullable();
            $table->string('spouse_name')->nullable();
            $table->integer('loan_id')->nullable();
            $table->smallInteger('status')->nullable();
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
        Schema::dropIfExists('contacts_contacts');
    }
}

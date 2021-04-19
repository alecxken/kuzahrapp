<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBasicInformationTable extends Migration
{
    /**
     * Run the migrations.
     
     * @return void
     */
    public function up()
    {
        Schema::create('basic_information', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table ->string('Preferred_name');
            $table ->string('First_name');
            $table ->string('Last_name');
            $table ->string('Nationality');
            // $table ->dateTime('Date_birth');
            $table ->string('Gender');
            $table ->string('Blood_group');
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
        Schema::dropIfExists('basic_information');
    }
}

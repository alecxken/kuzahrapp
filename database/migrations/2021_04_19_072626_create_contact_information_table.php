<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactInformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contact_information', function (Blueprint $table) {
            $table->id();
           
            $table->unsignedBigInteger('user_id');
            $table ->integer('Phone_number');
            $table ->string('Login_email');
            $table ->string('Personal_email');
            $table ->string('Secondary_Phone_number');
            $table ->string('Web_site');
            $table ->string('Linkedin');
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
        Schema::dropIfExists('contact_information');
    }
}

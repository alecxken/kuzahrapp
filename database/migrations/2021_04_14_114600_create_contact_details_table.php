<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contact_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table ->string('preferredName');
            $table ->string('personalEmail');
            $table ->integer('secondaryNumber');
            $table ->string('webSite');
            $table ->string('Linkedin');
           
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * 
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contact_details');
    }
}



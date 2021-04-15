<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBasicInformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('basic_information', function (Blueprint $table) {
            $table->id();
$table->unsignedBigInteger('user_id');
$table ->string('preferredName');
$table ->string('firstName');
$table ->string('lastName');
$table ->string('nationality');
$table ->date('dateOfBirth');
$table ->string('Gender');
$table ->string('bloodGroup');
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

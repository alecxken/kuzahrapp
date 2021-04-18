<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_details', function (Blueprint $table) {
            $table->id();
            $table->string('comp_token');
            $table->text('user_id');
            $table->string('details_filled')->default('N')->nullable();
            $table->string('documents_filled')->default('N')->nullable();
            $table->string('account_activated')->default('N')->nullable();
            $table->string('other_checks')->nullable()->nullable();
            $table->string('status')->default('New')->nullable();
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
        Schema::dropIfExists('user_details');
    }
}

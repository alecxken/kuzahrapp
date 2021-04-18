<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('comp_token');
            $table->text('comp_name');
            $table->text('comp_desc');
            $table->text('comp_address');
            $table->string('comp_regno')->nullable();
            $table->string('comp_phoneno')->nullable();
            $table->string('comp_email')->nullable();
            $table->string('comp_website')->nullable();
            $table->string('comp_logo')->nullable();
            $table->string('comp_primary_color')->nullable();
            $table->string('comp_status')->nullable();
            $table->string('comp_creator')->nullable();
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
        Schema::dropIfExists('companies');
    }
}

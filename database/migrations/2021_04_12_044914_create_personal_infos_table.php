<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonalInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personal_infos', function (Blueprint $table) {
            $table->id();
              $table->string('emp_token');
            $table->string('emp_id');
            $table->string('emp_contact');
            $table->text('emp_address');
            $table->string('emp_type');
            $table->string('emp_details');
             $table->text('emp_about')->nullable();;
          
            $table->string('emp_department')->nullable();;
            $table->string('emp_position')->nullable();;
            $table->string('emp_date')->nullable();
            $table->string('emp_documents_status')->nullable();
            $table->string('emp_status')->nullable();
            $table->string('emp_expiry')->nullable();
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
        Schema::dropIfExists('personal_infos');
    }
}

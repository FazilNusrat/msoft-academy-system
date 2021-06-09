<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStaffTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('staffs', function (Blueprint $table) {
            $table->id();
            $table->integer('addmission_number');
            $table->integer('roll_number');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('father_name');
            $table->integer('phone');
            $table->date('date_of_birth');
            $table->string('email');
            $table->integer('salary');
            $table->string('address');
            $table->string('city');
            $table->string('job_name');
            $table->string('gender');
            $table->string('photo')->nullable();
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
        Schema::dropIfExists('staffs');
    }
}

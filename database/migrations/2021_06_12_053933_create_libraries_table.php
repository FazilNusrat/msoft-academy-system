<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLibrariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('libraries', function (Blueprint $table) {
            $table->id();
            $table->string('book_title')->nullable();
            $table->integer('book_number')->nullable();
            $table->integer('rack_number')->nullable();
            $table->string('publisher')->nullable();
            $table->string('author')->nullable();
            $table->string('subject')->nullable();
            $table->date('get_book')->nullable();
            $table->integer('book_price')->nullable();
            $table->date('return_book')->nullable();
            $table->integer('phone')->nullable();
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
        Schema::dropIfExists('libraries');
    }
}

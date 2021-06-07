<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->integer                 ('addmission_number')       ->nullable();
            $table->integer                 ('roll_number')             ->nullable();
            $table->string                  ('first_name');
            $table->string                  ('last_name')               ->nullable();
            $table->string                  ('class_id')                ->nullable();
            $table->string                  ('section_id')              ->nullable();
            $table->date                    ('date_of_birth')           ->nullable();
            $table->string                  ('category')                ->nullable();
            $table->string                  ('religion')                ->nullable();
            $table->string                  ('caste')                   ->nullable();
            $table->integer                 ('mobile_number')           ->nullable();
            $table->string                  ('email')                   ->nullable();
            $table->date                    ('addmission_Date')         ->nullable();
            $table->integer                 ('blood_group_id')          ->nullable();
            $table->string                  ('student_house')           ->nullable();
            $table->integer                 ('height')                  ->nullable();
            $table->integer                 ('weight')                  ->nullable();
            $table->date                    ('as_on_date')              ->nullable();
            $table->string                  ('medical_history')         ->nullable();
            $table->string                  ('gender')                  ->nullable();
            $table->string                  ('image')                   ->nullable();
            $table->json                    ('parent_details')          ->nullable();
            $table->json                    ('student_address')         ->nullable();
            $table->json                    ('transport_details')       ->nullable();
            $table->json                    ('hostel_details')          ->nullable();
            $table->json                    ('miscellaneous_details')   ->nullable();
            $table->json                    ('upload_documents')        ->nullable();
            $table->timestamps              ();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students');
    }
}

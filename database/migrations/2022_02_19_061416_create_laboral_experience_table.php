<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLaboralExperienceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('laboral_experience', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_information');
            $table->foreign('id_information')->references('id')->on('personal_information');
            $table->string('company',100);
            $table->string('project_name',150);
            $table->date('start_date');
            $table->date('end_date');
            $table->mediumText('description');
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
        Schema::dropIfExists('laboral_experience');
    }
}

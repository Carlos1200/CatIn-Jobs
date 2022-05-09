<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHiringCvTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hiring_cv', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_hiring');
            $table->foreign('id_hiring')->references('id')->on('hiring_publication')->onDelete('cascade');
            $table->string('cv_tittle');
            $table->text('path');
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
        Schema::dropIfExists('hiring_cv');
    }
}

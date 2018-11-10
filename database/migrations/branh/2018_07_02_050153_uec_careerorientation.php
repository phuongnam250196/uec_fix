<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UecCareerorientation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('uec_careerorientation', function (Blueprint $table) {
            $table->increments('id');
            $table->string('careerorientation_name');
            $table->string('careerorientation_slug');
            $table->string('careerorientation_img')->nullable();
            $table->longtext('careerorientation_content')->nullable();
            $table->tinyInteger('careerorientation_status')->nullable();
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
        Schema::dropIfExists('uec_careerorientation');
    }
}

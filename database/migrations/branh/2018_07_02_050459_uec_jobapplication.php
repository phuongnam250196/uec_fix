<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UecJobapplication extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('uec_jobapplication', function (Blueprint $table) {
            $table->increments('id');
            $table->string('jobapplication_name');
            $table->string('jobapplication_slug');
            $table->string('jobapplication_salary')->nullable(); //lương
            $table->string('jobapplication_purpose')->nullable(); // mục tiêu
            $table->string('jobapplication_transcript')->nullable(); //bảng điểm
            
            $table->boolean('jobapplication_tick')->nullable();
            $table->tinyInteger('jobapplication_status')->nullable();
            

            $table->integer('area_id')->unsigned()->nullable();

            $table->integer('career_id')->unsigned()->nullable();

            $table->integer('education_id')->unsigned()->nullable();

            $table->integer('yearofexp_id')->unsigned()->nullable();

            $table->integer('formality_id')->unsigned()->nullable();
            $table->integer('user_id')->unsigned();
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
        Schema::dropIfExists('uec_jobapplication');
    }
}

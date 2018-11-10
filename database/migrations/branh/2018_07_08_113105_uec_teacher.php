<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UecTeacher extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('uec_teacher', function (Blueprint $table) {
            $table->increments('id');
            $table->string('teacher_name', 255);
            $table->string('teacher_slug');
            $table->string('teacher_img',255)->nullable();
            $table->date('teacher_birthday')->nullable();
            $table->string('teacher_email',255);
            $table->string('teacher_phone');
            $table->string('teacher_address',255)->nullable();
            $table->boolean('teacher_tick')->nullable();
            $table->tinyInteger('teacher_status')->nullable();
            
            $table->integer('science_id')->unsigned();
            $table->integer('area_id')->unsigned();

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
        Schema::dropIfExists('uec_teacher');
    }
}

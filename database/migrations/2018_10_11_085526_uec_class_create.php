<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UecClassCreate extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('uec_class', function (Blueprint $table) {
            $table->increments('id');
            $table->string('class_name');
            $table->string('class_slug')->nullable();
            $table->string('class_describe')->nullable();

            $table->integer('teacher_id')->unsigned()->nullable();
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
        Schema::dropIfExists('uec_class');
    }
}

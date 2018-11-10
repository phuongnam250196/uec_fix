<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UecInfostudent extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('uec_infostudent', function (Blueprint $table) {
            $table->increments('id');
            $table->string('infostudent_name');
            $table->string('infostudent_slug');
            $table->string('infostudent_img')->nullable();
            $table->longtext('infostudent_content')->nullable();
            $table->tinyInteger('infostudent_status')->nullable();                      
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
        Schema::dropIfExists('uec_infostudent');
    }
}

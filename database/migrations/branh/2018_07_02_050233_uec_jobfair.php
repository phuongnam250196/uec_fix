<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UecJobfair extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('uec_jobfair', function (Blueprint $table) {
            $table->increments('id');
            $table->string('jobfair_name');
            $table->string('jobfair_slug');
            $table->string('jobfair_img')->nullable();
            $table->longtext('jobfair_content')->nullable();
            $table->tinyInteger('jobfair_status')->nullable();
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
        Schema::dropIfExists('uec_jobfair');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UecYearofexp extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('uec_yearofexp', function (Blueprint $table) {
            $table->increments('id');
            $table->string('yearofexp_name',100);
            $table->string('yearofexp_describe')->nullable();
            $table->string('yearofexp_slug');
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
        Schema::dropIfExists('uec_yearofexp');
    }
}

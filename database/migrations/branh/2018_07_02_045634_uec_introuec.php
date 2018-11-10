<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UecIntrouec extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('uec_introuec', function (Blueprint $table) {
            $table->increments('id');
            $table->string('introuec_name');
            $table->string('introuec_slug');
            $table->string('introuec_img')->nullable();
            $table->longtext('introuec_content')->nullable();
            $table->tinyInteger('introuec_status')->nullable();
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
        Schema::dropIfExists('uec_introuec');
    }
}

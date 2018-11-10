<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UecEnterprises extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('uec_enterprises', function (Blueprint $table) {
            $table->increments('id');
            $table->string('enterprise_name');
            $table->string('enterprise_full_name');
            $table->string('enterprise_slug');
            $table->string('enterprise_logo')->nullable();
            $table->integer('enterprise_size')->nullable();
            $table->string('enterprise_address')->nullable();
            $table->integer('enterprise_tax_code')->nullable();
            $table->string('enterprise_email');
            $table->string('enterprise_phone')->nullable();
            $table->string('enterprise_web')->nullable();
            $table->longtext('enterprise_describe')->nullable();
            $table->string('enterprise_people_name')->nullable();
            $table->string('enterprise_people_phone')->nullable();
            $table->boolean('enterprise_tick')->nullable();
            $table->tinyInteger('enterprise_status')->nullable();
            

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
        Schema::dropIfExists('uec_enterprises');
    }
}

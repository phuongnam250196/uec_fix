<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UecRecruitment extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('uec_recruitment', function (Blueprint $table) {
            $table->increments('id');
            $table->string('recruitment_name');
            $table->string('recruitment_slug');
            $table->string('recruitment_img')->nullable();
            $table->string('recruitment_salary')->nullable(); //tiền lương
            $table->string('recruitment_amount')->nullable(); //số lượng
            $table->string('recruitment_age')->nullable(); //độ tuổi
            $table->tinyInteger('recruitment_gender')->nullable();
            $table->string('recruitment_deadline')->nullable(); // hạn nộp
            $table->boolean('recruitment_tick')->nullable();
            $table->tinyInteger('recruitment_status')->nullable();
            $table->longtext('recruitment_describe')->nullable();
            $table->longtext('recruitment_benefit')->nullable();
            $table->longtext('recruitment_requirements')->nullable();

            $table->integer('area_id')->unsigned()->nullable();
            $table->integer('yearofexp_id')->unsigned()->nullable();
            $table->integer('position_id')->unsigned()->nullable();
            $table->integer('education_id')->unsigned()->nullable();
            $table->integer('formality_id')->unsigned()->nullable();
            $table->integer('career_id')->unsigned()->nullable();
            $table->integer('enterprise_id')->unsigned()->nullable();

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
        Schema::dropIfExists('uec_recruitment');
    }
}

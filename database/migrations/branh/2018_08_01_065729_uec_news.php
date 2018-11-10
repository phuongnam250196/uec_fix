<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UecNews extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('uec_news', function (Blueprint $table) {
            $table->increments('id');
            $table->string('news_name');
            $table->string('news_slug');
            $table->string('news_img')->nullable();
            $table->longtext('news_content')->nullable();
            $table->tinyInteger('news_status')->nullable();                      
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
        Schema::dropIfExists('uec_news');
    }
}

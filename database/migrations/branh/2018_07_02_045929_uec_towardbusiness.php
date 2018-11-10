    <?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UecTowardbusiness extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('uec_towardbusiness', function (Blueprint $table) {
            $table->increments('id');
            $table->string('towardbusiness_name');
            $table->string('towardbusiness_slug');
            $table->string('towardbusiness_img')->nullable();
            $table->longtext('towardbusiness_content')->nullable();
            $table->tinyInteger('towardbusiness_status')->nullable();
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
        Schema::dropIfExists('uec_towardbusiness');
    }
}

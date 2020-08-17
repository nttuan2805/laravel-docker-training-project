<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMstModelMakerTestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql2')->create('mst_model_maker', function (Blueprint $table) {
            $table->increments('model_maker_code');
            $table->string('model_maker_hyouji', 255);
            $table->string('model_maker_name', 255)->nullable();
            $table->string('model_maker_search', 255)->nullable();
            $table->string('model_maker_kana', 255)->nullable();
            $table->string('model_maker_logo', 255)->nullable();
            $table->string('model_maker_country', 255);
            $table->integer('model_maker_view_no');
            $table->integer('model_maker_select_view_no')->default(9999);
            $table->integer('model_top_hyouji_flg')->default(0);
            $table->integer('model_maker_gcode')->nullable();
            $table->integer('model_special_maker_flg')->default(0)->comment('シリーズを使うメーカのフラグ');
            $table->unique('model_maker_search', 'model_maker_search');
            $table->index('model_maker_view_no', 'idx_model_maker_view_no');
            $table->engine = 'InnoDB';
            $table->charset = 'utf8mb4 ';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::connection('mysql2')->dropIfExists('mst_model_v2');
        Schema::connection('mysql2')->dropIfExists('mst_model_maker');
    }
}

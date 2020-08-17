<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblCategoryMakersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_category_maker', function (Blueprint $table) {
            $table->increments('category_maker_code');
            $table->integer('maker_code');
            $table->integer('category_code');
            $table->integer('category_type');
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
        Schema::dropIfExists('tbl_category_maker');
    }
}

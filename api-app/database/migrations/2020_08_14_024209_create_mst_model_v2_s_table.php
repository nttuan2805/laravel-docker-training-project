<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMstModelV2STable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mst_model_v2', function (Blueprint $table) {
            $table->increments('model_code');
            $table->unsignedInteger('model_maker_code');
            $table->string('model_hyouji', 255);
            $table->string('model_search_key', 255)->nullable();
            $table->string('model_name', 255)->nullable();
            $table->string('model_kana', 255)->nullable();
            $table->integer('type_code')->nullable()->comment('シリーズを使うメーカのフラグ');
            $table->smallInteger('model_displacement');
            $table->tinyInteger('model_motortype_code')->default(0);
            $table->tinyInteger('model_genchari')->default(0)->comment('原付スクーター');
            $table->tinyInteger('model_scooter')->default(0)->comment('スクーター');
            $table->tinyInteger('model_big_scooter')->default(0)->comment('ビッグスクーター');
            $table->tinyInteger('model_mini_bike')->default(0)->comment('ミニバイク');
            $table->tinyInteger('model_street')->default(0)->comment('ストリート');
            $table->tinyInteger('model_classic')->default(0)->comment('クラシックタイプ');
            $table->tinyInteger('model_naked')->default(0)->comment('ネイキッド');
            $table->tinyInteger('model_replica')->default(0)->comment('スーパースポーツ／レプリカ');
            $table->tinyInteger('model_tourer')->default(0)->comment('スポーツツアラー');
            $table->tinyInteger('model_american')->default(0)->comment('アメリカン／クルーザー');
            $table->tinyInteger('model_off_road')->default(0)->comment('オフロード／モタード');
            $table->tinyInteger('model_import')->default(0)->comment('海外メーカー');
            $table->tinyInteger('model_business_bike')->default(0)->comment('ビジネスバイク');
            $table->tinyInteger('model_competition')->default(0)->comment('コンペティション／レーサー');
            $table->tinyInteger('model_ev')->default(0)->comment('電動バイク／ATV');
            $table->tinyInteger('model_4mini')->default(0)->comment('4ミニ');
            $table->tinyInteger('model_zeppan1')->default(0)->comment('絶版車（80年代まで）');
            $table->tinyInteger('model_zeppan2')->default(0)->comment('絶版車（80年代以降）');
            $table->tinyInteger('model_vintage')->default(0)->comment('ヴィンテージモトクロス');
            $table->tinyInteger('model_dirt')->default(0)->comment('ダート');
            $table->tinyInteger('model_trial')->default(0)->comment('トライアル');
            $table->tinyInteger('model_street_fighter')->default(0)->comment('ストリートファイター');
            $table->tinyInteger('model_cafe_racer')->default(0)->comment('カフェレーサー');
            $table->tinyInteger('model_lowrider')->default(0)->comment('ローライダーまたはチョッパー');
            $table->tinyInteger('model_new_school')->default(0)->comment('ニュースクールまたはウォンウォン系');
            $table->tinyInteger('model_trike')->default(0)->comment('トライク');
            $table->tinyInteger('model_full_custom')->default(0)->comment('フルカスタム');
            $table->string('model_image', 255)->nullable()->comment('車種画像');
            $table->string('model_image_url', 255)->nullable()->comment('車種画像パス');
            $table->string('model_name_prefix', 255)->nullable()->comment('英数字の頭文字');
            $table->string('model_kana_prefix', 255)->nullable()->comment('カタカナ行');
            $table->integer('model_count')->default(0);
            $table->integer('model_kakaku_min')->nullable();
            $table->integer('model_kakaku_max')->nullable();
            $table->integer('model_kakaku_ave')->nullable();
            $table->smallInteger('model_rank')->nullable();
            $table->unique('model_search_key', 'model_search_key');
            $table->index('model_maker_code', 'idx_model_maker_code');
            $table->index(['model_maker_code', 'model_name_prefix'], 'idx_model_name_prefix');
            $table->index(['model_maker_code', 'model_kana_prefix'], 'idx_model_kana_prefix');
            $table->index(['model_maker_code', 'model_displacement', 'model_motortype_code', 'model_hyouji'], 'idx_model_maker_view_no');
            $table->engine = 'InnoDB';
            $table->charset = 'utf8mb4 ';
        });

        Schema::table('mst_model_v2', function (Blueprint $table) {
            $table->foreign('model_maker_code')->references('model_maker_code')->on('mst_model_maker');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mst_model_v2');
    }
}

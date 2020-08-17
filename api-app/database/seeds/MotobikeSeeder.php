<?php

use Illuminate\Database\Seeder;
use App\MstModelMaker;
use App\MstModelV2;
use App\TblCategoryMaker;

class MotobikeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ini_set('max_execution_time', 120 ) ;

        $model_maker_path = storage_path() . "/json/mst_model_maker.json";
        $model_v2_path = storage_path() . "/json/mst_model_v2.json";
        $category_maker_path = storage_path() . "/json/tbl_category_maker.json";

        $model_maker = json_decode(file_get_contents($model_maker_path), true);
        $model_v2 = json_decode(file_get_contents($model_v2_path), true);
        $category_maker = json_decode(file_get_contents($category_maker_path), true);

        MstModelMaker::insert($model_maker);
        MstModelV2::insert($model_v2);
        TblCategoryMaker::insert($category_maker);
    }
}

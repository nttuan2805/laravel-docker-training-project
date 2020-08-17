<?php

use Illuminate\Database\Seeder;
use App\MstModelMakerTest;
use App\MstModelV2Test;
use App\TblCategoryMakerTest;


class MotobikeSeederTest extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(MstModelMakerTest::class, 50)->create()->each(function ($model_maker) {
            factory(MstModelV2Test::class, 5)->create(['model_maker_code'=>$model_maker->model_maker_code]);
        });

        factory(TblCategoryMakerTest::class, 10)->create();
    }
}

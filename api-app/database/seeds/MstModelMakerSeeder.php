<?php

use Illuminate\Database\Seeder;

class MstModelMakerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\MstModelMaker::class, 50)->create()->each(function ($model_maker) {
            factory(App\MstModelV2::class, 5)->create(['model_maker_code'=>$model_maker->model_maker_code]);
        });
    }
}

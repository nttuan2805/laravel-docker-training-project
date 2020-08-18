<?php

namespace Tests\Feature;

use Tests\TestCase;
use GuzzleHttp\Client;
use App\MstModelV2Test;
use App\MstModelMakerTest;

class MotobikeTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    /**
     * kanaPrefixHeader Link test.
     *
     * @return void
     */
    public function testKanaPrefixHeaderLinkIsOk()
    {
        $client = new Client(['base_uri' => env('API_URL')]);
        $response = $client->request('GET', '/api/models/kanaPrefixHeader');

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertJson($response->getBody()->getContents());
    }

    /**
     * namePrefixHeader Link test.
     *
     * @return void
     */
    public function testNamePrefixHeaderLinkIsOk()
    {
        $client = new Client(['base_uri' => env('API_URL')]);
        $response = $client->request('GET', '/api/models/namePrefixHeader');

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertJson($response->getBody()->getContents());
    }

    /**
     * displacementHeader Link test.
     *
     * @return void
     */
    public function testDisplacementHeaderLinkIsOk()
    {
        $client = new Client(['base_uri' => env('API_URL')]);
        $response = $client->request('GET', '/api/models/displacementHeader');

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertJson($response->getBody()->getContents());
    }

    /**
     * markerHeader Link test.
     *
     * @return void
     */
    public function testMarkerHeaderLinkIsOk()
    {
        $client = new Client(['base_uri' => env('API_URL')]);
        $response = $client->request('GET', '/api/models/markerHeader');

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertJson($response->getBody()->getContents());
    }

    /**
     * kanaPrefixHasModel Link test.
     *
     * @return void
     */
    public function testKanaPrefixHasModelLinkIsOk()
    {
        $client = new Client(['base_uri' => env('API_URL')]);
        $response = $client->request('GET', '/api/models/kanaPrefixHasModel');

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertJson($response->getBody()->getContents());
    }

    /**
     * namePrefixHasModel Link test.
     *
     * @return void
     */
    public function testNamePrefixHasModelLinkIsOk()
    {
        $client = new Client(['base_uri' => env('API_URL')]);
        $response = $client->request('GET', '/api/models/namePrefixHasModel');

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertJson($response->getBody()->getContents());
    }

    /**
     * displacementHasModel Link test.
     *
     * @return void
     */
    public function testDisplacementHasModelLinkIsOk()
    {
        $client = new Client(['base_uri' => env('API_URL')]);
        $response = $client->request('GET', '/api/models/displacementHasModel');

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertJson($response->getBody()->getContents());
    }

    /**
     * markerHasModel Link test.
     *
     * @return void
     */
    public function testMarkerHasModelLinkIsOk()
    {
        $client = new Client(['base_uri' => env('API_URL')]);
        $response = $client->request('GET', '/api/models/markerHasModel');

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertJson($response->getBody()->getContents());
    }

    /**
     * filterMotobikeList Link test.
     *
     * @return void
     */
    public function testfilterMotobikeListLinkIsOk()
    {
        $client = new Client(['base_uri' => env('API_URL')]);
        $response = $client->request('GET', '/api/models/filterMotobikeList');

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertJson($response->getBody()->getContents());
    }

    /**
     * KanaPrefixHasModel for data result test.
     *
     * @return void
     */
    public function testKanaPrefixHasModelForDataResult()
    {
        factory(MstModelMakerTest::class, 2)->create()->each(function ($model_maker) {
            factory(MstModelV2Test::class, 5)->create(['model_maker_code'=>$model_maker->model_maker_code]);
        });

        $client = new Client(['base_uri' => env('API_URL')]);
        $response = $client->request('GET', '/api/models/kanaPrefixHasModel/1');
        $kanaPrefixHasModel = array_column(json_decode($response->getBody()->getContents()), 'model_kana_prefix');

        $this->assertEquals(10, count($kanaPrefixHasModel));

        MstModelV2Test::query()->delete();
        MstModelMakerTest::query()->delete();
    }

    /**
     * NamePrefixHasModel for data result test.
     *
     * @return void
     */
    public function testNamePrefixHasModelForDataResult()
    {
        factory(MstModelMakerTest::class, 2)->create()->each(function ($model_maker) {
            factory(MstModelV2Test::class, 5)->create(['model_maker_code'=>$model_maker->model_maker_code]);
        });

        $client = new Client(['base_uri' => env('API_URL')]);
        $response = $client->request('GET', '/api/models/namePrefixHasModel/1');
        $namePrefixHasModel = array_column(json_decode($response->getBody()->getContents()), 'model_name_prefix');

        $this->assertEquals(10, count($namePrefixHasModel));

        MstModelV2Test::query()->delete();
        MstModelMakerTest::query()->delete();
    }

    /**
     * DisplacementHasModel for data result test.
     *
     * @return void
     */
    public function testDisplacementHasModelForDataResult()
    {
    
        factory(MstModelMakerTest::class)->create()->each(function ($model_maker) {
            factory(MstModelV2Test::class)->create(['model_maker_code'=>$model_maker->model_maker_code, 'model_displacement' => 40]);           
            factory(MstModelV2Test::class)->create(['model_maker_code'=>$model_maker->model_maker_code, 'model_displacement' => 45]);
            factory(MstModelV2Test::class)->create(['model_maker_code'=>$model_maker->model_maker_code, 'model_displacement' => 60]);           
            factory(MstModelV2Test::class)->create(['model_maker_code'=>$model_maker->model_maker_code, 'model_displacement' => 110]);
            factory(MstModelV2Test::class)->create(['model_maker_code'=>$model_maker->model_maker_code, 'model_displacement' => 128]);           
            factory(MstModelV2Test::class)->create(['model_maker_code'=>$model_maker->model_maker_code, 'model_displacement' => 230]);
        });

        $client = new Client(['base_uri' => env('API_URL')]);
        $response = $client->request('GET', '/api/models/displacementHasModel/1');
        $displacementHasModel = json_decode($response->getBody()->getContents());

        $this->assertEquals(3, count($displacementHasModel));

        MstModelV2Test::query()->delete();
        MstModelMakerTest::query()->delete();
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class ModelBikeController extends Controller
{
    public function index()
    {
        $client = new Client(['base_uri' => env('API_URL')]);

        /**
         * Get Kana Prefix Header
         */
        $response = $client->request('GET', '/api/models/kanaPrefixHeader');
        $kanaPrefixHeader = json_decode($response->getBody()->getContents());
        $response = $client->request('GET', '/api/models/kanaPrefixHasModel');
        $kanaPrefixHasModel = array_column(json_decode($response->getBody()->getContents()), 'model_kana_prefix');

        /**
         * Get Name Prefix Header
         */
        $response = $client->request('GET', '/api/models/namePrefixHeader');
        $namePrefixHeader = json_decode($response->getBody()->getContents());
        $response = $client->request('GET', '/api/models/namePrefixHasModel');
        $namePrefixHasModel = array_column(json_decode($response->getBody()->getContents()), 'model_name_prefix');

        /**
         * Get Displacement Header
         */
        $response = $client->request('GET', '/api/models/displacementHeader');
        $displacementHeader = json_decode($response->getBody()->getContents());
        $response = $client->request('GET', '/api/models/displacementHasModel');
        $displacementHasModel = json_decode($response->getBody()->getContents());


        /**
         * Get Maker Header
         */
        $response = $client->request('GET', '/api/models/markerHeader');
        $markerHeader = json_decode($response->getBody()->getContents(), true);
        $response = $client->request('GET', '/api/models/markerHasModel');
        $markerHasModel = array_column(json_decode($response->getBody()->getContents()), 'model_maker_code');

        return view('motobike', [
            'kanaPrefixHeader' => $kanaPrefixHeader,
            'kanaPrefixHasModel' => $kanaPrefixHasModel,
            'namePrefixHeader' => $namePrefixHeader,
            'namePrefixHasModel' => $namePrefixHasModel,
            'displacementHeader' => $displacementHeader,
            'displacementHasModel' => $displacementHasModel,
            'markerHeader' => $markerHeader,
            'markerHasModel' => $markerHasModel]);
    }

    public function filter(Request $request)
    {
        $inputs = $request->all();
        $kana = $inputs['kana'];
        $name = $inputs['name'];
        $disp = $inputs['disp'];
        $maker = $inputs['maker'];

        $paras = $kana . '/' . $name . '/' . $disp . "/" . $maker;
        $client = new Client(['base_uri' => env('API_URL')]);
        $response = $client->request('GET', '/api/models/filterMotobikeList/' . $paras);
        $result = json_decode($response->getBody()->getContents(), true);

        $colsNumPerRow = 4;
        $rowsNumPerChunk = 10;
        $result = array_chunk(array_chunk($result, $colsNumPerRow), $rowsNumPerChunk);

        return view('filterResult', ['result' => $result]);
    }
}

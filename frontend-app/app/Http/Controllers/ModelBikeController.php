<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class ModelBikeController extends Controller
{
    public function index()
    {
        $client = new Client(['base_uri' => env('API_URL')]);
        $response = $client->request('GET', '/api/modelMakers');
        $motobikes = json_decode($response->getBody()->getContents());
        return view('greeting', ['allMotoBikes' => $motobikes]);

        //$response = $client->request('GET', '/api/models/kanaPrefixHeader');
        //$kanaPrefixHeader = json_decode($response->getBody()->getContents());
        //echo $kanaPrefixHeader;
        // return view('greeting', ['allMotoBikes' => $motobikes]);
    }
}

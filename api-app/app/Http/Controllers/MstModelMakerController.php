<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MstModelMaker;

class MstModelMakerController extends Controller
{
    public function index()
    {
        return response()->json(MstModelMaker::all());
    }

    public function show($id)
    {
        return response()->json(MstModelMaker::find($id));
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MstModelMaker;

class MstModelMakerController extends Controller
{
    public function index()
    {
        return MstModelMaker::all();
    }

    public function show($id)
    {
        return MstModelMaker::find($id);
    }
}

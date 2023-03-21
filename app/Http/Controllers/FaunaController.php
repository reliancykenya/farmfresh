<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FaunaController extends Controller
{
    //
    public function index(){
        return view('options.fauna.index');
    }
}

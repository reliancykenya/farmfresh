<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function chooseCategory(Request $request){
    //dd($request);
    if($request->category==='animal')
    {
        return redirect('/category/animal/create');
    }
    elseif($request->category==='crop'){
        return redirect('/category/crop/create');
    }
    }
}

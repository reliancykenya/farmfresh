<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OptionController extends Controller
{
    //
    public function chooseOption(Request $request){
        // dd($request);
        if($request->option==='flora'){
            return redirect('/option/flora/index');
        }
        elseif($request->option==='fauna'){
            return redirect('/option/fauna/index');
        }

    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Crop;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class CropController extends Controller
{
    /**
     * Display a listing of the resource.
     * 
     * 
     * 
     */
    public function index()
    {
        //
        $crops=Crop::paginate(5);
        return view('categories.crop.index',['crops'=>$crops]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('categories.crop.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'name'=>['required','min:2','max:255'],
            'duration'=>['required'],
            'acerage'=>['required'],
            'note'=>['min:5','max:255'],
            
        ]);
        // dd(Auth::user()->id);
        //
        // dd($request);
        $crop=new Crop();
        $crop->name=$request['name'];
        $crop->user_id=Auth::user()->id;
        $crop->duration=$request['duration'];
        $crop->acerage=$request['acerage'];
        $crop->note=$request['note'];

        $crop->save();

        return redirect()->route('crop.index');
        

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $crop=Crop::findorFail($id);
        
        return view('categories.crop.edit',['crop'=>$crop]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $request->validate([
            'name'=>['required','min:2'],

        ]);
        $crop=Crop::findorFail($id);
        $this->authorize('update',$crop);
        $crop->name=$request->name;
        $crop->duration=$request->duration;
        $crop->acerage=$request->acerage;
        $crop->note=$request->note;
        
        $crop->update();

        return redirect('/category/crops')->with('updateMsg','Crop updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $crop=Crop::findOrFail($id);
        $this->authorize('delete',$crop);
        $crop->delete();
        return redirect('/category/crops')->with('delMsg','Crop deleted successgfully');
    }
}

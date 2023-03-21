<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class AnimalController extends Controller
{
    // protected function __construct(){
    //     return $this->middleware('auth');
    // }
    /**
     * Display a listing of the resource.
     * 
     */
    public function index()
    {
        //
        $Animals=Animal::all();
        return view('categories.animal.index',['animals'=>$Animals]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('categories.animal.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name'=>['required','min:2','max:100'],
            'number'=>['required'],
            'note'=>['required','max:255'],
        ]);
        $animal=new Animal();
        $animal->name=$request->name;
        $animal->user_id=Auth::user()->id;
        $animal->number=$request->number;
        $animal->note=$request->note;

        $animal->save();

        return redirect()->route('animal.index');



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
        $animal=Animal::findorFail($id);
        
        return view('categories.animal.edit',['animal'=>$animal]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $animal=Animal::findorFail($id);
        $this->authorize('update',$animal);
        $request->validate([
            'name'=>['required'],
        ]);

        $animal->name=$request->name;
        $animal->number=$request->number;
        $animal->note=$request->note;

        $animal->update();

        return redirect()->route('animal.index')->with('updateMsg','Entry updated successfully');

        

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $animal=Animal::findorFail($id);
        $this->authorize('delete', $animal);
        $animal->delete();
        return redirect()->route('animal.index')->with('delMsg','Animal deleted successfully');
    }
}

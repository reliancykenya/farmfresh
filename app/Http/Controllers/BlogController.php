<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(){
        //
        $blogs=Blog::paginate(8);
        return view('blog.index',['blogs'=>$blogs]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('blog.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name'=>['required','min:2','max:255'],
            'description'=>['required','max:255'],
        ]);
        $blog=new Blog();
        $blog->name=$request['name'];
        $blog->description=$request['description'];
        $blog->user_id=Auth::user()->id;

        $blog->save();

        return redirect()->route('blog.index');



    }

    /**
     * Display the specified resource.
     */
    public function show(Blog $blog): Response
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blog $blog)
    {
        //
        
        return view('blog.edit',['blog'=>$blog]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Blog $blog): RedirectResponse
    {
        //
        $request->validate([

        ]);
        $this->authorize('update',$blog);

        $blog->name=$request->name;
        $blog->description=$request->description;

        $blog->update();
        return redirect()->route('blog.index')->with('updateMsg','Blog updated successfully');


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog)
    {
        //
        $blog->delete();
        return redirect()->route('blog.index')->with('delMsg','Blog deleted successfully');
    }
}

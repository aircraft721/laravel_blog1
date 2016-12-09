<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;
use DB;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //this function will show data from database
        //$blogs = Blog::all();
        //$blogs = DB::table('blog_post')->paginate(2);
        $blogs = Blog::paginate(2);
        return view('blog.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //we will return to our new views
        return view('blog.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //we will create a validation function here
        $this->validate($request,[
            'title'=>'required',
            'description'=>'required'
        ]);

        $blog = new Blog;

        $blog->title = $request->title;

        $blog->description = $request->description;

        $blog->save();

        return redirect('blog')->with('message','data has been updated');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $blog = Blog::findOrFail($id);

        if(!$blog){
            abort(404);
        }

        return view('blog.detail',compact('blog'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $blog = Blog::findOrFail($id);

        if(!$blog){
            abort(404);
        }

        return view('blog.edit',compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'title'=>'required',
            'description'=>'required'
        ]);

        $blog = Blog::findOrFail($id);

        $blog->title = $request->title;

        $blog->description = $request->description;

        $blog->save();

        return redirect('blog')->with('message','data has been edited');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $blog = Blog::findOrFail($id);
        $blog->delete();
        return redirect('blog')->with('message','data has been deleted');

    }
}

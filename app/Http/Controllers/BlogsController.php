<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlogsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function home()
    {
        return view('Welcome');
    }

    public function index()
    {
        $blogs = \App\Models\Blog::all();
        // dd($blogs);
        return view('blog', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        if (Auth::user()->name == "admin") {
            return view('create');
        } else {
            abort(403, 'Sorry you dont have a permission to create a blog');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $blogs = new \App\Models\Blog;
        $blogs->title = request('title');
        $blogs->description = request('description');
        $blogs->save();
        return redirect('blogs');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(\App\Models\Blog $blog)
    {
        // dd($blog);
        return view('show', compact('blog'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(\App\Models\Blog $blog)
    {
        if (Auth::user()->name == "admin") {
            // dd($blog);
            return view('edit', compact('blog'));
        } else {
            abort(403, 'Sorry you dont have a permission to edit the blog');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(\App\Models\Blog $blog)
    {
        $blog->update(request(['title', 'description']));
        $blog->save();
        return redirect('blogs');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(\App\Models\Blog $blog)
    {
        if (Auth::user()->name == "admin") {

            $blog->delete();
            return redirect('blogs');
        }
        else{
            abort(403,'Sorry you dont have a permission to delete the blog');
        }
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    //
    public function home()
    {
        return view('Welcome');
    }
    public function blog()
    {
        $blogs = \App\Models\Blog::all();
        // dd($blogs);
        return view('blog', compact('blogs'));
    }
    public function index()
    {
        return view('create');
    }
    public function create()
    {
        $blogs = new \App\Models\Blog;
        $blogs->title = request('title');
        $blogs->description = request('description');
        $blogs->save();
        return redirect('blogs');
    }
    public function show(\App\Models\Blog $blog)
    {
        // dd($blog);
        return view('show', compact('blog'));
    }
    public function edit(\App\Models\Blog $blog)
    {
        // dd($blog);
        return view('edit', compact('blog'));
    }
    public function update(\App\Models\Blog $blog)
    {
        $blog->update(request(['title', 'description']));
        $blog->save();
        return redirect('blogs');
    }
    public function destroy(\App\Models\Blog $blog)
    {
        $blog->delete();
        return redirect('blogs');
    }
}

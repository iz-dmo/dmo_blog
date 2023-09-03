<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Post;


class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories=Category::all();
        $posts=Post::all();

        return view('blog.index',compact('categories','posts'));


    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $post=Post::find($id);
        $categories=Category::all();
        // $post_category=$post->category_id;
        $post_categories=Post::where('category_id',$post->category_id)->get();
        return view('blog.post',compact('post','post_categories','categories'));
    }

    // public function categorylist(string $category_id){
    //     $post=Post::find($category_id);
    //     $category=Category::all();
    //     // $post_category=$post->category_id;
    //     $post_categories=Post::where('category_id',$post->category_id)->get();
    //     return view('blog.postCategory',compact('post','post_categories','category'));
    // }

    

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

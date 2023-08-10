<?php

namespace App\Http\Controllers;

use App\Models\Favourite;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
 

    public function index()
    {
        $posts = Post::paginate(2);
        $tags = Tag::all();
        return view('blog.index',compact('posts', 'tags'));
    }

    public function addFavourite()
    {

    }


    public function show($slug)
    {
        $post = Post::whereSlug($slug)->first();
        $post->increment('views');
        $post->save();
        return view('blog.show',compact('post'));
    }

    public function favourite($post_id)
    {
        if (Auth::user()){
            $favourite = new Favourite();
            $favourite->user_id = Auth::id();
            $favourite->post_id = $post_id;
            $favourite->save();
        }
        return redirect()->back();
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
    }
}

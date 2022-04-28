<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\PostCategory;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Post::latest()->get();
        return view('dashboard.post.index', [
            'active' => 'Post',
            "data" => $data,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $postCategory = PostCategory::all();

        return view('dashboard.post.create', [
            'active' => 'Form Create Post',
            'postCategory' => $postCategory,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    function slugyfy($text)
    {
        $text = strtolower(trim(preg_replace('/[^A-Za-z0-9]+/', '-', $text)));
        return $text;
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'title' => 'required|max:255',
            'post_category_id' => 'required',
            'author' => 'required',
            'body' => 'required',
        ]);

        $validate['slug'] = $this->slugyfy($validate['title']);

        $create = Post::create($validate);
        if (!$create) {
            return redirect('/post/create')->with('error', 'Create Post Failed !');
        }

        return redirect('/post')->with('success', 'Success Created Data');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }
}

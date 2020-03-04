<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Post;
use App\PostCategory;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function index()
    {
        return view('admin.pages.post.index', [
            'posts'=>Post::all()
        ]);
    }


    public function create()
    {
        return view('admin.pages.post.form',[
            'categories'=>PostCategory::all()
        ]);
    }


    public function store(Request $request)
    {
             return $this->handleForm($request, new Post());
    }


    public function show(Post $post)
    {
        return view('admin.pages.post.show', [
            'post'=>$post
        ]);
    }


    public function edit(Post $post)
    {
        return view('admin.pages.post.form', [
            'post'=>$post,
            'update'=>true,
            'categories'=>PostCategory::all()
        ]);
    }


    public function update(Request $request, Post $post)
    {
       return $this->handleForm($request, $post);
    }


    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('admin.post.index');
    }
    protected function handleForm(Request $request, Post $post){

        $request->validate($post->rules);

        $post->fill($request->all());
        $post->save();
        return redirect()->route('admin.post.index');
    }
}

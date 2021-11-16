<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdatePostRequest;
use App\Models\Post;

class PostController extends Controller
{
    public function index() 
    {
        $posts = Post::get();

        
        return view('admin.posts.index', compact('posts'));
    }
    public function create()
    {
        return view('admin.posts.create');
    }
    
    public function store(StoreUpdatePostRequest $request)
    {
        $post = Post::create($request->all());

        return redirect()->route('posts.index');
    }
    public function show($id)
    {
        // $post = Post::where('id', $id)->first();

        if (!$post = Post::find($id)) {
            return redirect()->route('posts.index');
        }

        return view('admin.posts.show', compact('post'));

    }
    public function destroy($id)
    {
        if (!$post = Post::find($id)) {
            return redirect()->route('posts.index');
        }

        $post->delete();


        return redirect()
                ->route('posts.index')
                ->with('message', 'Post deletado com sucesso');

    }
}

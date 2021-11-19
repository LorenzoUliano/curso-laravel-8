<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdatePostRequest;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index() 
    {

        $posts = Post::paginate();

        session()->put('esconder', true);
        return view('admin.posts.index', compact('posts'));
    }
    public function create()
    {
        return view('admin.posts.create');
    }
    
    public function store(StoreUpdatePostRequest $request)
    {
        $post = Post::create($request->all());

        return redirect()
                    ->route('posts.index')
                    ->with('message', 'Post criado com sucesso');
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
    public function edit($id)
    {
        // $post = Post::where('id', $id)->first();

        if (!$post = Post::find($id)) {
            return redirect()->route('posts.index');
        }

        return view('admin.posts.edit', compact('post'));

    }
    public function update(StoreUpdatePostRequest $request, $id)
    {
        // $post = Post::where('id', $id)->first();

        if (!$post = Post::find($id)) {
            return redirect()->route('posts.index');
        }

        $post->update($request->all());

        return redirect()
                ->route('posts.index')
                ->with('message', 'Post editado com sucesso');

    }
    public function search(Request $request)
    {   
        $filters = $request->except('_token');
        $posts = Post::where('title', 'LIKE', "%{$request->search}%")
                        ->orwhere('content', 'LIKE', "%{$request->search}%")
                        ->paginate();

        return view('admin.posts.index', compact('posts', 'filters'));

    }
}

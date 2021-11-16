@extends('admin.layouts.app')

@section('title', "Detalhes do {$post->title}")
    

@section('content')
    <h1 class="pb-2 mb-5 text-4xl border-b-2 border-black">Detalhes do post {{ $post->title }} <a href="{{ route('posts.index') }}" class="font-bold hover:text-gray-600"><<</a></h1>
    <ul class="m-3 ">
        <li class="text-xl"><strong>Título:</strong> {{ $post->title }}</li>
        <li class="text-xl "><strong>Conteúdo:</strong> {{ $post->content }}</li>
    </ul>
    <form action="{{ route('posts.destroy', $post->id) }}" method="post">
        @csrf
        <input type="hidden" name="_method" value="DELETE">
        <button type="submit" class="p-2 bg-red-700 rounded hover:bg-red-500 ">Deletar o post: <strong>{{ $post->title }}</strong></button>
        
    </form>

@endsection
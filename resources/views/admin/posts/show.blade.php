@extends('admin.layouts.app')

@section('title', "Detalhes do {$post->title}")
    

@section('content')
    <h1>Detalhes do post {{ $post->title }}</h1>
    <ul>
        <li><strong>Título:</strong> {{ $post->title }}</li>
        <li><strong>Conteúdo:</strong> {{ $post->content }}</li>
    </ul>
    <form action="{{ route('posts.destroy', $post->id) }}" method="post">
        @csrf
        <input type="hidden" name="_method" value="DELETE">
        <button type="submit">Deletar o post: <strong>{{ $post->title }}</strong></button>
        
    </form>

@endsection
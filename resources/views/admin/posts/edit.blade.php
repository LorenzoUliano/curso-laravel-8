@extends('admin.layouts.app')

@section('title', "Editando post {$post->title} ")

@section('content')
    <h1>Editar o post <strong>{{ $post->title }}</strong></h1>

        
    <form action="{{ route('posts.update', $post->id) }}" method="post">
        @method('PUT')
        @include('admin.posts._partials.form')
    </form>
@endsection
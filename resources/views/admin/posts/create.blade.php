@extends('admin.layouts.app')

@section('title', 'Cadastrando post')

@section('content')
    <h1>Cadastrar novo post</h1>

        
    <form action="{{ route('posts.store') }}" method="post">
        @csrf
        @include('admin.posts._partials.form')
    </form>
@endsection
    
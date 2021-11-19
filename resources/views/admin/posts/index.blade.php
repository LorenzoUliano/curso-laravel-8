@extends('admin.layouts.app')

@section('title', 'Listagem dos posts')
    

@section('content')


    <a href="{{ route('posts.create') }}" class="p-2 text-2xl text-white bg-green-600 rounded-md hover:bg-green-700">Criar novo post</a>
    @if (session('message'))
        <div>
            {{ session('message') }}
        </div>
    @endif

    <form action="{{ route('posts.search') }}" method="post" class="mt-10">
        @csrf
        <input type="text" name="search" placeholder="Pesquisar..." autocomplete="off" class="p-2 mb-10 border border-transparent rounded shadow-xl focus:outline-none focus:ring-2 focus:ring-purple-700 focus:border-transparent">
        <button type="submit" class="p-2 text-white bg-purple-800 rounded hover:bg-purple-600">Filtrar</button>
    </form>

    <h1 class="text-5xl border-b-2 border-black">Posts</h1>
    <!-- component -->
    <section class="container p-6 mx-auto font-mono text-center">
    <div class="w-full mb-8 overflow-hidden overflow-x-hidden rounded-lg shadow-lg">
      <div class="w-full overflow-x-hidden">
        <table class="w-full text-center">
          <thead>
            <tr class="font-semibold tracking-wide text-center text-gray-900 uppercase bg-gray-100 border-b border-gray-600 text-md">
              <th class="px-4 py-3">Título</th>
              <th class="px-4 py-3">Detalhes</th>
              <th class="px-4 py-3">Editar</th>
            </tr>
          </thead>
          <tbody class="bg-white">
                @foreach ($posts as $post)
                <tr class="text-gray-700">
                    <td class="px-6 py-4 text-2xl border">{{ $post->title }}</td>
                    <td class="border">
                        <a href="{{ route('posts.show', $post->id) }}" class="text-purple-600 ">Detalhes</a>
                    </td>
                    <td class="border">
                        <a href="{{ route('posts.edit', $post->id) }}" class="text-purple-600">Editar</a>
                    </td>
                </tr>
            @endforeach 
          </tbody>
        </table>
      </div>
    </div>
  </section>
    <div class="align-middle mb-96">
      @if (isset($filters))
          
          {{ $posts->appends($filters)->links('vendor.pagination.tailwind') }}
          
      @else
          {{ $posts->links() }}
      @endif  
    </div>
    

@endsection
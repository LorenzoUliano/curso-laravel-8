@if ($errors->any())
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
 @endif


@csrf
<input type="text" name="title" id="title" placeholder="Título" class="p-2" value="{{ $post->title ?? old('title') }}">
<textarea name="content" id="content" cols="30" rows="4" class="p-2" placeholder="Conteúdo">{{ $post->content ?? old('content') }}</textarea>
<button type="submit" class="p-2 text-white bg-indigo-500 rounded hover:bg-indigo-600">Enviar</button>
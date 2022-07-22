@extends('layouts.app')

@section('titulo')
    Home
@endsection

@section('contenido')
    @if ($posts->count())
        <div class="grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
            @foreach ($posts as $post)
                <div class="items-center">
                    <a href="{{ route('posts.show', ['post' => $post, 'user' => $post->user])}}">
                        <img src="{{asset('uploads'). '/'. $post->imagen}}" alt="Imagen del Post {{$post->titulo}}">
                    </a>
                </div>
            @endforeach
        </div>
        <div>
            {{$posts->links('pagination::tailwind')}}
        </div>
    @else
       <p class="text-center">No hay post</p>
    @endif


@endsection
@extends('layouts.app')

@section('titulo')
    Home
@endsection

@section('contenido')
    <form action="{{route('perfil.buscar')}}" method="POST">
        @csrf
        <div class="flex items-center justify-center mb-3 mt-0">
            <div class="flex border-2 rounded-lg">
            
                    <input name="username" id="username" type="text" class="px-4 py-2 w-80" placeholder="Buscar usuarios..." required>
                    <button class="flex items-center justify-center px-4 border-l bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer">
                        <svg class="w-6 h-6 text-white" fill="currentColor" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 24 24">
                            <path
                                d="M16.32 14.9l5.39 5.4a1 1 0 0 1-1.42 1.4l-5.38-5.38a8 8 0 1 1 1.41-1.41zM10 16a6 6 0 1 0 0-12 6 6 0 0 0 0 12z" />
                        </svg>
                    </button>
                
            </div>
        </div>
    </form>
    @if ($posts->count())
        <div class="grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
            @foreach ($posts as $post)
                <div class="items-center bg-white p-1 rounded-lg shadow-xl ">
                    <div class="flex"> 
                        <img class="object-cover w-14 h-14 rounded-full" src="{{$post->user->imagen ?  asset('perfiles/'. '/' . $post->user->imagen) : asset('img/usuario.svg')}} " alt="Imagen de perfil">
                        <a href="{{route('posts.index', $post->user)}}" class="font-bold">{{$post->user->username}}</a>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500 m-1">{{$post->created_at->diffForHumans()}}</p>
                        @if (strlen($post->titulo) > 80)
                            <p class="mt-2 brake-words">{{substr($post->titulo, 0, 80)}} ...</p>
                        @else
                            <p class="font-normal mt-3">{{$post->titulo}}</p>
                        @endif
                                        
                    </div>
                    <a href="{{ route('posts.show', ['post' => $post, 'user' => $post->user])}}">
                        <img src="{{asset('uploads'). '/'. $post->imagen}}" alt="Imagen del Post {{$post->titulo}}">
                    </a>
                    @if (strlen($post->descripcion) > 90)
                        <p class="mt-2 brake-words">{{substr($post->descripcion, 0, 90)}} ... <a href="{{ route('posts.show', ['post' => $post, 'user' => $post->user])}}" class="text-cyan-600 hover:text-cyan-700 cursor-pointer">Ver Publicación</a></p>
                    @else
                        <p class="mt-2 brake-words">{{$post->descripcion}}</p>
                    @endif
                    <div class="flex items-center">
                        @auth
                            {{-- Verifica si el usario ya dio like --}}
                            <livewire:like-post :post='$post' />
                         
                        @endauth

                    </div>
                </div>
            @endforeach
        </div>
        <div>
            {{-- {{$posts->links('pagination::tailwind')}} --}}
        </div>
    @else
       <p class="text-center">No hay post</p>
    @endif


@endsection
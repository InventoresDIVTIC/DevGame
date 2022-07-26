@extends('layouts.app')

@section('titulo')
    Home
@endsection

@section('contenido')
    <div class="flex items-center justify-center mb-1  ">
        <div class="flex border-2 rounded-lg">
            <input type="text" class="px-4 py-2 w-80" placeholder="Buscar (Esto aun no funciona)...">
            <button class="flex items-center justify-center px-4 border-l bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer">
                <svg class="w-6 h-6 text-white" fill="currentColor" xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 24 24">
                    <path
                        d="M16.32 14.9l5.39 5.4a1 1 0 0 1-1.42 1.4l-5.38-5.38a8 8 0 1 1 1.41-1.41zM10 16a6 6 0 1 0 0-12 6 6 0 0 0 0 12z" />
                </svg>
            </button>
        </div>
    </div>
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
                            @if ($post->checkLikes(auth()->user()))
                                <form action="{{route('posts.likes.destroy', $post)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <div class="my-4">
                                        <button type="submit">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="#26619c" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M14 10h4.764a2 2 0 011.789 2.894l-3.5 7A2 2 0 0115.263 21h-4.017c-.163 0-.326-.02-.485-.06L7 20m7-10V5a2 2 0 00-2-2h-.095c-.5 0-.905.405-.905.905 0 .714-.211 1.412-.608 2.006L7 11v9m7-10h-2M7 20H5a2 2 0 01-2-2v-6a2 2 0 012-2h2.5" />
                                            </svg>
                                        </button>
                                    </div>
                                </form>
                            @else
                                <form action="{{route('posts.likes.store', $post)}}" method="POST">
                                    @csrf
                                    <div>
                                        <button type="submit">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M14 10h4.764a2 2 0 011.789 2.894l-3.5 7A2 2 0 0115.263 21h-4.017c-.163 0-.326-.02-.485-.06L7 20m7-10V5a2 2 0 00-2-2h-.095c-.5 0-.905.405-.905.905 0 .714-.211 1.412-.608 2.006L7 11v9m7-10h-2M7 20H5a2 2 0 01-2-2v-6a2 2 0 012-2h2.5" />
                                            </svg>
                                        </button>
                                    
                                    </div>
                                </form>
                            @endif
                         
                        @endauth
                        <p class="font-bold">{{$post->likes()->count()}} <span class="font-normal">Likes</span></p>
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
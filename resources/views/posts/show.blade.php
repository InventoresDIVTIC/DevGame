@extends('layouts.app')

@section('titulo')
    {{$post->titulo}}
@endsection

@section('contenido')
    <div class="container mx-auto md:flex">
        <div class="md:w-1/2">
            <img src="{{asset('uploads'). '/'. $post->imagen}}" alt="Imagen de post {{$post->titulo}}">
            <div class="p-3 flex items-center gap-4">
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
                            <div class="my-4">
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
            <div>
                <div class="flex items-center">
                    <img class="object-cover w-14 h-14 rounded-full" src="{{$post->user->imagen ?  asset('perfiles/'. '/' . $post->user->imagen) : asset('img/usuario.svg')}} " alt="Imagen de perfil">
                    <a href="{{route('posts.index', $post->user)}}" class="font-bold">{{$post->user->username}}</a>
                </div>
                
                {{-- <p class="font-bold">{{$post->user->username}}</p> --}}
                <p class="text-sm text-gray-500">{{$post->created_at->diffForHumans()}}</p>
                <p class="mt-5">{{$post->descripcion}}</p>
            </div>
            @auth
                @if ($post->user_id === auth()->user()->id)
                    <form action="{{route('posts.destroy', $post)}}" method="POST">
                        @method('DELETE')
                        @csrf
                        <input type="submit" value="Eliminar Publicación" class="bg-red-500 hover:bg-red-600 p-2 rounded text-white font-bold mt-4 cursor-pointer"/>
                    </form> 
                @endif
            @endauth
           
        </div>
        <div class="md:w-1/2 p-5">
            <div class="shadow bg-white p-5 mb-5">
                @auth
                @if(session('mensaje'))
                    <div class="bg-green-500 p-2 rounded-lg mb-6 text-white uppercase font-bold">
                        {{session('mensaje')}}
                    </div>
                
                @endif
                <p class="text-xl font-bold text-center mb-4">Agrega un Nuevo Comentario</p>

                <form action="{{route('comentarios.store', ['post'=>$post, 'user'=>$user])}}" method="POST">
                    @csrf
                    <div class="mb-5">
                        <label for="comentario" class="mb-2 block uppercase text-gray-500 font-bold">Añade Comentario</label>
                        <textarea id="comentario" name="comentario" placeholder="Agregar Comentario" class="border p-3 w-full rounded-lg @error('comentario') border-red-500 @enderror"></textarea>
                        @error('comentario')
                            <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{$message}}</p>
                        @enderror
                    </div>
                    <input type="submit" value="Comentar" 
                class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer 
                        uppercase font-bold w-full p-3 text-white rounded-lg"/>
                </form>
                @endauth

                <div class="bg-white shadow mb-5 max-h-96 overflow-y-scroll mt-10">
                    @if ($post->comentarios->count())
                        @foreach ($post->comentarios as $comentario )
                                <div class="p-5 border-gray-300 border-b">
                                    <div class="flex items-center bg-slate-50 m-1">
                                        <img class="object-cover w-14 h-14 rounded-full" src="{{$comentario->user->imagen ?  asset('perfiles/'. '/' . $comentario->user->imagen) : asset('img/usuario.svg')}} " alt="Imagen de perfil">
                                        <a class="font-bold" href="{{route('posts.index', $comentario->user)}}">
                                            {{$comentario->user->username}}
                                        </a>
                                    </div>
                                   
                                    <p class="p-3">{{$comentario->comentario}}</p>
                                    <p class="text-sm text-gray-500">{{$comentario->created_at->diffForHumans()}}</p>
                                </div>
                        @endforeach
                    @else
                        <p class="p-10 text-center">No Hay Comentarios Aún</p>
                    @endif
                </div>
            </div>   
        </div>
    </div>
@endsection
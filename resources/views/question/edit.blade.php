@extends('layouts.app')

@section('titulo')
    Editar Pregunta 
@endsection

@section('contenido')
    <div>
        @if (session('mensaje'))
            <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{session('mensaje')}}</p> 
        @endif
        <div class="p-10 bg-white rounded-lg shadow-xl mt-10 md:mt-0">
            <form action="{{ route('question.edit', ['question' => $question, 'user' => $user])}}" method="POST">
                @csrf
                <div class="mb-5">
                    <label for="question" class="mb-2 block uppercase text-gray-500 font-bold">Agregar una pregunta</label>
                    <textarea id="question" name="question" placeholder="Descripción de la publicación" class="border p-3 w-full rounded-lg @error('question') border-red-500 @enderror"> {{$question->question}}</textarea>
                    {{-- @error('question')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{$message}}</p>
                    @enderror --}}
                </div>
                <div class="mb-5">
                    <label for="success" class="mb-2 block uppercase text-gray-500 font-bold">Agregar respuesta correcta</label>
                    <input type="text" id="success" name="success" placeholder="Respuesta Correcta" class="border p-3 w-full rounded-lg @error('success') border-red-500 @enderror" value="{{$question->success}}"/>
                    @error('success')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{$message}}</p>
                    @enderror
                </div>
                <div class="mb-5">
                    <label for="incorrect1" class="mb-2 block uppercase text-gray-500 font-bold">Agregar respuesta incorrecta</label>
                    <input type="text" id="incorrect1" name="incorrect1" placeholder="Respuesta incorrecta 1" class="border p-3 w-full rounded-lg @error('incorrect1') border-red-500 @enderror" value="{{$question->incorrect1}}"/>
                    @error('incorrect1')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{$message}}</p>
                    @enderror
                </div>
                <div class="mb-5">
                    <label for="incorrect2" class="mb-2 block uppercase text-gray-500 font-bold">Agregar segunda respuesta incorrecta</label>
                    <input type="text" id="incorrect2" name="incorrect2" placeholder="Respuesta incorrecta 2" class="border p-3 w-full rounded-lg @error('incorrect2') border-red-500 @enderror" value="{{$question->incorrect2}}"/>
                    @error('incorrect2')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{$message}}</p>
                    @enderror
                </div>

                <input type="submit" value="Editar Pregunta" 
                class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer 
                        uppercase font-bold w-full p-3 text-white rounded-lg"/>
            </form>
        </div>
    </div>
@endsection
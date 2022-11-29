@extends('layouts.app')

@section('titulo')
     Preguntas Registradas
@endsection

@section('contenido')
    <section class="container mx-auto mt-10">
        <div>
            <a href="{{route('question.store', auth()->user()->username)}}" type="submit"
            class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer 
            uppercase font-bold w-full p-3 text-center text-white rounded-lg">Registrar Nueva Pregunta</a>
        </div>
    </section>
    <div class="min-h-screen py-5">
        <div class='overflow-x-auto w-full'>
            @if ($questions->count())
                <table class='mx-auto max-w-4xl w-full whitespace-nowrap rounded-lg bg-white divide-y divide-gray-300 overflow-hidden'>
                    <thead class="bg-gray-800">
                        <tr class="text-white text-center">
                            <th class="font-semibold text-sm uppercase px-6 py-4"> Id </th>
                            <th class="font-semibold text-sm uppercase px-6 py-4"> Pregunta </th>
                            <th class="font-semibold text-sm uppercase px-6 py-4"> Respuesta Correcta </th>
                            <th class="font-semibold text-sm uppercase px-6 py-4"> </th>
                            <th class="font-semibold text-sm uppercase px-6 py-4"> </th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @foreach ($questions as $question)
                            <tr>
                                <td class="px-6 py-4 text-center">{{$question->id}}</td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center space-x-3">
                                        <div>
                                            <p>{{$question->question}}</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 text-center"> {{$question->success}} </td>
                                <td class="px-3 py-4 text-center"> 
                                    <a href="{{ route('question.edit', ['question' => $question, 'user' => $user])}}" class="text-gray-500 hover:underline">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20" fill="currentColor">
                                            <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"></path>
                                        </svg>
                                    </a>
                                </td>
                                <td class="px-3 py-4 text-center"> 
                                    <form action="{{route('question.destroy', ['question' => $question, 'user' => $user])}}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <input type="submit" value="Eliminar" class="bg-red-500 hover:bg-red-600 p-2 rounded text-white font-bold mt-4 cursor-pointer">
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div>
                    {{$questions->links('pagination::tailwind')}}
                </div>
            @endif
        </div>
    </div>
@endsection

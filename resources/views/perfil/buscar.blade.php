@extends('layouts.app')

@section('titulo')
    Resultado
@endsection

@section('contenido')
    <div class="overflow-x-auto w-full">
        <table class="mx-auto max-w-sm w-full whitespace-nowrap rounded-b-lg bg-slate-300 divide-y divide-gray-300 overflow-hidden">
            <tbody class="divide-y divide-gray-200">
                @foreach ($users as $user)
                    <tr>
                        <td class="px-6 py-4">
                            <div class="flex items-center space-x-3">
                                <div class="inline-flex w-10 h-10"> <img class="w-10 h-10 object-cover rounded-full" src="{{$user->imagen ?  asset('perfiles/'. '/' . $user->imagen) : asset('img/usuario.svg')}} " alt="Imagen de perfil"></div>
                                <div>
                                    <p>{{$user->username}}</p>
                                    <p class="text-gray-500 text-sm font-semibold tracking-wide">{{$user->email}}</p>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
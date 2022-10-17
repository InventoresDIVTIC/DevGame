@extends('layouts.app')

@section('titulo')
    DevGame: {{$user->username}} 
@endsection

@push('styles')
<link rel="shortcut icon" href="{{asset('game/TemplateData/favicon.ico')}}">
<link rel="stylesheet" href="{{ asset('game/TemplateData/style.css')}}">
@endpush

@push('script')
  <script src="{{asset('game/Build/unityLoader.js')}}" defer></script>
@endpush

@section('contenido')
<div class="flex justify-center">
  <div class="md:w-3/12 px-5">
    <p class="text-center text-2xl font-black p-5">Controles</p>
    <p class="font-black">Botones [A] [D]:</p>
    <p>Desplazarse a los lados </p>
    <p class="font-black">Boto[W]:</p>
    <p>Subir por escaleras</p>
    <p class="font-black">Botone [Espacio]:</p>
    <p>Salto y Doble salto</p>
    <p class="font-black">Manten presionado [E]:</p>
    <p>Para tirar de los objetos</p>
  </div>
  <div class="w-full md:w-10/12 md:flex">
    <div id="unity-container">
      <canvas id="unity-canvas" width=960 height=600></canvas>
      <div id="unity-loading-bar">
        <div id="unity-logo"></div>
        <div id="unity-progress-bar-empty">
          <div id="unity-progress-bar-full"></div>
        </div>
      </div>
      <div id="unity-warning"></div>
      <div id="unity-footer">
        <div id="unity-fullscreen-button"></div>
        <div id="unity-build-title">DevGame</div>
      </div>
    </div>
  </div>
</div>

<div class="container">
    <h2 class="text-center text-2xl font-black mb-5">Avances de jugador</h2>
    
  <div class="md:flex md:items-center">
    <div class="md:w-1/2 p-10 bg-white rounded-lg shadow-xl mt-10 md:mt-0 md:mr-1">
        <p class="text-center">Grafica 1</p>
    </div>
    <div class="md:w-1/2 p-10 bg-white rounded-lg shadow-xl mt-10 md:mt-0 md:ml-1">
        <p class="text-center">Grafica 2</p>
    </div>
  </div>
</div>

@endsection
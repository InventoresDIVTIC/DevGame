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
          <span class="font-black mb-5 uppercase">Estadisticas</span>
          <table>
              <tr>
                <td>Porcentaje de errores:</td>
                <td>%{{$porcentaje}}</td>
              </tr>
              <tr>
                <td>Media de tiempo:</td>
                <td>{{$media}} minutos</td>
              </tr>
              <tr>
                <td>Tu mejor tiempo:</td>
                <td>{{$mejorTiempo->time}} minutos</td>
              </tr>
          </table>
          <div class="overflow-hidden rounded-lg shadow-lg">
            
            <canvas class="p-10" id="chartDoughnut"></canvas>
          </div>
      </div>
      <div class="md:w-1/2 p-10 bg-white rounded-lg shadow-xl mt-10 md:mt-0 md:ml-1">
        <span class="font-black mb-5 uppercase">Mejores tiempos</span>
        <table class="mx-auto max-w-sm w-full whitespace-nowrap rounded-b-lg bg-slate-300 divide-y divide-gray-300 overflow-hidden">
          <thead>
            <tr class="divide-y divide-gray-200">
              <td class="px-6 py-4">Usuario</td>
              <td class="px-6 py-4">Tiempo</td>
              <td class="px-2 py-4">Puntos Extras</td>
              <td class="px-2 py-4">Errores</td>
            </tr>
          </thead>
          <tbody class="divide-y divide-gray-200">
              @foreach ($times as $time)
                  <tr>
                      <td class="px-6 py-4">
                          <div class="flex items-center space-x-3">
                              <div class="inline-flex w-10 h-10"> <img class="w-10 h-10 object-cover rounded-full" src="{{$time->user->imagen ?  asset('perfiles/'. '/' . $time->user->imagen) : asset('img/usuario.svg')}} " alt="Imagen de perfil"></div>
                              <div>
                                  <p>{{$time->user->username}}</p>
                                  <p class="text-gray-500 text-sm font-semibold tracking-wide">{{$time->user->email}}</p>
                              </div>
                          </div>
                      </td>
                      <td class="px-6 py-4">{{$time->time}}</td>
                      <td class="px-2 py-4">{{$time->extraPoints}}</td>
                      <td class="px-2 py-4">{{$time->errors}}</td>
                  </tr>
              @endforeach
          </tbody>
      </table>

      </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<!-- Chart doughnut -->
<script>
  const dataDoughnut = {
    labels: ["No. Veces jugado", "No. Muertes", "No. Puntos Extras", "%Errores"],
    datasets: [
      {
        label: "Cantidad:",
        data: [ {{$veces}}, {{$muertes}}, {{$puntos_extras}}, {{$porcentaje}}],
        backgroundColor: [
          "rgb(51, 255, 51)",
          "rgb(255, 0, 0)",
          "rgb(255, 255, 51)",
          "rgb(101, 143, 241)",
        ],
        hoverOffset: 4,
      },
    ],
  };

  const configDoughnut = {
    type: "doughnut",
    data: dataDoughnut,
    options: {},
  };

  var chartBar = new Chart(
    document.getElementById("chartDoughnut"),
    configDoughnut
  );
</script>

@endsection
@extends('layouts.app')

@section('titulo')
    Index
@endsection

@section('contenido')
<script src="{{asset('game/Build/unityLoader.js')}}" defer></script>
<div class="flex justify-center">
    <div id="unity-container">
        <canvas id="unity-canvas" width=960 height=600></canvas>
        <div id="unity-loading-bar">
          <div id="unity-logo"></div>
          <div id="unity-progress-bar-empty">
            <div id="unity-progress-bar-full"></div>
          </div>
        </div>
        <div id="unity-warning"> </div>
        <div id="unity-footer">
          <div id="unity-webgl-logo"></div>
          <div id="unity-fullscreen-button"></div>
          <div id="unity-build-title">Hello World</div>
        </div>
    </div>
</div>
@endsection
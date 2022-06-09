@extends('layouts.app')

@section('titulo')
    Index
@endsection

@section('contenido')
<script src="{{asset('game/index.js')}}" defer></script>
<div id='container' class="flex justify-center">
    {{-- <img src="{{asset('img/arcade.jpg')}}" alt=""> --}}

</div>
@endsection
@extends('layouts.template')

@section('content')

<div class="container">
    <div class="jumbotron" style="background: white;">
      <h1 class="display-4">Bienvenidos a WiKi.</h1>
      <p class="lead">WiKi sistema de trabajo informático utilizado en los sitios web que permite a los usuarios modificar o crear su contenido de forma rápida y sencilla.</p>
      <hr class="my-4">

     @can('manuales.index')

      <a class="btn btn-lg text text-white" style="background-color:#0058A8;" href="{{route('manuales.index')}}" role="button">Comenzar</a>

      @endcan
    </div>
</div>

@endsection

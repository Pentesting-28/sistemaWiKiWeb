@extends('layouts.template')

@section('content')

<div class="container">
{{--     <div class="jumbotron" style="background: white;">
      <h1 class="display-4">Bienvenidos a WiKi.</h1>
      <p class="lead">WiKi sistema de trabajo informático utilizado en los sitios web que permite a los usuarios modificar o crear su contenido de forma rápida y sencilla.</p>
      <hr class="my-4">

     @can('manuales.show','manuales.create','manuales.edit','manuales.destroy')

      <a class="btn btn-lg text text-white" style="background-color:#0058A8;" href="{{route('manuales.index')}}" role="button">Comenzar</a>

      @endcan

    </div> --}}

    {{-- <div class="container"> --}}
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="jumbotron" style="background: white;">
                        <center><h1 class="display-6">Bienvenidos a WiKi.</h1></center>
                        <p class="lead"> </p>
                           
                        <hr class="my-4">
                        <p>WiKi sistema de trabajo informático utilizado en los sitios web que permite a los usuarios modificar o crear su contenido de forma rápida y sencilla.</p>
                        <p class="lead">
                          {{-- <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a> --}}
                        </p>
                      </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner ">
                            <div class="carousel-item active ">
                                <center>
                                    <div>
                                    <img class="d-block w-100" src="images/cantv-wikipedia.jpg" alt="..." width="240" height="315">
                                    </div>
                                </center>
                            </div>
                            <div class="carousel-item">
                            <img class="d-block w-100" src="images/ingenieria-informatica.jpg" alt="..." width="240" height="315">
                            </div>
                            <!-- <div class="carousel-item">
                            <img class="d-block w-100" src="img/logo.png" alt="..." width="240" height="434">
                            </div> -->
                        </div>
                            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                    </div>
                </div>
            </div>       
          {{-- </div> --}}
</div>

@endsection

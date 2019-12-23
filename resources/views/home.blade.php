@extends('layouts.template')

@section('content')


<div class="container">
    <div class="jumbotron" style="background: white;">
      <h1 class="display-4">Bienvenidos WiKi</h1>
      <p class="lead">WiKi sistema de trabajo informático utilizado en los sitios web que permite a los usuarios modificar o crear su contenido de forma rápida y sencilla.</p>
      <hr class="my-4">
     {{--  <p>It uses utility classes for typography and spacing to space content out within the larger container.</p> --}}
      <a class="btn btn-lg text text-white" style="background-color:#0058A8;" href="{{route('manuales.index')}}" role="button">Comenzar</a>
    </div>
</div>

    {{-- <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner">
        <div class="carousel-item active">

           <img src=" {{ asset('/images/uno.bmp')}}" class="img-thumbnail" style="width:120%; height: 325px;">

        </div>

        <div class="carousel-item">

         <img src=" {{ asset('/images/dos.bmp')}}" class="img-thumbnail" style="width:120%; height: 325px;">

        </div>

        <div class="carousel-item">

         <img src=" {{ asset('/images/uno.bmp')}}" class="img-thumbnail" style="width:120%; height: 325px;">

        </div>
      </div>
      <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>

    <div class="row">

    <div class="col-xs-12 col-sm-6 col-md-3">

      <div id="carousel1" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner">

        <div class="carousel-item active">

          <img src=" {{ asset('/images/uno.bmp')}}" class="img-thumbnail" style="width:120%; height: 200px;">

        </div>

        <div class="carousel-item">

          <img src=" {{ asset('/images/dos.bmp')}}" class="img-thumbnail" style="width:120%; height: 200px;">

        </div>

        <div class="carousel-item">

          <img src=" {{ asset('/images/uno.bmp')}}" class="img-thumbnail" style="width:120%; height: 200px;">

        </div>

      </div>
      
          <a class="carousel-control-prev" href="#carousel1" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>

          <a class="carousel-control-next" href="#carousel1" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>

      </div>
  </div>
    
    <div class="col-xs-12 col-sm-6 col-md-3">

      <div id="carousel2" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner">

        <div class="carousel-item active">

          <img src=" {{ asset('/images/uno.bmp')}}" class="img-thumbnail" style="width:120%; height: 200px;">

        </div>

        <div class="carousel-item">

          <img src=" {{ asset('/images/dos.bmp')}}" class="img-thumbnail" style="width:120%; height: 200px;">

        </div>

        <div class="carousel-item">

          <img src=" {{ asset('/images/uno.bmp')}}" class="img-thumbnail" style="width:120%; height: 200px;">

        </div>

      </div>
      
          <a class="carousel-control-prev" href="#carousel2" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>

          <a class="carousel-control-next" href="#carousel2" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>

      </div>
  </div>

      <div class="clearfix visible-sm-block"></div>

    <div class="col-xs-12 col-sm-6 col-md-3">

      <div id="carousel3" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner">

        <div class="carousel-item active">

          <img src=" {{ asset('/images/uno.bmp')}}" class="img-thumbnail" style="width:120%; height: 200px;">

        </div>

        <div class="carousel-item">

          <img src=" {{ asset('/images/dos.bmp')}}" class="img-thumbnail" style="width:120%; height: 200px;">

        </div>

        <div class="carousel-item">

          <img src=" {{ asset('/images/uno.bmp')}}" class="img-thumbnail" style="width:120%; height: 200px;">

        </div>

      </div>
      
          <a class="carousel-control-prev" href="#carousel3" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>

          <a class="carousel-control-next" href="#carousel3" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>

      </div>
  </div>

    <div class="col-xs-12 col-sm-6 col-md-3">

      <div id="carousel4" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner">

        <div class="carousel-item active">

          <img src=" {{ asset('/images/uno.bmp')}}" class="img-thumbnail" style="width:120%; height: 200px;">

        </div>

        <div class="carousel-item">

          <img src=" {{ asset('/images/dos.bmp')}}" class="img-thumbnail" style="width:120%; height: 200px;">

        </div>

        <div class="carousel-item">

          <img src=" {{ asset('/images/uno.bmp')}}" class="img-thumbnail" style="width:120%; height: 200px;">

        </div>

      </div>

          <a class="carousel-control-prev" href="#carousel4" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>

          <a class="carousel-control-next" href="#carousel4" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>

      </div>
  </div>
</div> --}}



{{-- <div class="container">
    <div class="row ">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div> --}}
@endsection

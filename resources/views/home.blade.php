@extends('layouts.template')

@section('content')
<br><br>
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
                                    <img class="d-block w-100" src="imagenes/cantv.jpg" alt="..." width="240" height="315">
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

<style type="text/css">
    footer {

  position: absolute;
  bottom: 0;
  /*width: 100%;*/

}
</style>
{{-- <div class="container-fluid text-center text-md-left"> --}}
          <!-- Footer -->
<footer class="page-footer font-small teal pt-4" style="background-color:#0058A8;">

  <!-- Footer Text -->
  <div class="container-fluid text-center text-md-left">

    <!-- Grid row -->
    <div class="row">

      <!-- Grid column -->
      <div class="col-md-6 mt-md-0 mt-3 text text-white">

        <!-- Content -->
        <h5 class="text-uppercase font-weight-bold">Footer text 1</h5>
        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Expedita sapiente sint, nulla, nihil
          repudiandae commodi voluptatibus corrupti animi sequi aliquid magnam debitis, maxime quam recusandae
          harum esse fugiat. Itaque, culpa?</p>

      </div>
      <!-- Grid column -->

      <hr class="clearfix w-100 d-md-none pb-3">

      <!-- Grid column -->
      <div class="col-md-6 mb-md-0 mb-3 text text-white">

        <!-- Content -->
        <h5 class="text-uppercase font-weight-bold">Footer text 2</h5>
        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Optio deserunt fuga perferendis modi earum
          commodi aperiam temporibus quod nulla nesciunt aliquid debitis ullam omnis quos ipsam, aspernatur id
          excepturi hic.</p>

      </div>
      <!-- Grid column -->

    </div>
    <!-- Grid row -->

  </div>
  <!-- Footer Text -->

  <!-- Copyright -->
  <div class="footer-copyright text-center py-3 text text-white">
     Cantv 2020 - RIF:J-00124134-5 | GGSI | GSOS | Coinse - Todos los derechos reservados - 2020©
  </div>
  <!-- Copyright -->

</footer>
<!-- Footer -->
{{-- </div> --}}

@endsection

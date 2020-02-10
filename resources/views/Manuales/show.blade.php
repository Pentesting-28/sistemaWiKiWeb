@extends('layouts.template')

@section('content')

<div class="container">

        <div class="col-md-12 fluid-center" >
            <div class="card" style="-webkit-box-shadow: -2px -2px 10px 10px rgba(0,0,0,0.14);-moz-box-shadow: -2px -2px 10px 10px rgba(0,0,0,0.14);box-shadow: -2px -2px 10px 10px rgba(0,0,0,0.14);">	
                <div class="container" style="background: #dce8f0">
                    <div class="section-header">
                        <div class="container">
                        
                          <br><br><center><h1><small>{{$manuals[0]->name}}</small></h1></center><br><br><br>

                          <dl>
                          <dd class="lead"> <p class="text-justify"> {{$manuals[0]->description}} </p> </dd>   
                          </dl><br><br><br>
                          <!-- <big></big> Representa el texto con una fuente "grande.-->

                            @foreach($manuals[0]->subtitle as $manual)
                                {{--$manual->imagen['ruta']--}}

                                <dl>
                                <dt><h4> {{$manual->subtitle_name}} </h4></dt><br>
                                <dd class="lead"> <p class="text-justify"> {!!nl2br($manual->subtitle_description)!!} </p> </dd>   
                                </dl>

                                  @if($manual->imagen['ruta'] !== null)

                                     <br><div class="text-center">
                                       <img src="{{asset($manual->imagen['ruta'])}}" width="350" height="150" alt="slider-image" class="rounded" class="rounded" alt="...">
                                     </div><br>

                                  @endif

                                  <br><hr><br>

                            @endforeach
                            <div align="center">
                              <a class="btn btn-sm btn-success" href="{{'/manuals'}}">Volver</a>
                            </div>
                         </div><br><br>
                         
                        </div>
                  </div>
              </div>
        </div>
</div>

@endsection
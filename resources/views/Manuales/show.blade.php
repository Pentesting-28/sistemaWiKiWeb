@extends('layouts.template')

@section('content')

<div class="container" >
        <div class="col-md-12 fluid-center" >
            <div class="card" style="box-shadow: #999 -2px -2px 10px 10px ; border-color: black; border-width:2px">	
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
                                       <img src="{{asset($manual->imagen['ruta'])}}" width="300" height="150" alt="slider-image" class="img-responsive" class="rounded" alt="...">
                                     </div><br>

                                  @endif

                                  <br><hr><br>

                            @endforeach

                         </div><br><br>
                         
                        </div>
                  </div>
              </div>
        </div>
</div>

@endsection
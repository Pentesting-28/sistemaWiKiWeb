@extends('layouts.template')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text text-white" style="background-color:#0058A8;">

                 <h5>Detalles del Rol</h5>

                </div>

                 <div class="card-body" style="box-shadow: #999 15px 15px 10px;">

                               <p><b>Nombre:      </b>{{$detalle->name}}</p>
                               <p><b>Slug:        </b>{{$detalle->slug}}</p>
                               <p><b>Descripción: </b>{{$detalle->description}}</p>
              
                               @if($detalle->special == 'all-access') 

                                  <p><b> Special: </b> <b> Acceso total. </b></p>

                               @elseif($detalle->special == 'no-access')

                                  <p><b> Special: </b> <b> Sin acceso. </b></p>
                               @else

                                  <p><b> Special: </b> <b> No aplica. </b></p>

                               @endif

                      {{--La función strpos, permite buscar la posición de la primera ocurrencia de un substring en un string, es decir, la posición de la primera ocurrencia de un string dentro de otro string.--}}
                      <br>
                      @if (strpos($detalle->permissions, 'name') !== false)

                          <h3>Lista de permisos</h3>
                             <div class="form-group">
                                <ul> {{-- class="list-unstyled" --}}
                                    
                                    @foreach($detalle->permissions as $permissions) 

                                       <li>

                                        <em>{{ $permissions->name }}({{ $permissions->description }}).</em>
                                       
                                       </li>

                                    @endforeach

                                  </ul>
                              </div>

                      @else

                             <h3>Lista de permisos</h3>
                             
                             <div class="form-group">
                                <ul class="list-unstyled">
                                   
                                  <li>
                                    <label>
                                      <em><b>No aplica.</b></em>
                                    </label>
                                  </li>

                                </ul>
                            </div>
                                
                      @endif

                      <div class="form-group">

                        <div class="col-md-6 offset-md-5">
                          <a class="btn btn-sm btn-success" href="{{'/role'}}">Volver</a>
                        </div>

                      </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

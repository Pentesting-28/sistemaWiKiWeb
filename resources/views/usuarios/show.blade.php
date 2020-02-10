@extends('layouts.template')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header text text-white" style="background-color:#0058A8;">
                  <h5>Detalles del Usuario</h5>

                </div>

                 <div class="card-body"  style="box-shadow: #999 15px 15px 10px;">

                   <table class="table">
                      <thead>
                           <tr>
                               <th>Nombre</th>
                               <th>Correo electrónico</th>
                           </tr>
                       </thead>
                       <tbody>
                           <tr>
                               <td><p>{{$detalle->name}}</p></td>
                               <td><p>{{$detalle->email}}</p></td>
                           </tr>
                           
                       </tbody>
                   </table>

                   {{--La función strpos, permite buscar la posición de la primera ocurrencia de un substring en un string, es decir, la posición de la primera ocurrencia de un string dentro de otro string.--}}
                   
                      @if (strpos($detalle->roles, 'name') !== false)
 
                          <h3>Roles asignados</h3><br>
                             <div class="form-group">
                                <ul class="list-unstyled">
                                    
                                    @foreach($detalle->roles as $roles)
                                  
                                        <label>
                                        <em><b>{{ $roles->name }}.</b></em>
                                        </label>
                       
                                    @endforeach

                                  </ul>
                              </div>

                      @else

                          <h3>Roles asignados</h3>
                          <div class="form-group">

                            <ul class="list-unstyled">
                                   
                              <label>
                                  <em><b>No aplica.</b></em>
                              </label>
                                    
                              </ul>

                          </div>
                                
                      @endif
                      
                      <div class="form-group">

                        <div class="col-md-6 offset-md-5">
                          <a class="btn btn-sm btn-success" href="{{'/users'}}">Volver</a>
                        </div>

                      </div>
                </div>

            </div>
        </div>
    </div>
</div>

@endsection

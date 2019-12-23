@extends('layouts.template')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header text text-white" style="background-color:#0058A8;">
                  <a href="{{route('users.index')}}" class="text-white"style="text-decoration:none" ><h5>Detalles del Usuario</h5></a>

                </div>

                 <div class="card-body"  style="box-shadow: #999 15px 15px 10px;">

                   <table class="table">
                      <thead>
                           <tr>
                               <th>Nombre</th>
                               <th>Descripción</th>
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
                      @if (strpos($detalle->roles, 'nombre') !== false)
 
                          <h3>Roles asignados</h3><br>
                             <div class="form-group">
                                <ul class="list-unstyled">
                                    
                                    @foreach($detalle->roles as $roles)
                                  
                                        <label>
                                        <em><b>{{ $roles->nombre }}.</b></em>
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

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

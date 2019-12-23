@extends('layouts.template')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header text text-white" style="background-color:#0058A8;">

                  <a href="{{route('roles.index')}}" class="text-white"style="text-decoration:none" ><h5>Detalles del Rol</h5></a>

                </div>

                 <div class="card-body" style="box-shadow: #999 15px 15px 10px;">

                   <table class="table">
                       <thead>
                           <tr>
                               <th>Nombre     </th>
                               <th>Slug       </th>
                               <th>Descripción</th>
                               <th>Special    </th>
                           </tr>
                       </thead>
                       <tbody>
                           <tr>
                               <td><p>{{$detalle->nombre}}       </p></td>
                               <td><p>{{$detalle->slug}}      </p></td>
                               <td><p>{{$detalle->description}}</p></td>

                               @if($detalle->special == 'all-access') 

                                  <td><p><b>Acceso total</b></p></td>

                               @elseif($detalle->special == 'no-access')

                                  <td><p>Sin acceso</p></td>

                               @else

                                  <td><b>No aplica.</b></td>

                               @endif
                           </tr>
                           
                       </tbody>
                   </table>

                      {{--La función strpos, permite buscar la posición de la primera ocurrencia de un substring en un string, es decir, la posición de la primera ocurrencia de un string dentro de otro string.--}}
                      @if (strpos($detalle->permissions, 'name') !== false)

                          <h3>Lista de permisos</h3>
                             <div class="form-group">
                                <ul class="list-unstyled">
                                    
                                    @foreach($detalle->permissions as $permissions)
                                    <li>
                                        <label>
                                        {{ $permissions->name }}
                                        <em>({{ $permissions->description }}).</em>
                                        </label>
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
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

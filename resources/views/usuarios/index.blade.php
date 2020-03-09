@extends('layouts.template')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                
       
                <div class="card-header text text-white" style="background-color:#0058A8;">
                     
                    <h5>Lista de Usuarios</h5>

                </div>

                <div class="card-body" style="box-shadow: #999 15px 15px 10px;">

                  <form action="{{route('users.busqueda')}}" method="GET">
                    @csrf
                    
                    <div align="right">

                        <div class="btn-group" role="group" aria-label="Basic example">
                          <input  type="search" name="name"  class="form-control" placeholder="Nombre de usuario">
                          <input  type="date"   name="date"  class="form-control">
                          <input  type="email"  name="email" class="form-control" placeholder="Correo electrónico">        

                          <button type="submit" class="btn text text-white" style="background-color: #717171">Buscar</button>

                          @if(Auth::user()->can('users.create', App\Model::class))
                              <a href="{{route('users.create')}}" class="btn text text-white float-right mx-1" style="background-color:#0058A8;">Crear</a>
                          @else
                              <a href="#" class="btn text text-white float-right mx-1" style="background-color:#0058A8;">Crear</a>
                          @endif

                        </div>

                    </div>

                  </form><br>
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                      <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Fecha</th>
                            <th>Correo electrónico</th>
                            <th colspan="3">&nbsp;</th>
                        </tr>
                      </thead>

                        <tbody>

                            @foreach($usuarios as $usuario)

                            <tr>

                                <td>{{ $usuario->name }}</td>
                                <td>{{date('d-m-Y', strtotime($usuario->created_at))}}</td>
                                <td>{{ $usuario->email}}</td>

                                

                                <td width="10px" >

                                    @if(Auth::user()->can('users.show', App\Model::class))
                                        <a href="{{ route('users.show', $usuario->id) }}" style="background-color:#0058A8"; class="btn btn-sm text text-white" >Ver</a>
                                    @else
                                        <a href="#" style="background-color:#0058A8"; class="btn btn-sm text text-white" >Ver</a>
                                    @endif

                                </td>

                                 <td width="10px" >

                                    @if(Auth::user()->can('users.edit', App\Model::class))
                                        <a href="{{ route('users.edit', $usuario->id) }}" style="background-color:#28a83b"; class="btn btn-sm text text-white" >Editar</a>
                                    @else
                                        <a href="#" style="background-color:#28a83b"; class="btn btn-sm text text-white" >Editar</a>
                                    @endif

                                </td>

                                <td width="10px" >

                                    @if(Auth::user()->can('users.destroy', App\Model::class))
                                    <form action="{{ route('users.destroy', $usuario->id) }}" method="POST">
   
                                        @csrf

                                        @method('DELETE')
      
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Seguro que deseas eliminar {{$usuario->name}}?')">Eliminar</button>
                                        
                                    </form>
                                    @else
                                        <a href="#" class="btn btn-sm btn-danger" >Eliminar</a>
                                    @endif

                                </td>

                            </tr>

                            @endforeach

                        </tbody>
                    </table>
                </div>
                    {{$usuarios->render()}} {{--Paginar los datos recuperado de la tabla users--}}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection


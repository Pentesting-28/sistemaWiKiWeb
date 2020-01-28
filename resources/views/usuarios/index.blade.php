@extends('layouts.template')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                
       
                <div class="card-header text text-white" style="background-color:#0058A8;">
                     
                    <a href="{{route('users.index')}}" class="text-white"style="text-decoration:none" ><h5>Lista de Usuarios</h5></a>

                </div>

                <div class="card-body" style="box-shadow: #999 15px 15px 10px;">

                  <form action="{{route('users.busqueda')}}" method="GET">
                    @csrf
                    
                    <div align="right">

                        <div class="btn-group" role="group" aria-label="Basic example">
                          <input  type="search" name="name"  class="form-control" placeholder="Nombre de usuario">
                          <input  type="email"  name="email" class="form-control" placeholder="Email">
                          <input  type="date"   name="date"  class="form-control">

                          <button type="submit" class="btn btn-success">Buscar</button>
                          @can('roles.create')
                          <a href="{{route('users.create')}}" class="btn text text-white float-right mx-1" style="background-color:#0058A8;">Registrar</a>
                          @endcan

                        </div>

                    </div>

                  </form><br>
<div class="table-responsive">
                    <table class="table table-striped table-hover">
                      <thead>
                        <tr>
                            <th width="10px">ID</th>
                            <th>Nombre</th>
                            <th colspan="3">&nbsp;</th>
                        </tr>
                      </thead>

                        <tbody>

                            @foreach($usuarios as $usuario)

                            <tr>

                                <td>{{ $usuario->id }}</td>
                           
                                <td>{{ $usuario->name }}</td>

                                

                                <td width="10px" >
                                    @can('users.show')
                                    <a href="{{ route('users.show', $usuario->id) }}" style="background-color:#0058A8"; class="btn btn-sm text text-white" >Ver</a>
                                    @endcan
                                </td>

                                 <td width="10px" >
                                    @can('users.edit')
                                    <a href="{{ route('users.edit', $usuario->id) }}" style="background-color:#0058A8"; class="btn btn-sm text text-white" >Editar</a>
                                    @endcan
                                </td>

                                <td width="10px" >
                                    @can('users.destroy')

                                    <form action="{{ route('users.destroy', $usuario->id) }}" method="POST">
   
                                        @csrf

                                        @method('DELETE')
      
                                        <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                                        
                                    </form>
                                    @endcan 
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


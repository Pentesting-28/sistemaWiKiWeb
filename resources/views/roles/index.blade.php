@extends('layouts.template')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header text text-white" style="background-color:#0058A8;"> 

                <a href="{{route('roles.index')}}" class="text-white"style="text-decoration:none" ><h5>Lista de Roles</h5></a>

                </div>

                <div class="card-body" style="box-shadow: #999 15px 15px 10px;">

                  <form action="{{route('roles.busqueda')}}" method="GET">
                    @csrf
                    
                    <div align="right">

                        <div class="btn-group" role="group" aria-label="Basic example">
                          <input  type="search" name="name"  class="form-control" placeholder="Nombre del rol">
                          <input  type="date"   name="date"  class="form-control">
                          <button type="submit" class="btn btn-success">Buscar</button>

                          @can('roles.create')
                          <a href="{{route('roles.create')}}" class="btn text text-white float-right mx-1" style="background-color:#0058A8;">Nuevo</a>
                          @endcan

                        </div>

                    </div>

                  </form><br>

                    <table class="table table-striped table-hover">
                      <thead>
                        <tr>
                            <th width="10px">ID</th>
                            <th>Nombre</th>
                            <th colspan="3">&nbsp;</th>
                        </tr>
                      </thead>

                        <tbody>

                            @foreach($roles as $role)

                            <tr>

                                <td>{{ $role->id }}</td>
                           
                                <td>{{ $role->nombre }}</td>

                                <td width="10px" >
                                    @can('roles.show')
                                     <a href="{{ route('roles.show', $role->id) }}" style="background-color:#0058A8"; class="btn btn-sm text text-white">Ver</a>
                                    @endcan
                                </td>

                                 <td width="10px" >
                                    @can('roles.edit')
                                    <a href="{{ route('roles.edit', $role->id) }}" style="background-color:#0058A8"; class="btn btn-sm text text-white">Editar</a>
                                    @endcan
                                </td>

                                <td width="10px" >
                                    @can('roles.destroy')

                                       <form action="{{ route('roles.destroy',$role->id) }}" method="POST">
   
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
                    {{$roles->render()}} {{--Paginar los datos recuperado de la tabla roles--}} 
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

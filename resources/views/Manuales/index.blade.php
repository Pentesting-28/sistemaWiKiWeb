@extends('layouts.template')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">

                <div class="card-header text text-white" style="background-color:#0058A8;">

                <a href="{{route('manuales.index')}}" class="text-white"style="text-decoration:none" ><h5>Lista de Manuales</h5></a>
         
                </div>

                <div class="card-body"style="box-shadow: #999 15px 15px 10px;">

                  </form>

                  <form action="{{route('manuales.busqueda')}}" method="GET">
                    @csrf
                    
                    <div align="right">

                        <div class="btn-group" role="group" aria-label="Basic example">
                          <input  type="search" name="name" class="form-control" placeholder="Nombre del manual">
                          <input  type="date"   name="date" class="form-control">
                          <button type="submit" class="btn btn-success">Buscar</button>

                          @can('roles.create')
                          <a href="{{route('manuales.create')}}" class="btn text text-white float-right mx-1" style="background-color:#0058A8;">Nuevo</a>
                          @endcan

                        </div>

                    </div>

                  </form><br>

                    <table class="table table-striped table-hover">
                      <thead>
                        <tr>
                            <th width="10px">ID</th>
                            <th>Nombre</th>
                            <th colspan="3">&nbsp;
                            </th>
                        </tr>
                      </thead>

                        <tbody>

                            @foreach($manuales as $manual)

                            <tr>

                                <td>{{ $manual->id }}</td>
                           
                                <td>{{ $manual->name }}</td>

                                <td width="10px" >
                                    
                                    @can('manuales.show')
                                     <a href="{{ route('manuales.show', $manual->id)}}" style="background-color:#0058A8;" class="btn btn-sm text text-white">Ver</a>
                                    @endcan

                                </td>

                                 <td width="10px" >
                                    
                                    @can('manuales.edit')
                                    <a href="{{ route('manuales.edit', $manual->id) }}" style="background-color:#0058A8;" class="btn btn-sm text text-white">Editar</a>
                                    @endcan

                                </td>

                                <td width="10px" >

                                    @can('manuales.destroy')

                                       <form action="{{route('manuales.destroy',$manual->id)}}" method="POST">
   
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
                    
                    {{$manuales->render()}} {{--Paginar los datos recuperado de la tabla roles--}}
                 
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

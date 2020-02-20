@extends('layouts.template')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header text text-white" style="background-color:#0058A8;">
                    <h5>
                        Lista de Manuales
                    </h5>
                </div>
                <div class="card-body" style="box-shadow: #999 15px 15px 10px;">
                    <form action="{{route('manuales.busqueda')}}" method="GET">
                        @csrf
                        <div align="right">
                            <div aria-label="Basic example" class="btn-group" role="group">
                                <input class="form-control" name="name" placeholder="Nombre del manual" type="search">
                                    <input class="form-control" name="date" type="date">
                                        <input class="form-control" name="email" placeholder="Correo electrónico" type="email">
                                            <button class="btn text text-white" style="background-color: #717171" type="submit">
                                                Buscar
                                            </button>
                                            @can('manuales.create')
                                            <a class="btn text text-white float-right mx-1" href="{{route('manuales.create')}}" style="background-color:#0058A8;">
                                                Crear
                                            </a>
                                            @endcan
                                        </input>
                                    </input>
                                </input>
                            </div>
                        </div>
                    </form>
                    <br>
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>
                                            Nombre
                                        </th>
                                        <th>
                                            Fecha
                                        </th>
                                        <th>
                                            Autor
                                        </th>
                                        <th colspan="3">
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($manuales as $manual)
                                    <tr>
                                        <td>
                                            {{ $manual->name }}
                                        </td>
                                        <td>
                                            {{ $manual->created_at }}
                                        </td>
                                        <td>
                                            {{ $manual->author }}
                                        </td>
                                        <td width="10px">
                                            @can('manuales.show')
                                            <a class="btn btn-sm text text-white" href="{{ route('manuales.show', $manual->id)}}" style="background-color:#0058A8;">
                                                Ver
                                            </a>
                                            @endcan
                                        </td>
                                        <td width="10px">
                                            @can('manuales.edit')
                                            <a class="btn btn-sm text text-white" href="{{ route('manuales.edit', $manual->id) }}" style="background-color:#28a83b;">
                                                Editar
                                            </a>
                                            @endcan
                                        </td>
                                        <td width="10px">
                                            @can('manuales.destroy')
                                            <form action="{{route('manuales.destroy',$manual->id)}}" method="POST">
                                                @csrf

                                              @method('DELETE')
                                                <button class="btn btn-sm btn-danger" onclick="return confirm('¿Seguro que deseas eliminar {{$manual->name}}?')" type="submit">
                                                    Eliminar
                                                </button>
                                            </form>
                                            @endcan
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{$manuales->render()}} {{--Paginar los datos recuperado de la tabla roles--}}
                        </div>
                    </br>
                    @endsection
                </div>
            </div>
        </div>
    </div>
</div>
@extends('layouts.template')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Lista de Productos

                     {{-- Mensaje de alerta --}}
                    @if (session()->has('mensaje'))

                        <div class="alert alert-success">
                            
                            {{ session('mensaje') }}

                        </div>

                    @endif

                    @can('products.create')

                    <a href="{{ route('products.create') }}" class="btn btn-primary pull-right float-right"> Crear</a>
                    
                    @endcan

                </div>

                <div class="card-body">

                    <table class="table table-striped table-hover">
                      <thead>
                        <tr>
                            <th width="10px">ID</th>
                            <th>Nombre</th>
                            <th colspan="3">&nbsp;</th>
                        </tr>
                      </thead>

                        <tbody>

                            @foreach($productos as $producto)

                            <tr>

                                <td>{{ $producto->id }}</td>
                           
                                <td>{{ $producto->name }}</td>

                                <td>
                                    @can('products.show')
                                     <a href="{{ route('products.show', $producto->id) }}" class="btn btn-sm btn-success">Ver</a>
                                    @endcan
                                </td>

                                 <td>
                                    @can('products.edit')
                                    <a href="{{ route('products.edit', $producto->id) }}" class="btn btn-sm btn-dark">Editar</a>
                                    @endcan
                                </td>

                                <td>
                                    @can('products.destroy')

                                       <form action="{{ route('products.destroy',$producto->id) }}" method="POST">
   
                                            @csrf

                                            @method('DELETE')
      
                                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>

                                       </form>
                                    @endcan 
                                </td>

                            </tr>

                            @endforeach

                        </tbody>
                    </table>
                    {{$productos->render()}} {{--Paginar los datos recuperado de la tabla products--}}
                 
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


@section('subir_archivos')

{!! Form::open(['route' => 'subir.store', 'files' => true]) !!}

@csrf
                        
@include('productos.form_subir_archivos')

 {!! Form::close() !!}

@endsection



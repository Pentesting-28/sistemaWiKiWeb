@extends('layouts.template')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Detalles del Producto</div>

                {{--<div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                </div>--}}

                 <div class="card-body">

                   <table class="table table-responsive">
                       <thead>
                           <tr>
                               <th>Nombre</th>
                               <th>Descripción</th>
                           </tr>
                       </thead>
                       <tbody>
                           <tr>
                               <td><p>{{$id->name}}</p></td>
                               <td><p>{{$id->description}}</p></td>
                           </tr>
                           
                       </tbody>
                   </table>



                </div>
            </div>
        </div>
    </div>
</div>
@endsection

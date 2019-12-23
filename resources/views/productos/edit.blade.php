@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edición de Productos

                     {{-- Mensaje de alerta --}}
                    @if (session()->has('mensaje'))

                        <div class="alert alert-success">
                            
                            {{ session('mensaje') }}

                        </div>

                    @endif

                </div>

                <div class="card-body">

                    {{-- Form::open(['route' => 'products.store']) }}

                        @include('productos.form_registro.formulario')
                        
                    {{ Form::close() --}}
                  
                    {!! Form::model($id, ['route' => ['products.update', $id->id],'method' => 'PUT']) !!}

                        @csrf

                        @include('productos.form_registro.formulario')
                        
                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

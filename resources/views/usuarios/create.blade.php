@extends('layouts.template')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" style="box-shadow: #999 15px 15px 10px; ">
                <div class="card-header text text-white" style="background-color:#0058A8;">

                <a href="{{route('users.index')}}" class="text-white"style="text-decoration:none" ><h5>Crear</h5></a>

            </div>

                <div class="card-body"><br>
                    
                    <form action="{{ route('users.store') }}" method="POST">
                        @csrf

                        <div class="form-row">
                    
                            <div class="form-group col-md-6">

                              <b><label for="inputCity">{{ __('Nombre') }}</label></b>
                              <input id="nombre" type="text" class="form-control @error('nombre') is-invalid @enderror" name="nombre" value="{{ old('nombre') }}" required autocomplete="name" autofocus>

                                @error('nombre')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
        
                            </div>
                            
                            <div class="form-group col-md-6">

                              <b><label for="inputState">{{ __('Correo electrónico') }}</label></b>
                              <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
        
                            </div>
        
                          </div>

                          <div class="form-row">
                    
                            <div class="form-group col-md-6">

                              <b><label for="inputCity">{{ __('Contraseña') }}</label></b>
                              <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
        
                            </div>
                            
                            <div class="form-group col-md-6">

                              <b><label for="inputState">{{ __('Confirmar Contraseña') }}</label></b>
                               <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                        
                            </div>
        
                          </div>

                          

                              <div class="alert alert-primary" role="alert">

                              <center><b>Seleccione solo un rol.</b></center>
                              
                            </div>

                            <h3>Lista de roles</h3>
                            <div class="form-row">
                    
                                    @foreach($roles as $role)
                                    <div class="form-group col-md-4">
                                        <label>
                                        <input type="checkbox" name="roles[]" value="{{$role->id}}">
                                        {{ $role->name }}
                                        <em>({{ $role->description }})</em>
                                        </label>
                                    </div>
                                    @endforeach
                                
                            </div><br>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-5">
                                    <button type="submit" class="btn btn-sm text text-white" style="background-color:#0058A8;">
                                        {{ __('Registrar') }}
                                    </button>
                                </div>
                            </div>
                    </form><br>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

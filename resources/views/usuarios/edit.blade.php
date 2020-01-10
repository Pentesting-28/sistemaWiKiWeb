@extends('layouts.template')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header text text-white" style="background-color:#0058A8;">
                    <a href="{{route('users.index')}}" class="text-white"style="text-decoration:none" ><h5>Edición de Usuario</h5></a>
                </div>

                <div class="card-body" style="box-shadow: #999 15px 15px 10px;">

                     <form action="{{route('users.update', $editar->id)}}" method="POST">

                           @csrf
                           @method('PUT')

                           <div class="form-group">
                                <label name="nombre">Nombre</label>
                                <input type="text" name="nombre" class="form-control @error('nombre') is-invalid @enderror" value="{{old('nombre') ?? $editar->name}}">

                                @error('nombre')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                           </div>

                           <div class="form-group">
                                <label name="nombre">Email</label>
                                <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" value="{{old('email') ?? $editar->email}}">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                           </div>



                            <hr>

                              <div class="alert alert-primary" role="alert">

                              <center><b>Seleccione solo un rol.</b></center>
                              
                            </div>

                            <h3>Lista de roles</h3>
                            <div class="form-group">
                                <ul class="list-unstyled">
                                    @foreach($roles as $role)
                                    <li>
                                        <label>
                                        <input type="checkbox" name="roles[]"  value="{{$role->id}}" @if($editar->roles->contains($role->id)) checked="checked" @endif>
                                        {{ $role->name }}
                                        <em>({{ $role->description }})</em>
                                        </label>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="form-group">
                                <input type="submit" name="" class="btn btn-sm text text-white" style="background-color:#0058A8;" value="Guardar">
                            </div>
                     </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
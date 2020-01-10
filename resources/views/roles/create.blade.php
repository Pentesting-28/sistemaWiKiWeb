@extends('layouts.template')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header text text-white" style="background-color:#0058A8;">
                    <a href="{{route('roles.index')}}" class="text-white"style="text-decoration:none" ><h5>Crear Roles</h5></a>
                </div>

                <div class="card-body" style="box-shadow: #999 15px 15px 10px;">

                    <form action="{{route('roles.store')}}" method="POST">
                        @csrf

                            <div class="form-group">
                                <label name="nombre">Nombre</label>
                                <input type="text" name="nombre" class="form-control @error('nombre') is-invalid @enderror" value="{{old('nombre')}}" maxlength="50" required>

                                @error('nombre')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label name="slug">URL Amigable</label>
                                <input type="text" name="slug" class="form-control @error('slug') is-invalid @enderror" value="{{old('slug')}}" maxlength="50" required>

                                @error('slug')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label name="descripcion">Descriptión</label>
                                <textarea name="descripcion" class="form-control @error('descripcion') is-invalid @enderror" rows="10" style="resize:none;" maxlength="50" required>{{ old('descripcion') }}</textarea>

                                @error('descripcion')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                                @enderror
                            </div>

                            <hr>

                            <div class="alert alert-primary" role="alert">

                              <center><b>Seleccione solo un permiso espeial.</b></center>
                              
                            </div>

                            <h3>Permiso especial</h3>


                            <div class="form-group">

                            <label> <input type="checkbox" name="all_access" value="all-access">Acceso total</label><br>
                            <label> <input type="checkbox" name="no_access" value="no-access">Ningún acceso</label>

                            </div>
                            <hr>
                            <h3>Lista de permisos</h3>
                             <div class="form-group">
                                <ul class="list-unstyled">
                                    
                                    @foreach($permissions as $permission)
                                    <li>
                                        <label>
                                        <input type="checkbox" name="permissions[]" value="{{$permission->id}}">
                                        {{ $permission->name }}
                                        <em>({{ $permission->description }}).</em>
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
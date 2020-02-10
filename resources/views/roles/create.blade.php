@extends('layouts.template')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header text text-white" style="background-color:#0058A8;">
                   <h5>Crear Roles</h5>
                </div>

                <div class="card-body" style="box-shadow: #999 15px 15px 10px;">

                    <form action="{{route('roles.store')}}" method="POST">
                        @csrf

                            <div class="form-group">
                                <label name="name">Nombre</label>
                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{old('name')}}" maxlength="50" required>

                                @error('name')
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
                             
                                <label> <input type="checkbox" name="all_access" id="all_access" value="all-access">Acceso total</label><br>
                                <label> <input type="checkbox" name="no_access" id="all_access" value="no-access">Ningún acceso</label>
                             
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

                                <div class="col-md-6 offset-md-5">
                                    <a class="btn btn-sm btn-success" href="{{'/role'}}">Volver</a>
                                    <input type="submit" class="btn btn-sm text text-white" style="background-color:#0058A8;" onclick="validar()" value="Guardar">
                                </div>

                            </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
function validar(){

var all_access = document.getElementById('all_access');

var no_access  = document.getElementById('no_access');

    if(!all_access.checked && !no_access.checked) {

         alert('all_access y no_access vacio');
         return false
    }else{

        alert('fallo');
        return false
    }

} 

// elemento = document.getElementById("campo");
//     if( !elemento.checked ) {
//       return false;
//     }
</script>

@endsection

@extends('layouts.template')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header text text-white" style="background-color:#0058A8;">
                    
                   <h5>Editar Roles</h5>
                    
                </div>

                <div class="card-body" style="box-shadow: #999 15px 15px 10px;">

                    <form action="{{route('roles.update',$role->id)}}" method="POST">
                        @csrf
                        @method('PUT')

                            <div class="form-group">
                                <label name="name">Nombre</label>
                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{old('name') ?? $role->name}}" maxlength="50" required>

                                @error('name')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label name="slug">URL Amigable</label>
                                <input type="text" name="slug" class="form-control  @error('slug') is-invalid @enderror" value="{{old('slug') ?? $role->slug}}" maxlength="50" required>

                                @error('slug')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label name="descripcion">Descripción</label>
                                <textarea name="descripcion" class="form-control @error('descripcion') is-invalid @enderror" rows="10" style="resize:none;" maxlength="50" required>{{old('descripcion') ?? $role->description}}</textarea>

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

                            <label> <input type="checkbox" name="all_access" value="all-access" @if($role->special == "all-access") checked="checked" @endif>Acceso total </label>
                            <br>

                            <label> <input type="checkbox" name="no_access" value="no-access" @if($role->special == "no-access") checked="checked" @endif>Ningún acceso </label>

                            {{--isset($role)&&$role->special == 'no-access' ? 'checked' : ''--}}

                            <input type="hidden" name="id_role" value="{{$role->id}}">

                            </div>

                            <hr>

                            <h3>Lista de permisos</h3>
                             <div class="form-group">
                                <ul class="list-unstyled">

                                @for ($i = 0; $i < count($permissions); $i++)

                                    <li class="li" id="{{$permissions[$i]->id}}">

                                        <label>

                                        <input type="checkbox" class="checkbox_permissions" id="permissions" name="permissions[]" value="{{$permissions[$i]->id}}" @if($role->permissions->contains($permissions[$i]->id)) checked="checked" @endif>

                                        <em>{{ $permissions[$i]->name }}({{ $permissions[$i]->description }}).</em>
                                         
                                        </label>
                                        
                                    </li> 
                                @endfor

                            </div>
                            <div class="form-group">
                              <div class="col-md-6 offset-md-5">
                                <a class="btn btn-sm btn-success" href="{{'/role'}}">Volver</a>
                                <input type="submit" name="" class="btn btn-sm text text-white" style="background-color:#0058A8;" value="Actualizar">
                              </div>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">

var input = document.getElementsByClassName('li');

for(let i = 0; i < input.length; i++){

    if(input[i].id == 1){
       input[i].remove();
    }
    if(input[i].id == 6){
       input[i].remove();
    }
    if(input[i].id == 11){
       input[i].remove();
    }

}

</script>

@endsection

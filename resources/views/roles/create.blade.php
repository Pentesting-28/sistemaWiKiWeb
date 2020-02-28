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

                              <center><b>Seleccione solo un permiso especial.</b></center>
                              
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
                                    
                                    <li>
                                        <div id="content">
                                    </li>    

                                </ul>
                            </div>
                            
                            <div class="form-group">

                                <div class="col-md-6 offset-md-5">
                                    <a class="btn btn-sm btn-success" href="{{'/role'}}">Volver</a>
                                    <input type="submit" class="btn btn-sm text text-white" style="background-color:#0058A8;" value="Guardar">
                                </div>

                            </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">

var array_permissions = <?php echo json_encode($permissions);?>;
var n = array_permissions.length; //obtienes la longitud
var container = document.getElementById('content');

for(let i = 0; i <n; i++){

    var label       = document.createElement('label');/* label*/
        label.id    = 'label'+i;

    var input       = document.createElement('input')/* input name checkbox*/
        input.type  = 'checkbox';
        input.name  = 'permissions[]';
        input.id    = 'permissions'+i;
        input.value =  array_permissions[i].id;

    var name_permission           = document.createElement('em');/* p name */
        name_permission.innerHTML = array_permissions[i].name;
        name_permission.id        = 'name'+i;

    var em           = document.createElement('em');/* em description */
        em.innerHTML = '('+array_permissions[i].description+').';

        label.appendChild(input);
        label.appendChild(name_permission);
        label.appendChild(em);

    document.getElementById('content').appendChild(label);

    var br    = document.createElement('br');/* br */
        br.id = 'br'+i;
        
    document.getElementById('content').appendChild(br);

    if (array_permissions[i].name == 'Navegar usuarios' && array_permissions[i].id == 1){
        $("#label"+ i).remove();
        $("#br"+ i).remove();
    }
    if (array_permissions[i].name == 'Navegar roles' && array_permissions[i].id == 6){
        $("#label"+ i).remove();
        $("#br"+ i).remove();
    }
    if (array_permissions[i].name == 'Navegar manuales' && array_permissions[i].id == 11){
        $("#label"+ i).remove();
        $("#br"+ i).remove();
    } 
    
}

</script>

@endsection

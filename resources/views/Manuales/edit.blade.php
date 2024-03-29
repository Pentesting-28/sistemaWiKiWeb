@extends('layouts.template') 
@section('content')
<style type="text/css">
img{
  width: 100PX;
  height: 100px;
  margin: 10px;
}
</style>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header text text-white" style="background-color:#0058A8;">

                    
                        <h5>Edición de Manual</h5>
                    

                </div>

                <div class="container alerta-titulo" id="alerta-titulo" style="display: none">
                    <div class="row justify-content-center mt-4">
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <strong>El campo título debe poseer maximo 255 carácteres!</strong>
                        </div>
                    </div>
                </div>

                <div class="container alerta-descripcion" style="display: none" id="alerta-descripcion">
                    <div class="row justify-content-center mt-4">
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <strong>El campo descripción debe poseer maximo 600 carácteres!</strong>
                        </div>
                    </div>
                </div>

                <div class="container alerta-subtitulo" style="display: none" id="alerta-subtitulo">
                    <div class="row justify-content-center mt-4">
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <strong>El campo subtítulo debe poseer maximo 255 carácteres!</strong>
                        </div>
                    </div>
                </div>

                <div class="container alerta-contenido" style="display: none" id="alerta-contenido">
                    <div class="row justify-content-center mt-4">
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <strong>El campo contenido debe poseer maximo 600 carácteres!</strong>
                        </div>
                    </div>
                </div>

                <div class="container alerta-Subtitulo" style="display: none" id="alerta-Subtitulo">
                    <div class="row justify-content-center mt-4">
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <strong>El campo subtítulo debe poseer maximo 255 carácteres!</strong>
                        </div>
                    </div>
                </div>

                <div class="container alerta-Contenido" style="display: none" id="alerta-Contenido">
                    <div class="row justify-content-center mt-4">
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <strong>El campo contenido debe poseer maximo 600 carácteres!</strong>
                        </div>
                    </div>
                </div>

                <div class="card-body" style="box-shadow: #999 15px 15px 10px;">

                    <div>
                        <form action="{{ route('manuales.update', $edit_manuals[0]->id) }}" method="POST">

                            @csrf 
                            @method('PUT')

                            <div class="form-group">

                                <label>Título</label>
                                <input type="text" name="titulo" class="form-control @error('titulo') is-invalid @enderror titulo" value="{{ old('titulo') ?? $edit_manuals[0]->name }}" required maxlength="255"> @error('titulo')
                                    <span class="invalid-feedback" role="alert">
                                      <strong>
                                         {{ $message }}
                                      </strong>
                                    </span> 
                          @enderror

                            </div>

                            <div class="form-group">

                                <label>Descripción</label>
                                <textarea name="descripcion" class="form-control @error('descripcion') is-invalid @enderror descripcion" rows="10" style="resize:none;" required maxlength="600">{{ old('descripcion') ?? $edit_manuals[0]->description }}</textarea>

                                @error('descripcion')
                                <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span> @enderror

                            </div>

                            <br>

                            <input type="submit" class="btn btn-sm float-right text text-white mx-1" style="background-color:#0058A8;" value="Actualizar título">

                        </form>

                    </div>

                    @foreach($edit_manuals[0]->subtitle as $edit_manual)
                    <div>
                        <br>
                        <br>

                        <!-- ACTUALIZA LOS SUBTITULOS RELACIONADOS CON EL ID DEL MANUAL -->
                        <form action="{{ route('subtitle.update', $edit_manual->id) }}" method="POST">

                            @csrf @method('PUT')

                            <div class="form-group">

                                <br>
                                <label>Subtítulo</label>
                                <input type="text" name="subtitulo" class="form-control @error('subtitulo') is-invalid @enderror subtitulo" value="{{ old('subtitulo') ?? $edit_manual->subtitle_name }}" required maxlength="255"> @error('subtitulo')
                                <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span> @enderror

                            </div>

                            <div class="form-group">

                                <label>Contenido</label>
                                <textarea name="contenido" class="form-control @error('contenido') is-invalid @enderror contenido" rows="10" style="resize:none;" required maxlength="600">{{ old('contenido') ?? $edit_manual->subtitle_description }}</textarea>

                                @error('contenido')
                                <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span> @enderror

                            </div>

                            <br>

                            <input type="submit" class="btn btn-sm float-right text text-white" style="background-color:#0058A8;" value="Actualizar subtítulo">

                        </form>

                    </div>

                    <div>
                        <!-- ELIMINA LOS SUBTITULOS RELACIONADOS CON EL ID DEL MANUAL -->
                        <form action="{{route('subtitle.destroy', $edit_manual->id)}}" method="POST">

                            @csrf 
                            @method('DELETE')

                            <input type="submit" class="btn btn-sm btn-danger float-right mx-1" value="Eliminar subtítulo">

                        </form>

                    </div>

                    @if($edit_manual->imagen['ruta'] !== null)

                    <!-- ACTUALIZA LA IMAGEN RELACIONADA CON EL ID DEL SUBTITULOS -->
                    <form action="{{route('imagen.update', $edit_manual->imagen->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf 
                        @method('PUT')

                        <div>

                            <!-- Botón disparador moda -->
                            <a data-toggle="modal" data-id="{{$edit_manual->imagen->id}}" data-toggle="modal" title="Add this item" class="open-Actualizar_imagen btn btn-sm float-right text text-white" style="background-color:#0058A8;" href="#Actualizar_imagen">Actualizar imagen</a>

                        </div>

                        <!-- Modal -->
                        <div class="modal fade" id="Actualizar_imagen" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalCenterTitle">Actualización de imagenes</h5>
                                    </div>

                                    <div class="modal-body">
                                        <input type="hidden" name="bookId" id="bookId" value="" />

                                        

                                        <div class="row justify-content-center">
                                             
                                            <div>
                                                <img name="imgSalida_actualizar_sub" id="imgSalida_actualizar_sub" src="/images/150.png">
                                             <span class="btn btn-sm btn-success " onclick="$(this).parent().find('input[type=file]').click();desactivar_btn_Actualizar_imagen(this.name,'boton2');">Cargar imagen</span>
                                               <input name="imagen" id="actualizar_img_sub" type="file" accept="image/jpeg" style="display: none;" required>

                                                <button type="button" id="delete_actualizar_img_sub" class="btn btn-sm btn-danger">Eliminar imagen</button>
                                            </div>

                                        </div>

                                        
                                       {{--  <input type="hidden" class="form-control" name="imagenactual" id="imagenactual"> --}}
                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" id="cerrar_acrualizar_img_sub" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                                        <input type="submit" name="boton2" id="boton2" class="btn text text-white" style="background-color:#0058A8;" disabled value="Guardar cambios">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>

                    <div>

                        <!-- ELIMINA LA IMAGEN RELACIONADA CON EL ID DEL SUBTITULOS -->
                        <form action="{{route('imagen.destroy', $edit_manual->imagen->id)}}" method="POST">

                            @csrf 
                            @method('DELETE')

                            <input type="submit" value="Eliminar imagen" class="btn btn-sm btn-danger pull-right float-right mx-1">

                        </form>

                    </div>

                    <div>
                        <!-- PUBLICA LA IMAGEN RELACIONADA CON EL ID DEL SUBTITULOS -->
                        <img src="{{asset($edit_manual->imagen['ruta'])}}" class="rounded float-left" alt="..." width="190" height="70">
                        <br>
                        <br>
                        <br>
                    </div>

                    @elseif($edit_manual->imagen['ruta'] == null)

                    <!-- AÑADIR IMAGEN RELACIONADA CON EL ID DEL SUBTITULOS -->
                    <form action="{{route('imagen.store')}}" method="POST" enctype="multipart/form-data">

                        @csrf

                        <div>
                            <!-- Botón disparador modal -->
                            <a data-toggle="modal" data-id="{{$edit_manual->id}}" data-toggle="modal" title="Add this item" class="open-Añadir_imagen btn btn-sm float-right text text-white" style="background-color:#0058A8;" href="#Anadir_imagen">Añadir imagen</a>

                        </div>
                        <br>
                        <br>

                        <!-- Modal -->
                        <div class="modal fade" id="Anadir_imagen" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalCenterTitle">Añadir de imagenes</h5>
                                    </div>

                                    <div class="modal-body">
                                        <input type="hidden" name="idsubtitle" class="idsubtitle" id="idsubtitle" value="{{$edit_manual->id}}"/>

                                         <center><label><h4>Vista Previa</h4></label></center>

                                         <div class="row justify-content-center">
                                             
                                            <div>
                                                <img name="imgSalida_anadir_sub" id="imgSalida_anadir_sub" src="/images/150.png">
                                             <span class="btn btn-sm btn-success " onclick="$(this).parent().find('input[type=file]').click();desactivar_btn_Añadir_imagen(this.name,'btn_Añadir_imagen');">Cargar imagen</span>

                                                <input name="imagen" id="Anadir_img_sub" type="file" accept="image/jpeg" style="display: none;" required>

                                                <button type="button" id="delete_Anadir_img_sub" class="btn btn-sm btn-danger">Eliminar imagen</button>
                                            </div>

                                         </div>                   

                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" id="cerrar_Anadir_img_sub" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                                        <input type="submit" name="btn_Añadir_imagen" id="btn_Añadir_imagen" class="btn text text-white" style="background-color:#0058A8;" disabled value="Guardar cambios">
                                    </div>
                                </div>
                            </div>
                        </div>

                    </form>

                    @endif @endforeach

                    <!-- CREAR Y GUARDAR NUEVOS SUBTITULOS CON ILUSTRACIÓN -->
                    <form name="form" method="POST" action="{{route('subtitle.store')}}" enctype="multipart/form-data">

                        @csrf

                        <input type="hidden" name="id_manuals" value="{{$edit_manuals[0]->id}}">

                        <br><br>
                        <input type="button" id="show" onclick="mostrarBoton();volver_btn();" value="Nuevo subtítulo" class="btn text text-white btn-sm pull-right float-right" style="background-color:#0058A8;">
                        <a class="btn btn-sm btn-success pull-right float-right mx-1" id="volver" href="{{'/manuals'}}">Volver</a><br>
                        <div id="element" style="display: none;">

                            <div class="content">

                                <div class="form-group">

                                    <label>Subtítulo</label>

                                    <input type="text" name="Subtitulo" class="form-control @error('Subtitulo') is-invalid @enderror Subtitulo" required maxlength="255"> @error('Subtitulo')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span> @enderror

                                </div>

                                <div class="form-group">

                                    <label>Contenido</label>

                                    <textarea name="Contenido" id="campo" class="form-control @error('Contenido') is-invalid @enderror Contenido" rows="10" style="resize:none;" required maxlength="600"></textarea>
                                    <br> @error('Contenido')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span> @enderror

                                    
                                                     
                                        <span class="btn btn-sm btn-success pull-right float-right mx-1" onclick="$(this).parent().find('input[type=file]').click();">Cargar imagen</span>

                                        <input name="imagen" id="Añadir_img2" type="file" accept="image/jpeg" style="display: none;">
                                        <button type="button" id="delete_New_img" class="btn btn-sm btn-danger  pull-right float-right">Eliminar imagen</button>

                                        {{-- <input name="file-input" id="file-input" type="file" /> --}}

                                       <img id="imgSalida" src="/images/150.png" />
                                    
                                </div>
                                <br>

                                <div id="close">
                                    <center>
                                        <a class="btn btn-sm btn-success" id="volver" href="{{'/manuals'}}">Volver</a>
                                        <input type="button" id="hide" onclick="mostrarBotons();volver_btn_mostrar();" value="Cancelar" class="btn btn-sm btn-danger  mx-1">
                                        <input type="submit" class="btn btn-sm text text-white " style="background-color:#0058A8;" value="Guardar subtítulo"> 
                                    </center>
                                </div>
                                <br>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<script src="{{ asset('/js/edit_manual.js') }}"></script>
<script>

////////////////////////////////////////////////////////////////////////////////////////////
//vista previa actualizar la imagen de un suctutulo
$(function() {
  $('#actualizar_img_sub').change(function(e) {
      addImage(e); 
     });

     function addImage(e){
      var file = e.target.files[0],
      imageType = /image.*/;
    
      if (!file.type.match(imageType))
       return;
  
      var reader = new FileReader();
  
      reader.onload = function(e){
         var result=e.target.result;
        $('#imgSalida_actualizar_sub').attr("src",result);
      }
       
      reader.readAsDataURL(file);
     }
    });

//Eliminar vista previa y limpiar input type="file"
$("#delete_actualizar_img_sub").click(function(event) {
    $("#actualizar_img_sub").val(''); //valor del input type"file" lo dejamos en null
    $("#imgSalida_actualizar_sub").attr('src', "/images/150.png");

});

//Eliminar vista previa y limpiar input type="file" al cerrar el modal
$("#cerrar_acrualizar_img_sub").click(function(event) {
    $("#actualizar_img_sub").val(''); //valor del input type"file" lo dejamos en null
    $("#imgSalida_actualizar_sub").attr('src', "/images/150.png");

})
////////////////////////////////////////////////////////////////////////////////////////////


////////////////////////////////////////////////////////////////////////////////////////////
//vista previa añadir imagen a un suctutulo
$(function() {
  $('#Anadir_img_sub').change(function(e) {
      addImage(e); 
     });

     function addImage(e){
      var file = e.target.files[0],
      imageType = /image.*/;
    
      if (!file.type.match(imageType))
       return;
  
      var reader = new FileReader();
  
      reader.onload = function(e){
         var result=e.target.result;
        $('#imgSalida_anadir_sub').attr("src",result);
      }
       
      reader.readAsDataURL(file);
     }
    });

//Eliminar vista previa y limpiar input type="file"
$("#delete_Anadir_img_sub").click(function(event) {
    $("#Anadir_img_sub").val(''); //valor del input type"file" lo dejamos en null
    $("#imgSalida_anadir_sub").attr('src', "/images/150.png");

});

//Eliminar vista previa y limpiar input type="file" al cerrar el modal
$("#cerrar_Anadir_img_sub").click(function(event) {
    $("#Anadir_img_sub").val(''); //valor del input type"file" lo dejamos en null
    $("#imgSalida_anadir_sub").attr('src', "/images/150.png");

});

////////////////////////////////////////////////////////////////////////////////////////////

//////////////////////////////////////////////////////////////////////////////////////////////
//vista previa añadir imagen a un nuevo suctutulo

$(function() {
  $('#Añadir_img2').change(function(e) {
      addImage(e); 
     });

     function addImage(e){
      var file = e.target.files[0],
      imageType = /image.*/;
    
      if (!file.type.match(imageType))
       return;
  
      var reader = new FileReader();
  
      reader.onload = function(e){
         var result=e.target.result;
        $('#imgSalida').attr("src",result);
      }
       
      reader.readAsDataURL(file);
     }
    });

//Eliminar vista previa y limpiar input type="file"
$("#delete_New_img").click(function(event) {
    $("#Añadir_img2").val(''); //valor del input type"file" lo dejamos en null
    $("#imgSalida").attr('src', "/images/150.png");

});

//Eliminar vista previa y limpiar input type="file" al cerrar el modal
$("#hide").click(function(event) {
    $("#Añadir_img2").val(''); //valor del input type"file" lo dejamos en null
    $("#imgSalida").attr('src', "/images/150.png");

});

//////////////////////////////////////////////////////////////////////////////////////////////

</script>

@endsection
@extends('layouts.template')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header text text-white" style="background-color:#0058A8;">
                
                  <a href="{{route('manuales.index')}}" class="text-white"style="text-decoration:none" >
                    <h5>Edición de Manual</h5>
                  </a>

              </div>

          <div class="container alerta-titulo"  id="alerta-titulo" style="display: none">
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

{{--                       @if (count($errors) > 0)
                          <div class="alert alert-danger alert-dismissible fade show" role="alert" id="alerta">
                            
                                <button type="button" name="alerta" class="close" data-dismiss="alert" aria-label="Close">
                                   <span aria-hidden="true">
                                   &times;
                                   </span>
                                </button>

                            <p>Corrige los siguientes errores:</p>
                              <ul>

                                  @foreach ($errors->all() as $message)
                                      <li><strong>{{ $message }}</strong></li>

                                  @endforeach
                              </ul>

                          </div>
                      @endif --}}

              <div class="card-body" style="box-shadow: #999 15px 15px 10px;">

                <div>
                  <form action="{{ route('manuales.update', $edit_manuals[0]->id) }}" method="POST">

                    @csrf
                    @method('PUT')



                    <div class="form-group">

                      <label>Título</label>
                      <input type="text" name="titulo" class="form-control @error('titulo') is-invalid @enderror titulo" value="{{ old('titulo') ?? $edit_manuals[0]->name }}" required maxlength="255">

                      @error('titulo')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror

                    </div>

                    <div class="form-group">

                      <label>Descripción</label>
                      <textarea name="descripcion" class="form-control @error('descripcion') is-invalid @enderror descripcion" rows="10" style="resize:none;"  required maxlength="600">{{ old('descripcion') ?? $edit_manuals[0]->description  }}</textarea>

                      @error('descripcion')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror

                    </div>

                    <br>

                      <input type="submit" class="btn btn-sm float-right text text-white mx-1" style="background-color:#0058A8;" value="Actualizar título">
                         

                  </form>

                </div>

                @foreach($edit_manuals[0]->subtitle as $edit_manual)
                <div>
                  <br><br>

                  <!-- ACTUALIZA LOS SUBTITULOS RELACIONADOS CON EL ID DEL MANUAL -->
                  <form action="{{ route('subtitle.update', $edit_manual->id) }}" method="POST">

                   @csrf
                   @method('PUT')

                    <div class="form-group">

                      <br>
                      <label>Subtítulo</label>
                      <input type="text" name="subtitulo" class="form-control @error('subtitulo') is-invalid @enderror subtitulo"  value="{{ old('subtitulo') ?? $edit_manual->subtitle_name }}" required maxlength="255">

                      @error('subtitulo')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror

                    </div>

                    <div class="form-group">

                      <label>Contenido</label>
                      <textarea name="contenido" class="form-control @error('contenido') is-invalid @enderror contenido" rows="10" style="resize:none;"  required maxlength="600">{{ old('contenido') ?? $edit_manual->subtitle_description  }}</textarea>

                      @error('contenido')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror

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
                            <div class="modal fade" id="Actualizar_imagen" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                              <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalCenterTitle">Actualización de imagenes</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>

                                  <div class="modal-body">
                                    <input type="hidden" name="bookId" id="bookId" value=""/>
                                    <span class="btn btn-sm btn-success " onclick="$(this).parent().find('input[type=file]').click();desactivar_btn_Actualizar_imagen(this.name,'boton2');">Cargar imagen</span>
                                    <input name="imagen" id="imagen" type="file" accept="image/jpeg" style="display: none;" required>
                                  </div>

                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
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
                    <img src="{{asset($edit_manual->imagen['ruta'])}}" class="rounded float-left" alt="..." width="190" height="70"><br><br><br>
                </div>


                  @elseif($edit_manual->imagen['ruta'] == null)

                    <!-- AÑADIR IMAGEN RELACIONADA CON EL ID DEL SUBTITULOS -->
                    <form action="{{route('imagen.store')}}" method="POST" enctype="multipart/form-data">

                         @csrf

                         <div>
                          <!-- Botón disparador modal -->
                          <a data-toggle="modal" data-id="{{$edit_manual->id}}" data-toggle="modal" title="Add this item" class="open-Añadir_imagen btn btn-sm float-right text text-white" style="background-color:#0058A8;" href="#Anadir_imagen">Añadir imagen</a>

                         </div><br><br>

                          <!-- Modal -->
                          <div class="modal fade" id="Anadir_imagen" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalCenterTitle">Añadir de imagenes</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>

                                <div class="modal-body">
                                  <input type="hidden" name="idsubtitle" id="idsubtitle" value="{{$edit_manual->id}}"/>

                                    <span class="btn btn-sm btn-success " onclick="$(this).parent().find('input[type=file]').click();desactivar_btn_Añadir_imagen(this.name,'btn_Añadir_imagen');">Cargar imagen</span>
                                    <input name="imagen" id="imagen" type="file" accept="image/jpeg" style="display: none;" required>
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                                    <input type="submit" name="btn_Añadir_imagen" id="btn_Añadir_imagen" class="btn text text-white" style="background-color:#0058A8;" disabled value="Guardar cambios">
                                </div>
                              </div>
                            </div>
                          </div>

                    </form>

                  @endif

                @endforeach


                <!-- CREAR Y GUARDAR NUEVOS SUBTITULOS CON ILUSTRACIÓN -->
                <form name="form" method="POST" action="{{route('subtitle.store')}}"  enctype = "multipart/form-data" >

                 @csrf

                 <input type="hidden" name="id_manuals" value="{{$edit_manuals[0]->id}}">

                <input  type="button" id="show" onclick="mostrarBoton()" value="Agregar subtítulo" class="btn btn-sm btn-success pull-right float-right">

                <div id="element" style="display: none;"><br>

                   <div class="content">

                           <div class="form-group">

                             <label>Subtítulo</label>

                             <input type="text"  name="Subtitulo" class="form-control @error('Subtitulo') is-invalid @enderror" required maxlength="255">

                             @error('Subtitulo')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                             @enderror


                           </div>

                           <div class="form-group">

                             <label>Contenido</label>

                             <textarea name="Contenido" id="campo" class="form-control @error('Contenido') is-invalid @enderror" rows="10" style="resize:none;" required maxlength="600"></textarea><br>

                              @error('Contenido')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                              @enderror

                             <span class="btn btn-sm  float-right text text-white" style="background-color:#0058A8;" onclick="$(this).parent().find('input[type=file]').click();">

                                  Añadir imagen/.jpeg

                             </span>

                                <input type="file" id="file" name="imagen" accept="image/jpeg"  style="display: none;"><br>

                            </div><br>

                            <div id="close">
                               <center> <input type="button" id="hide" onclick="mostrarBotons()" value="Cerrar" class="btn btn-sm btn-danger  mx-1">
                                <input type="submit" class="btn btn-sm text text-white " style="background-color:#0058A8;" value ="Guardar subtítulo"> </center>
                            </div><br>
                      </div>
                  </div>
                </form> 

<script type="text/javascript">

$(document).ready(function(){
  $("#hide").click(function(){
    $("#element").hide();
  });
  $("#show").click(function(){
    $("#element").show();
  });
});

</script>


<script>

var btn_1 = document.getElementById('show');
        
function mostrarBoton(){

  btn_1.style.display = 'none';

}

function mostrarBotons(){

  btn_1.style.display = 'inline';

}

</script>


                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">

/*

FUNCION PARA GENERAR n CANTIDAD DE CAMPOS TIPO "TEXT" PARA INSERTAR CARACTERES, "FILE" PARA LA CARGA O SUBIR IMAGENES AL SERVIDOR Y "SUBMIT" PARA CONFIRMAR EL ENVIO DE LOS DATOS MEDIANTE EL FORMULARIO.

ESTA FUNCIÓN LA LLAMAMOS DESDE LA SIGUIENTE MANERA:

<input onclick="NOMBRE_DE_LA_FUNCION();" type="button" id="btn-1" value="Agregar subtítulo" class="btn btn-sm btn-success float-right">

 */

     

  {{--function AgregarCampos() {
        var nextinput = 1;
        //nextinput++;

         var content = 

         `<div class="content">

           <div class="form-group">

             <label>Subtítulo</label>

             <input type="text"  class="form-control @error('Subtitulo') is-invalid @enderror" name="Subtitulo[]" required>

             @error('Subtitulo')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
             @enderror


           </div>

           <div class="form-group">

             <label>Contenido</label>

             <textarea name="Contenido[]" id="campo" class="form-control @error('Contenido') is-invalid @enderror" rows="10" style="resize:none;" required></textarea><br>

              @error('Contenido')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror

             <input type="submit" class="btn btn-sm float-right text text-white " style="background-color:#0058A8;" value ="Guardar subtítulo">

             <button type="button" class="btn btn-sm btn-danger pull-right float-right mx-1" >Eliminar Subtitulo</button>

             <span class="btn btn-sm  float-right text text-white" style="background-color:#0058A8;" onclick="$(this).parent().find('input[type=file]').click();">

                  Añadir imagen/.jpeg

             </span>

                <input type="file" id="file" name="imagen2[]" accept="image/jpeg"  style="display: none;"><br>

            </div>

           </div>`

         $("#campos").append(content);
         $("button").click(function() {
           $(this).closest('div.content').remove();
         });

       } --}}
/*

USAMOS ESTE ESCRIPT PARA PASAR EL ID DE LA RELACION EXISTENTE ENTRE IMAGEN Y SUBTITULO, SE ENVIA AL MODAL MEDIANTE data-id="{{--$edit_manual->id--}}", UNA IMAGEN SOLO PUEDE PENECER A UN SUBTITULO Y UN SUBTITULO SOLO PUEDE TENER UNA IMAGEN ES MA RELACION UNO A UNO

PASAMOS EL ID DE LA SIGUIENTE MANERA:

<!-- Botón disparador moda -->
<a data-toggle="modal" data-id="{{--$edit_manual->imagen->id--}}" data-toggle="modal" title="Add this item" class="open-Actualizar_imagen btn btn-sm float-right text text-white" style="background-color:#0058A8;" href="#Actualizar_imagen">Actualizar imagen</a>

CON AYUDA DE ESTE ESCRIPT CONSEGUIMOS PASAR EL ID DE LA IMAGEN QUE GUARDA RELACION CON EL SUBTITULO PARA SU POSTERIOR ACTUALIZACIÓN.


 */  
    
    $(document).on("click", ".open-Actualizar_imagen", function () {

    var myBookId = $(this).data('id');
    $(".modal-body #bookId").val( myBookId );
    $('#Actualizar_imagen').modal('show');

    });

//*******************************************************************


/*

USAMOS ESTE ESCRIPT PARA PASAR EL ID DE LA RELACION SUBTITULO, SE ENVIA AL MODAL MEDIANTE data-id="{{--$edit_manual->id--}}", UNA IMAGEN SOLO PUEDE PENECER A UN SUBTITULO Y UN SUBTITULO SOLO PUEDE TENER UNA IMAGEN ES MA RELACION UNO A UNO

PASAMOS EL ID DE LA SIGUIENTE MANERA:

<!-- Botón disparador modal -->
<a data-toggle="modal" data-id="{{--$edit_manual->id--}}" data-toggle="modal" title="Add this item" class="open-Añadir_imagen btn btn-sm float-right text text-white" style="background-color:#0058A8;" href="#Anadir_imagen">Añadir imagen</a>

CON AYUDA DE ESTE ESCRIPT CONSEGUIMOS AÑADIR LA ILUSTRACIÓN (IMAGEN) PARA CADA SUBTITULO.

 */

    $(document).on("click", ".open-Añadir_imagen", function () {

    var myidsubtitle = $(this).data('id');
    $(".modal-body #idsubtitle").val( myidsubtitle );
    $('#Anadir_imagen').modal('show');

    });

//**************************************************************

/*

CON ESTE ESCRIPT PODEMOS DESACTIVAR O ACTIVAR EL BOTON QUE ES ENCUENTRA EN EL MODAL SI CARGAMOS LA IMAGEN EL BOTON DE GUADADO SE ACTIVA CASO CONTRARIO PERMANECERA DESACIVADO HASTA QUE SE ENCUENTRE EL CAMPO FILE LLENO*/

function desactivar_btn_Actualizar_imagen(name,nombreBotones){

    var partesBotones = nombreBotones.split(",");

    var boton = document.getElementById(partesBotones);

    if(boton.name == name)boton.disabled = false;

    else boton.disabled = false;

}

//************************************************************

/*

CON ESTE ESCRIPT PODEMOS DESACTIVAR O ACTIVAR EL BOTON QUE ES ENCUENTRA EN EL MODAL SI CARGAMOS LA IMAGEN EL BOTON DE GUADADO SE ACTIVA CASO CONTRARIO PERMANECERA DESACIVADO HASTA QUE SE ENCUENTRE EL CAMPO FILE LLENO*/

function desactivar_btn_Añadir_imagen(name,nombreBotones){

    var partesBotones = nombreBotones.split(",");

    var boton = document.getElementById(partesBotones);

    if(boton.name == name)boton.disabled = false;

    else boton.disabled = false;

}

//**********************************************************

$(document).ready(function() {
  $('input[name="titulo"]').keyup(function(){
    console.log('titulo')
    let texto = $('input[name="titulo"]').val()
    if (texto.length === 255) {
      // alert('El campo titulo debe poseer maximo 255 carácteres')
      $('.alerta-titulo').css('display','inline');
      $('#alerta-titulo').fadeOut(6000);
    }
  })
})

$(document).ready(function() {
  $('.descripcion').keyup(function(){
    let descripcion = $('.descripcion').val()
    console.log(descripcion.length)
    if (descripcion.length === 600) {
      // alert('El campo descripción debe poseer maximo 600 carácteres')
      $('.alerta-descripcion').css('display','inline');
      $('#alerta-descripcion').fadeOut(6000);
    }
  })
})
//**********************************************************
$(document).ready(function() {
  $('input[name="subtitulo"]').keyup(function(){
    console.log('subtitulo')
    let texto = $('input[name="subtitulo"]').val()
    if (texto.length === 255) {
      // alert('El campo titulo debe poseer maximo 255 carácteres')
      $('.alerta-subtitulo').css('display','inline');
      $('#alerta-subtitulo').fadeOut(6000);
    }
  })
})

$(document).ready(function() {
  $('.contenido').keyup(function(){
    let contenido = $('.contenido').val()
    console.log(contenido.length)
    if (contenido.length === 600) {
      // alert('El campo descripción debe poseer maximo 600 carácteres')
      $('.alerta-contenido').css('display','inline');
      $('#alerta-contenido').fadeOut(6000);
    }
  })
})
//**********************************************************
</script>

{{--@include('Manuales.form_create_and_update.form_update')--}}

<!--input name="boton1" id="boton1" type="button" value="Boton 1" onclick="desactivar(this.name,'boton1,boton2,boton3')" />
<input name="boton2" id="boton2" type="button" value="Boton 2" onclick="desactivar(this.name,'boton1,boton2,boton3')"/>
<input name="boton3" id="boton3" type="button" value="Boton 3" onclick="desactivar(this.name,'boton1,boton2,boton3')" />
 
<script type="text/javascript">
//Esta funcion servira, pone en nombreBotones los nombres de los botones separados por coma como se ve en el ejemplo de arriba
function desactivar(name,nombreBotones){
    var partesBotones = nombreBotones.split(",");
    for(i=0;i<partesBotones.length;i++){
        var boton = document.getElementById(partesBotones[i]);
        if(boton.name == name)boton.disabled = false;
        else boton.disabled = true;

      <span class="btn btn-sm btn-success " onclick="$(this).parent().find('input[type=file]').click();">Cargar imagen</span>

       <input type="file" id="file" name="imagen" accept="image/jpeg" style="display: none;">

    <p>Link 1</p>
<a data-toggle="modal" data-id="{{--$edit_manual->imagen->id--}}" data-toggle="modal" title="Add this item" class="open-AddBookDialog btn btn-primary" href="#addBookDialog">test</a>

<div class="modal hide" id="addBookDialog">
 <div class="modal-header">
    <button class="close" data-dismiss="modal">×</button>
    <h3>Modal header</h3>
  </div>
    <div class="modal-body">
        <input type="hidden" name="bookId" id="bookId" value=""/>

         <span class="btn btn-sm btn-success " onclick="$(this).parent().find('input[type=file]').click();desactivar(this.name,'boton2');">Cargar imagen</span>

       <input name="imagen" id="imagen" type="file" accept="image/jpeg" style="display: none;">

    </div>
    <input name="boton2" id="boton2" type="submit" class="btn btn-sm btn-dark" value="Actualizar imagen" disabled style="position:absolute;right:308px;margin-top: -0px">
    </div-->

{{-- <script>
$(document).ready(function(){
    $(".alerta-titulo").fadeOut(5000);
    //$("#alerta-titulo").fadeOut(5000);
    //$("#alerta-descripcion").fadeOut(5000);
});
</script> --}}

      

@endsection
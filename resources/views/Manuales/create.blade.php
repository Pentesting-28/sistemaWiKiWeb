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
    <div class="row justify-content-center" >
        <div class="col-md-12" >
            <div class="card">
                <div class="card-header text text-white" style="background-color:#0058A8;">

                  <h5>Creación de Manual</h5>

                </div>

                <div class="card-body" style="box-shadow: #999 15px 15px 10px;"> 

                    <form name="form" method="POST" action="{{route('manuales.store')}}"  enctype = "multipart/form-data" >

                      @csrf

                      <div class="form-group">

                            <label>Título</label>
                            <input type="text" name="titulo" class="form-control @error('titulo') is-invalid @enderror" value="{{ old('titulo') }}" required maxlength="255">

                             @error('titulo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            

                        </div>

                        <div class="form-group">

                            <label>Descripción</label>
                            <textarea name="descripcion" class="form-control @error('descripcion') is-invalid @enderror" rows="10" style="resize:none;" required autocomplete="descripción" autofocus maxlength="600">{{old('descripcion')}}</textarea>

                             @error('descripcion')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror

                      </div><br>

                      <div class="form-group">
                        
                        <center>
                          <a class="btn btn-sm btn-success" id="volver" href="javascript: history.go(-1)">Volver</a>
                          <input type="submit" id="guardar" class="btn btn-sm text text-white" value="Guardar Manual" style="background-color:#0058A8;">
                        </center>
                        
                      </div>

                      <div class="btn-group btn-sm pull-right float-right" role="group" aria-label="Basic example">
                         {{-- <span>Agregar subtitulos:</span> --}}
                          <input type="number" id="member" min="1" pattern="^[0-9]+">
                          <input type="button" id="show" onclick="guardar_ocultar();volver_ocultar();Agregar_subtitulos();" value="Agregar subtitulos" class="btn btn-sm btn-success mx-1">
                      </div><br><br>

                       <div id="element" style="display: none;"><br>

                               <div id="container"></div>

                               <div id="close">
                                  <center>
                                    <a class="btn btn-sm btn-success" id="volver" href="{{'/manuals'}}">Volver</a> 
                                    <input type="button" id="hide" onclick="volver_mostrar();mostrarBotons();guardar_mostrar();" value="Cancelar" class="btn btn-sm btn-danger  mx-1">
                                    <input type="submit" id="guardar2" class="btn btn-sm text text-white " style="background-color:#0058A8;" value ="Guardar manual"> 
                                  </center>
                              </div><br>
                       </div>  
                  </div>
                  <input type="hidden" name="author" value="{{Auth::user()->email}}">
               </form> 
            </div>
        </div>
    </div>
</div>

<script src="{{ asset('/js/create_manual.js') }}"></script>

<script type="text/javascript">

  function Agregar_subtitulos(){

    var number = parseInt(document.getElementById('member').value);
    // console.log(number);
    // var i;
    // Contenedor <div> donde se colocará el contenido dinámico
    // var container  = document.getElementById("container");
    var container = document.getElementById('container');
    //Borrar los contenidos anteriores del contenedor

    while (container.hasChildNodes()){

        container.removeChild(container.lastChild);
    }

    for (let i=0; i<number;i++){
      var cont = 0;
      var content =`<div class="alert alert-warning" role="alert">

                      <ul>
                        <li>El campo Subtitulo debe contener al menos 5 caracteres.</li>
                        <li>El campo Contenido debe contener al menos 5 caracteres.</li>
                      </ul>

                    </div>`

      $("#container").append(content);

      var label_sub1        = document.createElement('label');/* Label  Nombre */
      label_sub1.innerHTML  = 'Nombre';
      label_sub1.id         = 'i';
      document.getElementById('container').appendChild(label_sub1);

      
      var br1        = document.createElement('br');/* br salto de linea */
      br1.id         = 'i';
      document.getElementById('container').appendChild(br1);


      var nombre_sub       = document.createElement('input');/* input  Nombre */
      nombre_sub.type      = "text";
      nombre_sub.name      = 'Subtitulo[]';
      nombre_sub.id        = 'i';
      nombre_sub.className = "form-control";
      nombre_sub.required  = true;
      document.getElementById('container').appendChild(nombre_sub);


      var br2        = document.createElement('br');/* br salto de linea */
      br2.id         = 'i';
      document.getElementById('container').appendChild(br2);
      

      var label_sub2        = document.createElement('label');/* Label  Contenido */
      label_sub2.innerHTML  = 'Contenido';
      label_sub2.id         = 'i';

      document.getElementById('container').appendChild(label_sub2);

      
      var contenido_sub       = document.createElement('textarea');/* textarea  Contenido */
      contenido_sub.type      = "text";
      contenido_sub.name      = 'Contenido[]';
      contenido_sub.rows      = '10';
      contenido_sub.id        = 'i';
      contenido_sub.className = "form-control";
      contenido_sub.required  = true;
      contenido_sub.style     = "resize:none;";
      document.getElementById('container').appendChild(contenido_sub);


      var br3      = document.createElement('br');/* br salto de linea */
          br3.id   = 'i';
      document.getElementById('container').appendChild(br3);


      // var imagen_span      = document.createElement('span');/* span input file */
      // imagen_span.className= "btn btn-sm btn-primary float-right";
      // imagen_span.style    = "background-color:#0058A8;";
      // imagen_span.innerHTML= "Añadir imagen/.jpeg";
      // imagen_span.onclick  = function () {$(this).parent().find('input[type=file]').click();}
      // document.getElementById('container').appendChild(imagen_span);


      var imagen_sub           = document.createElement('input');/* input  img*/
          imagen_sub.type      = "file";
          imagen_sub.name      = 'imagen[]';
          imagen_sub.accept    = 'image/jpeg';
          imagen_sub.id        = 'imagen' + i;
          imagen_sub.onchange  = "handleFiles(this.files)"
          imagen_sub.style     = "background-color:#0058A8;";
          imagen_sub.className = "imagen btn btn-sm btn-primary float-right";

      var imagen_sub_img           = document.createElement('img');/* input  img*/
          imagen_sub_img.id        = 'imgSalida' + i;

      document.getElementById('container').appendChild(imagen_sub);
      document.getElementById('container').appendChild(imagen_sub_img);
      // <input name="file-input" id="file-input" type="file" />
      //    <br />
      //    <img id="imgSalida" width="50%" height="50%" src="" />
 

            // console.log(i,'cantidad de imagen')
      // if (i === cont) {
      //       console.log(cont,'contador inicial')

      //       cont++
      //       console.log(cont,'contador final')

        $(function() {

        $('#imagen'+i).change(function(e) {
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

              $('#imgSalida'+i).attr("src",result);
            }
             
            reader.readAsDataURL(file);
           }
          });
      // }
      

        var img            = document.createElement('div');/* input  Nombre */
            img.id         = i;
            img.className = "preview";
            // img.src   = "https://via.placeholder.com/150";
            // img.alt   = "Tu imagen";

        document.getElementById('container').appendChild(img);

        var br4        = document.createElement('br');/* br salto de linea */
            br4.id     = 'i';

        document.getElementById('container').appendChild(br4);

        var br5        = document.createElement('br');/* br salto de linea */
            br5.id     = 'i';
        document.getElementById('container').appendChild(br5);

    }
  };
        
</script>

<!--script type="text/javascript">

  //Agregar subtitulos


  
   function Agregar_subtitulos(){
    // Número de entradas para crear
    var number = document.getElementById("member").value;
    // Contenedor <div> donde se colocará el contenido dinámico
    // var container  = document.getElementById("container");
    var containerr = document.getElementById("container");
    // Borrar los contenidos anteriores del contenedor
    // while (container.hasChildNodes()) {

    //     container.removeChild(container.lastChild);
    // }
    for (i=0;i<number;i++){

         var content = 

         `<div class="content">
         
           <div class="form-group">
           
             <div class="alert alert-warning" role="alert">

                <ul>
                  <li>El campo Subtitulo debe contener al menos 5 caracteres.</li>
                  <li>El campo Contenido debe contener al menos 5 caracteres.</li>
                </ul>

             </div>

             <label>Subtítulo</label>

             <input type="text"  class="form-control @error('Subtitulo') is-invalid @enderror" name="Subtitulo[]" required maxlength="255">

             @error('Subtitulo')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
             @enderror


           </div>

           <div class="form-group">

             <label>Contenido</label>

             <textarea name="Contenido[]" id="campo" class="form-control @error('Contenido') is-invalid @enderror" rows="10" style="resize:none;" required maxlength="600"></textarea><br>

              @error('Contenido')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror

             <button type="button" class="btn btn-sm btn-danger pull-right float-right mx-1" >Eliminar Subtitulo</button>

                <span onclick="$(this).parent().find('input[type=file]').click();" class="btn btn-sm btn-primary float-right" style="background-color:#0058A8;">

                    Añadir imagen/.jpeg

                </span>

                <input type="file" id="imgInp"  name="imagen[]" accept="image/jpeg" style="display: none;">
                
              <img id="blah" src="https://via.placeholder.com/150" class="rounded float-left" alt="..." width="190" height="70"><br><br><br><br><br>
               

             </div>

           </div>`
  
        $("#container").append(content);
        $("button").click(function() {

          $(this).closest('div.content').remove();

        });


      }
    }

</script-->

{{-- <form id="form1">
  <input type='file' id="imgInp" />
  <br>
  <img id="blah" src="https://via.placeholder.com/150" alt="Tu imagen" />
</form>  --}}
<!--script type="text/javascript">
  function readImage (input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function (e) {
          $('#blah').attr('src', e.target.result); // Renderizamos la imagen
      }
      reader.readAsDataURL(input.files[0]);
    }
  }

  $("#imgInp").change(function () {
    // Código a ejecutar cuando se detecta un cambio de archivO
    readImage(this);
  });
</script-->

{{-- <div id="divInputLoad">
    <h1>Test it uploading your own image</h1>
    <div id="divFileUpload">
        <input id="file-upload" type="file" accept="image/*" />
    </div>
    <div id="file-preview-zone">
    </div>
</div>

<script>
    function readFile(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
 
            reader.onload = function (e) {
                var filePreview = document.createElement('img');
                filePreview.id = 'file-preview';
                //e.target.result contents the base64 data from the image uploaded
                filePreview.src = e.target.result;
                console.log(e.target.result);
 
                var previewZone = document.getElementById('file-preview-zone');
                previewZone.appendChild(filePreview);
            }
 
            reader.readAsDataURL(input.files[0]);
        }
    }
 
    var fileUpload = document.getElementById('file-upload');
    fileUpload.onchange = function (e) {
        readFile(e.srcElement);
    }
 
</script> --}}
@endsection
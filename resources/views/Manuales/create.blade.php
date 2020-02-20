@extends('layouts.template')

@section('content')
<style type="text/css">
    img{
  width: 100PX;
  height: 100px;
  margin: 10px;
}
  [type="file"] {
  height: 0;
  overflow: hidden;
  width: 0;
}
</style>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header text text-white" style="background-color:#0058A8;">
                    <h5>
                        Creación de Manual
                    </h5>
                </div>
                <div class="card-body" style="box-shadow: #999 15px 15px 10px;">
                    <form action="{{route('manuales.store')}}" enctype="multipart/form-data" method="POST" name="form">
                        @csrf
                        <div class="form-group">
                            <label>
                                Título
                            </label>
                            <input class="form-control @error('titulo') is-invalid @enderror" maxlength="255" name="titulo" required="" type="text" value="{{ old('titulo') }}">
                                @error('titulo')
                                <span class="invalid-feedback" role="alert">
                                    <strong>
                                        {{ $message }}
                                    </strong>
                                </span>
                                @enderror
                            </input>
                        </div>
                        <div class="form-group">
                            <label>
                                Descripción
                            </label>
                            <textarea autocomplete="descripción" autofocus="" class="form-control @error('descripcion') is-invalid @enderror" maxlength="600" name="descripcion" required="" rows="10" style="resize:none;">
                                {{old('descripcion')}}
                            </textarea>
                            @error('descripcion')
                            <span class="invalid-feedback" role="alert">
                                <strong>
                                    {{ $message }}
                                </strong>
                            </span>
                            @enderror
                        </div>
                        <br>
                            <div class="form-group">
                                <center>
                                    <a class="btn btn-sm btn-success" href="javascript: history.go(-1)" id="volver">
                                        Volver
                                    </a>
                                    <input class="btn btn-sm text text-white" id="guardar" style="background-color:#0058A8;" type="submit" value="Guardar Manual">
                                    </input>
                                </center>
                            </div>
                            <div aria-label="Basic example" class="btn-group btn-sm pull-right float-right" role="group">
                                {{--
                                <span>
                                    Agregar subtitulos:
                                </span>
                                --}}
                                <input id="member" min="1" pattern="^[0-9]+" type="number">
                                    <input class="btn btn-sm btn-success mx-1" id="show" onclick="guardar_ocultar();volver_ocultar();Agregar_subtitulos();" type="button" value="Agregar subtitulos">
                                    </input>
                                </input>
                            </div>
                            <br>
                                <br>
                                    <div id="element" style="display: none;">
                                        <br>
                                            <div id="content">
                                            </div>
                                            <div id="close">
                                                <center>
                                                    <a class="btn btn-sm btn-success" href="{{'/manuals'}}" id="volver">
                                                        Volver
                                                    </a>
                                                    <input class="btn btn-sm btn-danger mx-1" id="hide" onclick="volver_mostrar();mostrarBotons();guardar_mostrar();" type="button" value="Cancelar">
                                                        <input class="btn btn-sm text text-white " id="guardar2" style="background-color:#0058A8;" type="submit" value="Guardar manual">
                                                        </input>
                                                    </input>
                                                </center>
                                            </div>
                                            <br>
                                            </br>
                                        </br>
                                    </div>
                                </br>
                            </br>
                        </br>
                    </form>
                </div>
                <input name="author" type="hidden" value="{{Auth::user()->email}}">
                </input>
            </div>
        </div>
    </div>
</div>
<script src="{{ asset('/js/create_manual.js') }}">
</script>
<script type="text/javascript">
    function Agregar_subtitulos(){

    var number = parseInt(document.getElementById('member').value);
    // console.log(number);
    // var i;
    // Contenedor <div> donde se colocará el contenido dinámico
    // var container  = document.getElementById("container");
    var container = document.getElementById('content');
    //Borrar los contenidos anteriores del contenedor

    while (container.hasChildNodes()){

        container.removeChild(container.lastChild);
    }

    for (let i=0; i<number;i++){

      var cont = 0;

      var padre = document.createElement('div');
          padre.id = "con"+i;
          padre.className = "content alert alert-warning", role="alert";

      var ul    = document.createElement('ul');
          ul.id = "ul"+i;

      var li_1           = document.createElement('li');
          li_1.innerHTML = "El campo Subtitulo debe contener al menos 5 caracteres.";
          li_1.id        = "li_1"+i;

      var li_2           = document.createElement('li');
          li_2.innerHTML = "El campo Contenido debe contener al menos 5 caracteres.";
          li_2.id        = "li_2"+i;

          container.appendChild(padre);
          padre.appendChild(ul);
          ul.appendChild(li_1);
          ul.appendChild(li_2);
      

      var label_sub1           = document.createElement('label');/* Label  Nombre */
          label_sub1.innerHTML = 'Nombre';
          label_sub1.id        = 'label_sub'+i;
      document.getElementById('content').appendChild(label_sub1);

      
      var br1    = document.createElement('br');/* br salto de linea */
          br1.id = 'br1'+ i;
      document.getElementById('content').appendChild(br1);


      var nombre_sub           = document.createElement('input');/* input  Nombre */
          nombre_sub.type      = "text";
          nombre_sub.name      = 'Subtitulo[]';
          nombre_sub.id        = 'nombre_sub' + i;
          nombre_sub.className = "Subtitulo form-control";
          nombre_sub.required  = true;
      document.getElementById('content').appendChild(nombre_sub);


      var br2    = document.createElement('br');/* br salto de linea */
          br2.id = 'br2'+i;
      document.getElementById('content').appendChild(br2);
      

      var label_sub2           = document.createElement('label');/* Label  Contenido */
          label_sub2.innerHTML = 'Contenido';
          label_sub2.id        = 'label_sub2'+i;

      document.getElementById('content').appendChild(label_sub2);

      
      var contenido_sub           = document.createElement('textarea');/* textarea  Contenido */
          contenido_sub.type      = "text";
          contenido_sub.name      = 'Contenido[]';
          contenido_sub.rows      = '10';
          contenido_sub.id        = 'contenido_sub'+ i;
          contenido_sub.className = "Contenido form-control";
          contenido_sub.required  = true;
          contenido_sub.style     = "resize:none;";
      document.getElementById('content').appendChild(contenido_sub);


      var br3    = document.createElement('br');/* br salto de linea */
          br3.id = 'i';
      document.getElementById('content').appendChild(br3);

      var delete_subtitle           = document.createElement('button');
          delete_subtitle.innerHTML = "Eliminar subtitulo"; 
          delete_subtitle.type      = "button";
          delete_subtitle.id        = "delete_subtitle" + i;
          delete_subtitle.className = "btn btn-sm btn-danger pull-right float-right";

      document.getElementById('content').appendChild(delete_subtitle);


      var delete_img           = document.createElement('button');
          delete_img.innerHTML = "Eliminar imagen"; 
          delete_img.type      = "button";
          delete_img.id        = "delete_img" + i;
          delete_img.className = "btn btn-sm pull-right float-right mx-1 text text-white";
          delete_img.style     = "background-color: #717171";

      document.getElementById('content').appendChild(delete_img);

      var label_img           = document.createElement('label');/* Label btn input type="file" */
          label_img.innerHTML = 'Cargar imagen';
          label_img.id        = 'label_img'+i;
          label_img.for       = "imagen";
          label_img.className = "btn btn-sm btn-success pull-right float-right";

      var imagen_sub           = document.createElement('input');/* input files*/
          imagen_sub.type      = "file";
          imagen_sub.name      = 'imagen[]';
          imagen_sub.accept    = 'image/jpeg';
          imagen_sub.id        = 'imagen'+i;
          imagen_sub.style     = "visibility:hidden";


      var imagen_sub_img           = document.createElement('img');/* input  img*/
          imagen_sub_img.id        = 'imgSalida' + i;
          imagen_sub_img.src       = "/images/150.png";
          imagen_sub_img.className = "rounded";

       label_img.appendChild(imagen_sub);
       document.getElementById('content').appendChild(label_img);

      var br6    = document.createElement('br');/* br salto de linea */
          br6.id = 'br6'+i;

      document.getElementById('content').appendChild(br6);

      document.getElementById('content').appendChild(imagen_sub_img);

        $(function() {

          $('#imagen'+i).change(function(e) {
              addImage(e); 
             });

          function addImage(e){
            var file = e.target.files[0],imageType = /image.*/;
        
              if (!file.type.match(imageType))
              return;

              var reader = new FileReader();
      
                reader.onload = function(e){
                  var result=e.target.result;

                  var resul = $('#imgSalida'+i).attr("src",result);
                }
           
          reader.readAsDataURL(file);

         }
          });

      var br4    = document.createElement('br');/* br salto de linea */
          br4.id = 'br4'+i;

      document.getElementById('content').appendChild(br4);

      var br5    = document.createElement('br');/* br salto de linea */
          br5.id = 'br5'+i;

      document.getElementById('content').appendChild(br5);

        $("#delete_img"+ i).click(function(event) {
        $("#imagen"+ i).val(''); //valor del input type"file" lo dejamos en null
        $("#imgSalida"+ i).attr('src', "/images/150.png");

        });

        $("#delete_subtitle" + i).click(function() {
          $("#label_sub"+ i).remove();
          $("#br1"+ i).remove();
          $("#nombre_sub"+ i).remove();
          $("#br2"+ i).remove();
          $("#label_sub2"+ i).remove();
          $("#contenido_sub"+ i).remove();
          $("#br3"+ i).remove();
          $("#delete_subtitle"+ i).remove();
          $("#delete_img" + i).remove();
          $("#label_img" + i).remove();
          $("#imagen"+ i).remove();
          $("#imgSalida"+ i).remove();
          $("#br4"+ i).remove();
          $("#br5"+ i).remove();
          $("#br6"+ i).remove();
          $("#ul"+ i).remove();
          $("#li_1"+ i).remove();
          $("#li_2"+ i).remove();
          $("#con"+ i).remove();

        });

        /*La función getElementsByClassName devuelve una lista "viva" de los elementos del HTML,
        a lo que me refiero es que si eliminas un elemento del HTML también lo eliminas de la
        lista y esto interfiere con la iteración porque los índices cambian. Una manera de solucionarlo
        es creando una copia de la lista antes de iterar.*/

        document.getElementById('hide').addEventListener('click', (e) => {
          let cupcakes = Array.prototype.slice.call(document.getElementsByClassName("Subtitulo"), 0);
          let cupcakes2 = Array.prototype.slice.call(document.getElementsByClassName("Contenido"), 0);
          
          for(element of cupcakes){
            //console.log(element);
            element.remove();
          }

          for(element2 of cupcakes2){
            //console.log(element2);
            element2.remove();
          }

        });

    }
  }
</script>
@endsection

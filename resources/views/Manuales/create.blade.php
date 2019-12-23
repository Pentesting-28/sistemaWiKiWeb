@extends('layouts.template')

@section('content')

<div class="container">
    <div class="row justify-content-center" >
        <div class="col-md-12" >
            <div class="card">
                <div class="card-header text text-white" style="background-color:#0058A8;">

                  <a href="{{route('manuales.index')}}" class="text-white"style="text-decoration:none" ><h5>Creación de Manual</h5></a>

                </div>

                      {{-- @if (count($errors) > 0)
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

                      {{-- div id="campos" class="form-group"></div><br>

                       <div class="form-group" align="right" style="/*position:absolute;right:170px;margin-top: -9%*/">
                        <input onclick="AgregarCampos();" type="button" value="Agregar Subtítulo" class="btn btn-sm btn-success pull-right float-right"><br><br>
                      </div --}}

                      <div class="form-group">

                        <center><input type="submit" id="guardar" class="btn btn-sm text text-white" value="Guardar Manual" style="background-color:#0058A8;"></center>

                      </div>

                      <div class="btn-group btn-sm pull-right float-right" role="group" aria-label="Basic example">
                          <span>Agregar subtitulos:</span>
                          <input type="number" id="member">
                          <input type="button" id="show" onclick="guardar_ocultar();addFields();" value="Agregar" class="btn btn-sm btn-success mx-1">
                      </div><br><br>

                       <div id="element" style="display: none;"><br>

                               <div id="container"/></div>

                               <div id="close">
                                    <center> <input type="button" id="hide" onclick="mostrarBotons();guardar_mostrar();" value="Cerrar" class="btn btn-sm btn-danger  mx-1">
                                    <input type="submit" id="guardar2" class="btn btn-sm text text-white " style="background-color:#0058A8;" value ="Guardar manual"> </center>
                              </div><br>
                            
                       </div>  
                  </div>
               </form> 
            </div>
        </div>
    </div>
</div>

<script type='text/javascript'>

  function addFields(){
    // Number of inputs to create
    var number = document.getElementById("member").value;
    // Container <div> where dynamic content will be placed
    // var container  = document.getElementById("container");
    var containerr = document.getElementById("container");
    // Clear previous contents of the container
    while (container.hasChildNodes()) {
        container.removeChild(container.lastChild);
    }
    for (i=0;i<number;i++){

         var content = 

         `<div class="content">

           <div class="form-group">

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

                <input type="file" id="file" name="imagen[]" accept="image/jpeg" style="display: none;"><br>

             </div>

           </div>`
  
        $("#container").append(content);
        $("button").click(function() {

          $(this).closest('div.content').remove();

        });

      }
    }
</script>

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
var btn_2 = document.getElementById('guardar');

function mostrarBoton() {
  
  btn_1.style.display = 'none';

}

function mostrarBotons() {

  btn_1.style.display = 'inline';

}

function guardar_ocultar(){
  
  btn_2.style.display = 'none';

}

function guardar_mostrar(){

  btn_2.style.display = 'inline';

}
     
</script>

<script>
$(document).ready(function(){
    $("#alerta").fadeOut(5000);
});
</script>

@endsection

{{-- <script type="text/javascript">
    
    var nextinput = 0;

       function AgregarCampos() {

         nextinput++;

         var content = 

         `<div class="content">

           <div class="form-group">

             <label>Subtítulo</label>

             <input type="text"  class="form-control @error('subtítulo') is-invalid @enderror" name="subtítulo[]" required>

             @error('subtítulo')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
             @enderror


           </div>

           <div class="form-group">

             <label>Contenido</label>

             <textarea name="contenido[]" id="campo" class="form-control @error('contenido') is-invalid @enderror" rows="10" style="resize:none;" required></textarea><br>

              @error('contenido')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror

            <div style="position:absolute;right:942px;margin-top: -0px">

               <span class="btn btn-sm btn-success" onclick="$(this).parent().find('input[type=file]').click();">

                  Añadir imagen/.jpeg

               </span>

                <input type="file" id="file" name="imagen[]" accept="image/jpeg"  style="display: none;">
            </div>

             <button type="button" class="btn btn-sm btn-danger pull-right float-right" >Eliminar Subtitulo</button><br>

             </div>

           </div>`
  
         $("#campos").append(content);
         $("button").click(function() {
           $(this).closest('div.content').remove();
         });

       }
</script> --}}


<!--script type="text/javascript">

        function agregar()
        {  

            var i = 0;

            var label_sub1        = document.createElement('label');/* Label  Nombre */
            label_sub1.innerHTML  = 'Nombre';
            label_sub1.id         = 'i';
            document.getElementById('padre').appendChild(label_sub1);

            
            var br1        = document.createElement('br');/* br salto de linea */
            br1.id         = 'i';
            document.getElementById('padre').appendChild(br1);


            var nombre_sub       = document.createElement('input');/* input  Nombre */
            nombre_sub.type      = "text";
            nombre_sub.name      = 'name_sub1[]';
            nombre_sub.id        = 'i';
            nombre_sub.className = "form-control";
            document.getElementById('padre').appendChild(nombre_sub);


            var br2        = document.createElement('br');/* br salto de linea */
            br2.id         = 'i';
            document.getElementById('padre').appendChild(br2);
            

            var label_sub2        = document.createElement('label');/* Label  Contenido */
            label_sub2.innerHTML  = 'Contenido';
            label_sub2.id         = 'i';

            document.getElementById('padre').appendChild(label_sub2);

            
            var contenido_sub       = document.createElement('textarea');/* textarea  Contenido */
            contenido_sub.type      = "text";
            contenido_sub.name      = 'contenido_sub1[]';
            contenido_sub.rows      = '10';
            contenido_sub.id        = 'i';
            contenido_sub.className = "form-control";
            document.getElementById('padre').appendChild(contenido_sub);


            var br3        = document.createElement('br');/* br salto de linea */
            br3.id         = 'i';
            document.getElementById('padre').appendChild(br3);

            //if (si = 1) {}

            var imagen_sub       = document.createElement('input');/* input  Nombre */
            imagen_sub.type      = "file";
            imagen_sub.name      = 'imagen[]';
            imagen_sub.id        = 'file';
            imagen_sub.accept    = 'image/jpeg';

            //imagen_sub.className = "form-control";
            document.getElementById('padre').appendChild(imagen_sub);

            var br4        = document.createElement('br');/* br salto de linea */
            br4.id         = 'i';

            document.getElementById('padre').appendChild(br4);

            var br5        = document.createElement('br');/* br salto de linea */
            br5.id         = 'i';
            document.getElementById('padre').appendChild(br5);

            i = i+1;

            console.log(document.getElementsByName('imagen[]'))

        }

            function eliminar(id){
            /*Eliminando un elemento específico cuando se conoce su nodo padre
            var d = document.getElementById("padre");
            var d_nested = document.getElementById("hijo");
            var throwawayNode = d.removeChild(d_nested); */
            }

    </script-->
    <!--div id="padre" class="form-group" ></div>

   <input type="button" class="btn btn-sm btn-primary pull-right float-right " value="Agregar subtitulo"  onclick="agregar()"><br><br-->

                      
                      {{--@include('Manuales.form_create_and_update.form_create')--}}



{{--$nombre_archivo = $photo[$i]->getClientOriginalName();--}}
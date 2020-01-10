@extends('layouts.template')

@section('content')

<div class="container">
    <div class="row justify-content-center" >
        <div class="col-md-12" >
            <div class="card">
                <div class="card-header text text-white" style="background-color:#0058A8;">

                  <a href="{{route('manuales.index')}}" class="text-white"style="text-decoration:none" ><h5>Creación de Manual</h5></a>

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

                        <center><input type="submit" id="guardar" class="btn btn-sm text text-white" value="Guardar Manual" style="background-color:#0058A8;"></center>

                      </div>

                      <div class="btn-group btn-sm pull-right float-right" role="group" aria-label="Basic example">
                          <span>Agregar subtitulos:</span>
                          <input type="number" id="member">
                          <input type="button" id="show" onclick="guardar_ocultar();Agregar_subtitulos();" value="Agregar" class="btn btn-sm btn-success mx-1">
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

<script src="{{ asset('/js/create_manual.js') }}"></script>

<script type="text/javascript">

  //Agregar subtitulos
  
   function Agregar_subtitulos(){
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

@endsection
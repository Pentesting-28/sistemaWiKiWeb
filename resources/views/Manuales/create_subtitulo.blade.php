@extends('layouts.template')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header text text-white" style="background-color:rgb(47, 155, 255);">Creación de Manual</div>
                <div class="card-body" style="box-shadow: #999 15px 15px 10px;">

                  <form name="form" method="POST" action="{{route('manuales.store_subtitle')}}" >

                     @csrf

                         <div class="form-group">

                          <i class="fas fa-pencil-alt prefix"> Subtitulo del Manual </i>
                          <input type="text" class="form-control" id="subtitle_name" name="subtitle_name" placeholder="Example servidor" required>

                         </div>

                         <!--Textarea with icon prefix-->
                        <div class="form-group">

                          <i class="fas fa-pencil-alt prefix"> Contenido</i>
                          <textarea name="subtitle_description" class="md-textarea form-control" rows="10" style="resize:none;"
                        onKeyUp="maximo(this,1500);" onKeyDown="maximo(this,1500);" required></textarea>

                        </div>

                          <input type="file" id="file" name="Archivo" required />
                          <label for="file" /></label>

                         
                          <input type="submit" value="Guardar" class="btn btn-primary" name="Guardar"></center>

                  </form> 
                </div>
            </div>
        </div>
    </div>
</div>

<script>
function maximo(campo,limite){
if(campo.value.length>=limite){
campo.value=campo.value.substring(0,limite);
 }
}
</script>

@endsection
@extends('layouts.template') 
@section('content')

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
                        <div class="modal fade" id="Actualizar_imagen" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalCenterTitle">Actualización de imagenes</h5>
                                    </div>

                                    <div class="modal-body">
                                        <input type="text" name="bookId" id="bookId" value="" />
                                        <span class="btn btn-sm btn-success " onclick="$(this).parent().find('input[type=file]').click();desactivar_btn_Actualizar_imagen(this.name,'boton2');">Cargar imagen</span>
                                        <input name="imagen" id="imagen" type="file" accept="image/jpeg" style="display: none;" required>

                                        <label>Imagen:</label>
                                        <input type="file" class="form-control" name="imagen" id="imagen" maxlength="256" placeholder="Imagen">
                                        <input type="hidden" class="form-control" name="imagenactual" id="imagenactual">
                                        <img src="" width="150px" height="120px" id="imagenmuestra">
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
                        <div class="modal fade" id="Anadir_imagen" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalCenterTitle">Añadir de imagenes</h5>
                                    </div>

                                    <div class="modal-body">
                                        <input type="hidden" name="idsubtitle" id="idsubtitle" value="{{$edit_manual->id}}"/>

                                        <center>
                                          <label><h4>Vista Previa</h4></label><br>                   
                                          <img id="view_Añadir_img1" src="https://via.placeholder.com/200" alt="Tu imagen" /><br><br> 

                                            <span class="btn btn-sm btn-success " onclick="$(this).parent().find('input[type=file]').click();desactivar_btn_Añadir_imagen(this.name,'btn_Añadir_imagen');">Cargar imagen</span>
                                        <input name="imagen" id="Añadir_img1" type="file" accept="image/jpeg" style="display: none;" required>
                                        </center>
                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
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


                        <input type="button" id="show" onclick="mostrarBoton();volver_btn();" value="Nuevo subtítulo" class="btn btn-sm btn-success pull-right float-right">
                        <a class="btn btn-sm btn-success pull-right float-right mx-1" id="volver" href="{{'/manuals'}}">Volver</a>
                        <div id="element" style="display: none;">
                            <br>

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

                                    <!-- Botón disparador modal -->
                                    <button type="button" class="btn btn-sm  float-right text text-white" style="background-color:#0058A8;" data-toggle="modal" data-target="#exampleModalCenter">
                                        Añadir imagen/.jpeg
                                    </button>
                                    <br>

                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLongTitle">Añadir imagen</h5>
                                                </div>
                                                <div class="modal-body">

                                                    <center>
                                                      <label><h4>Vista Previa</h4></label><br>                   
                                                      <img id="view_Añadir_img2" src="https://via.placeholder.com/200" alt="Tu imagen" /><br><br> 

                                                        <span class="btn btn-sm btn-success" onclick="$(this).parent().find('input[type=file]').click();desactivar_btn_Añadir_imagen_create(this.name,'btn_Añadir_imagen_create');">Cargar imagen</span>

                                                        <input name="imagen" id="Añadir_img2" type="file" accept="image/jpeg" style="display: none;">
                                                    </center>

                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                                                    <input type="button" name="btn_Añadir_imagen_create" data-dismiss="modal" id="btn_Añadir_imagen_create" class="btn text text-white" style="background-color:#0058A8;" disabled value="Guardar cambios">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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

@endsection
  $(document).ready(function(){
    $("#hide").click(function(){
      $("#element").hide();
    });
    $("#show").click(function(){
      $("#element").show();
    });
  });


  var btn_1 = document.getElementById('show');
  var btn_2 = document.getElementById('volver');
        
  function mostrarBoton(){

    btn_1.style.display = 'none';

  }

  function mostrarBotons(){

    btn_1.style.display = 'inline';

  }

  function volver_btn(){

    btn_2.style.display = 'none';

  }

  function volver_btn_mostrar(){

    btn_2.style.display = 'inline';

  }



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


/*

CON ESTE ESCRIPT PODEMOS DESACTIVAR O ACTIVAR EL BOTON QUE ES ENCUENTRA EN EL MODAL SI CARGAMOS LA IMAGEN EL BOTON DE GUADADO SE ACTIVA CASO CONTRARIO PERMANECERA DESACIVADO HASTA QUE SE ENCUENTRE EL CAMPO FILE LLENO*/

function desactivar_btn_Añadir_imagen_create(name,nombreBotones){

    var partesBotones = nombreBotones.split(",");

    var boton = document.getElementById(partesBotones);

    if(boton.name == name)boton.disabled = false;

    else boton.disabled = false;

}

//**********************************************************


$(document).ready(function() {
  $('input[name="titulo"]').keyup(function(){
    // console.log('titulo')
    let texto = $('input[name="titulo"]').val()
    if (texto.length === 255) {
      $('.alerta-titulo').css('display','inline');
      $('#alerta-titulo').fadeOut(6000);
    }
  })
})

$(document).ready(function() {
  $('.descripcion').keyup(function(){
    let descripcion = $('.descripcion').val()
    // console.log(descripcion.length)
    if (descripcion.length === 600) {
      $('.alerta-descripcion').css('display','inline');
      $('#alerta-descripcion').fadeOut(6000);
    }
  })
})
//**********************************************************
$(document).ready(function() {
  $('input[name="subtitulo"]').keyup(function(){
    // console.log('subtitulo')
    let texto = $('input[name="subtitulo"]').val()
    if (texto.length === 255) {
      $('.alerta-subtitulo').css('display','inline');
      $('#alerta-subtitulo').fadeOut(6000);
    }
  })
})

$(document).ready(function() {
  $('.contenido').keyup(function(){
    let contenido = $('.contenido').val()
    // console.log(contenido.length)
    if (contenido.length === 600) {
      $('.alerta-contenido').css('display','inline');
      $('#alerta-contenido').fadeOut(6000);
    }
  })
})
//**********************************************************
$(document).ready(function() {
  $('input[name="Subtitulo"]').keyup(function(){
    // console.log('Subtitulo')
    let texto = $('input[name="Subtitulo"]').val()
    if (texto.length === 255) {
      $('.alerta-Subtitulo').css('display','inline');
      $('#alerta-Subtitulo').fadeOut(6000);
    }
  })
})

$(document).ready(function() {
  $('.Contenido').keyup(function(){
    let contenido = $('.Contenido').val()
    // console.log(contenido.length)
    if (contenido.length === 600) {
      $('.alerta-Contenido').css('display','inline');
      $('#alerta-Contenido').fadeOut(6000);
    }
  })
})
//**********************************************************
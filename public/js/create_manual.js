
$(document).ready(function(){

  $("#hide").click(function(){
    $("#element").hide();
  });

  $("#show").click(function(){
    $("#element").show();
  });

});


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

// $(document).ready(function(){
//     $("#alerta").fadeOut(5000);
// });
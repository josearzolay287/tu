$(function () {
    $(document).on('click', '.borrar', function (event) {
        event.preventDefault();
        $(this).closest('tr').remove();
        var contador = (document.getElementById('contador').value)-1;
        $('#contador').val(contador);
    });
});


$( '#usuarios_registrados_ocunt' ).ready(function() {
  console.log( "document loaded" );
  contar_usuarios();
});

//-----------------SECCION USUARIOS------



function regis_(formid,url_)
{
//capturar los inputs en una variable
//var inputs = $('#registrar_productos').serialize();
//usar ajax para enviar los datos por post
$.ajax({
cache: false,
     url: 'sesiones.php',
     data: $('#'+formid).serialize(),
     datatype: 'json',
     success: function(data) {
alert(data);
}, complete: function(){
  $('#content_body').load(url_+'.php');
}
});
}

function contar_usuarios()
{
  $('#_modal_contenido').html('<div class="" role="alert"><img src="images/loader.gif"/ style="vertical-align: unset;" ><br/>Procesando, por favor espere...</div></div>');
  $('#_modal').modal('toggle');
  $.ajax({
      url: "sesiones.php",
       type: "POST",
       dataType: "html",
        data: "count_usuarios='count_usuarios'",
          error: function(){
      alert("error petición ajax");
    },
        success: function(resp){
            $('#usuarios_registrados_ocunt').html(resp); 
            //$('#area_principal').load('php/principal.php');

          }//, complete: function(){
          // location.reload();
        //  }
    });
}  

function registrar_usuario()
{
//capturar los inputs en una variable
//var inputs = $('#registrar_productos').serialize();
//usar ajax para enviar los datos por post
$.ajax({
cache: false,
     url: 'sesiones.php',
     data: $('#form_registro_usuario').serialize(),
     datatype: 'json',
     success: function(data) {
alert(data);
}, complete: function(){
  $('#content_body').load('usuarios.php');
}
});
  
}
function registrar_tipo_usuario()
{
//capturar los inputs en una variable
//var inputs = $('#registrar_productos').serialize();
//usar ajax para enviar los datos por post
$.ajax({
cache: false,
     url: 'sesiones.php',
     data: $('#form_addtipo_usuario').serialize(),
     datatype: 'json',
     success: function(data) {
alert(data);
}, complete: function(){
  $('#content_body').load('tipos_usuarios.php');
}
});
  
}
function comprobarClave(){
  clave1 = document.getElementById('clave').value
  clave2 = document.getElementById('clave_confirm').value

  if (clave1 === clave2){

  }else{
     alert("Las dos claves son distintas...Favor verificar");
     $('#clave').focus();
    }
}
function regis_slide()
{
//capturar los inputs en una variable
//var inputs = $('#registrar_productos').serialize();
//usar ajax para enviar los datos por post
$.ajax({
cache: false,
     url: 'sesiones.php',
     data: $('#form_regis_slide').serialize(),
     datatype: 'json',
     success: function(data) {
alert(data);
}, complete: function(){
  $('#content_body').load('slide_principal.php');
}
});
}

function regis_about_me()
{
//capturar los inputs en una variable
//var inputs = $('#registrar_productos').serialize();
//usar ajax para enviar los datos por post
$.ajax({
cache: false,
     url: 'sesiones.php',
     data: $('#form_regis_aboutme').serialize(),
     datatype: 'json',
     success: function(data) {
alert(data);
}, complete: function(){
  $('#content_body').load('about_me.php');
}
});
}

function regis_servicos_ofrecidos()
{
//capturar los inputs en una variable
//var inputs = $('#registrar_productos').serialize();
//usar ajax para enviar los datos por post
$.ajax({
cache: false,
     url: 'sesiones.php',
     data: $('#form_regis_servicos_ofrecidos').serialize(),
     datatype: 'json',
     success: function(data) {
alert(data);
}, complete: function(){
  $('#content_body').load('servicios_ofrecidos.php');
}
});
}

function regis_banner_publicidad()
{
//capturar los inputs en una variable
//var inputs = $('#registrar_productos').serialize();
//usar ajax para enviar los datos por post
$.ajax({
cache: false,
     url: 'sesiones.php',
     data: $('#regis_banner_publicidad').serialize(),
     datatype: 'json',
     success: function(data) {
alert(data);
}, complete: function(){
  $('#content_body').load('banner_publicidad.php');
}
});
}
function regis_zona_back()
{
//capturar los inputs en una variable
//var inputs = $('#registrar_productos').serialize();
//usar ajax para enviar los datos por post
$.ajax({
cache: false,
     url: 'sesiones.php',
     data: $('#regis_zona_back').serialize(),
     datatype: 'json',
     success: function(data) {
alert(data);
}, complete: function(){
  $('#content_body').load('zona_back.php');
}
});
}


function regis_planes_principales()
{
//capturar los inputs en una variable
//var inputs = $('#registrar_productos').serialize();
//usar ajax para enviar los datos por post
$.ajax({
cache: false,
     url: 'sesiones.php',
     data: $('#form_regis_planes_principales').serialize(),
     datatype: 'json',
     success: function(data) {
alert(data);
}, complete: function(){
  $('#content_body').load('planes_principales.php');
}
});
}
function regis_eventos()
{
//capturar los inputs en una variable
//var inputs = $('#registrar_productos').serialize();
//usar ajax para enviar los datos por post
$.ajax({
cache: false,
     url: 'sesiones.php',
     data: $('#form_regis_evento').serialize(),
     datatype: 'json',
     success: function(data) {
alert(data);
}, complete: function(){
  $('#content_body').load('eventos.php');
}
});
}
// SUBIR Y ELIMINAR

function subirArchivos(tabla,id){//Funcion encargada de enviar el archivo via AJAX

  $("#archivo").upload('subir_fotos.php',
          {
            nombre_tabla: tabla,
            id_: id
          },
          function(respuesta) {
              //Subida finalizada.
              if (respuesta === 1) {
                  alert('El archivo ha sido subido correctamente.',true);
                 $('#content_body').load(tabla+'.php');
              } else {
                alert('El archivo NO se ha podido subir.'+ respuesta);
              }
            });
  
}
function subirArchivos2(tabla,id,identificador){//Funcion encargada de enviar el archivo via AJAX

  $("#archivo"+identificador).upload('subir_fotos.php',
          {
            nombre_tabla: tabla,
            id_: id
          },
          function(respuesta) {
              //Subida finalizada.
              if (respuesta === 1) {
                  alert('El archivo ha sido subido correctamente.',true);
                 $('#content_body').load(tabla+'.php');
              } else {
                alert('El archivo NO se ha podido subir.'+ respuesta);
              }
            });
  
}
function precargar(params) {
  $('#_modal_contenido').html('<div class="" role="alert"><img src="../../../images/loader.gif"/ style="vertical-align: unset;" ><br/>Procesando, por favor espere...</div></div>');

  $('#_modal').modal('toggle');
  subirDemo(params);
}
function subirDemo(id){//Funcion encargada de enviar el archivo via AJAX
  
  $("#archivo").upload('subir_archivos.php',
          {
            nombre_tabla: "nada"
          },
          function(respuesta) {
              //Subida finalizada.
              $("#barra_de_progreso").val(0);
              if (respuesta === 0) {
                 
              alert('El archivo NO se ha podido subir.'+ respuesta);

              } else {
               
                 alert('El archivo ha sido subido correctamente.',true);
                 $("#demo_name").val(respuesta);
              }
            },function(progreso, valor) {
              //Barra de progreso.
              console.log(valor);
              $("#barra_de_progreso_").val(valor);
          });
           
  
}
function subirDemo2(tabla,id,identificador){//Funcion encargada de enviar el archivo via AJAX
//alert("#subirdemo"+identificador);
  $("#subirdemo"+identificador).upload('subir_archivos.php',
          {
            nombre_tabla: tabla,
            id_:id,
          },
          function(respuesta) {
              //Subida finalizada.
              if (respuesta === 0) {
                 
              alert('El archivo NO se ha podido subir.'+ respuesta);

              } else {
                 alert(respuesta);
                $('#content_body').load(tabla+'.php');
              }
            });
  
}
function subirfoto(id){//Funcion encargada de enviar el archivo via AJAX

  $("#archivo_foto").upload('subir_archivos.php',
          {
            nombre_tabla: "nada"
          },
          function(respuesta) {
              //Subida finalizada.
              if (respuesta === 0) {
                 
              alert('El archivo NO se ha podido subir.'+ respuesta);

              } else {
                 alert('El archivo ha sido subido correctamente.'+ respuesta);
                 $("#foto_name").val(respuesta);
              }
            },function(progreso, valor) {
              //Barra de progreso.
              console.log(valor);
              $("#barra_de_progreso_f").val(valor);
          });
  
}

function pregunta_eliminar(id, tabla){
  if (confirm('¿Estas seguro de borrar este item?')){
    eliminar(id, tabla);
  }
}
function eliminar(id_,tabla)
{

     $.ajax({
      url: "sesiones.php",
       type: "POST",
       dataType: "html",
        data: "eliminar_="+tabla+"&id_usuario="+id_,
      error: function(xhr, ajaxOptions, thrownError) {
        alert(xhr.status);
        alert(thrownError);
    },
        success: function(resp){
                  //$('#cargando').hide();
            alert(resp);
            
          }, complete: function(){
            $('#content_body').load(tabla+'.php');
         }
    });
}

// FIN SUBIR Y ELIMINAR

function editar(id_, tabla, url_){
  var url_1=url_+'.php';
  console.log(url_1);
  $.ajax({
        url: url_1,
        type: "POST",
        dataType: "html",
        data: "id_editar="+id_+"&tabla_editar="+tabla,
        success: function(resp){
         
        $('#content_edit').html(resp);
          }
      
      });
}

function guardar_edicion(form,url)
{
//capturar los inputs en una variable
//var inputs = $('#registrar_productos').serialize();
//usar ajax para enviar los datos por post
$.ajax({
cache: false,
     url: 'sesiones.php',
     data: $('#'+form).serialize(),
     datatype: 'json',
     success: function(data) {
alert(data);
}, complete: function(){
  $('#content_body').load(url+'.php');
}
});
}
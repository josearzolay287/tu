
  function login()
{
//capturar los inputs en una variable
//var inputs = $('#registrar_productos').serialize();
//usar ajax para enviar los datos por post
$.ajax({
cache: false,
     url: 'sesiones.php',
     data: $('#form_login').serialize(),
     datatype: 'json',
     success: function(data) {
       if (data==1) {
        //window.location='dashb/html/ltr/index.php';
        window.open('/zonatop/dashb/html/ltr/index.php');
        location.reload();
       }else{
         alert(data);
       }
//$('#resultado_pedido').text(data);
//abrir_modal_pedido('tvesModal_pedido');


}
});
  
}

function perfiles(id_perfil)
{
    
  $.ajax({
      url: "sesiones.php",
       type: "POST",
       dataType: "html",
        data: "id_perfil="+id_perfil,
          error: function(){
      alert("error petición ajax");
    },
        success: function(resp){
                  //$('#cargando').hide();
          //$('#perfiles').html(resp); 
          //window.location.href = 'Perfiles/perfil/index.php';
          if (resp===1) {
            return false;
          }

          }, complete: function(resp){
            if (resp===1) {
              alert(resp);
            }else{
              //alert(JSON.stringify(resp));
               window.open('Perfiles/perfil/index.php');
            }
           
          }
    });
}

function buscar_(valor_consultar, url_paginador){
  $.ajax({
    type: "GET",
    url: url_paginador+".php",
    data: "valor_de_busqueda_="+valor_consultar,
    dataType: "html",
                  
    error: function(){
      alert("error petición ajax");
    },
    success: function(data){
                                                     
    $('#'+url_paginador).html(data);
      }
    });                                                                   
}

var sound = false;
function play_music(id, tabla){
var v = document.getElementById(id);
var resultado="";
      
      $.ajax({
          async: false,
          url: 'sesiones.php', 
          type: "POST",
		  dataType: "html",
          data:"get_mixes="+id+"&get_tabla_play="+tabla,
          success:function(data){           
           //alert(data);
           var datosObj = $.parseJSON(data);
		   
           resultado = datosObj;  
             console.log(resultado);
          }
      });  
      //return resultado;
      //alert(resultado);
      Array.prototype.push.apply(canciones,resultado);
	  //canciones.push(resultado);
	  console.log(canciones);
  
  crearPlayList(canciones[canciones.length - 1],canciones.length - 1);
  loadMusic(canciones[canciones.length - 1]['archivo'],canciones[canciones.length - 1]['nombre'],canciones[canciones.length - 1]['foto'],canciones.length - 1);
  togglePlay();
}

function show(id_mostrar, id_ocultar) {
  var a = document.getElementById(id_mostrar);
  var b = document.getElementById(id_ocultar);
  if (b.style.display === 'block' ) {
    b.style.display = 'none'; 
    a.style.display = 'block'; 
}else if(b.style.display === 'none' ) {
    b.style.display = 'block'; 
    a.style.display = 'none'; 
  }

}

function abrir_modal(id, id_close){


  var modal = document.getElementById(id);
  var btn = document.getElementById(id_close);
  var span = document.getElementsByClassName("close");
  var body = document.getElementsByTagName("body")[0];

    modal.style.display = "block";

    body.style.position = "static";
    body.style.height = "100%";
    body.style.overflow = "hidden";
  
  span.onclick = function() {
    modal.style.display = "none";
    
    body.style.position = "inherit";
    body.style.height = "auto";
    body.style.overflow = "visible";
  }
  btn.onclick = function() {
    modal.style.display = "none";
    
    body.style.position = "inherit";
    body.style.height = "auto";
    body.style.overflow = "visible";
  }

  window.onclick = function(event) {
    if (event.target == modal) {
      modal.style.display = "none";

      body.style.position = "inherit";
      body.style.height = "auto";
      body.style.overflow = "visible";
    }
  }
    
  
}

function show2(id_mostrar, id_ocultar1, ocultar2,ocultar3,ocultar4) {
  $('#'+id_mostrar).show(); 
  $('#'+id_ocultar1).hide(); 
  $('#'+ocultar2).hide();
  $('#'+ocultar3).hide();
  $('#'+ocultar4).hide();
    //$("#bancos_pedido option[value=No_Aplica").attr("selected",true);
}

function mostrar_pago_tarjeta(id_mostrar, id_ocultar1) {
  $('#'+id_mostrar).show(); 
  //$('#'+id_ocultar1).hide();
    //$("#bancos_pedido option[value=No_Aplica").attr("selected",true);
}

function pago_tarjeta(id_producto, tipo_producto)
{
    
  $.ajax({
      url: "sesiones.php",
       type: "POST",
       dataType: "html",
        data: "tipo_producto_mp="+tipo_producto+"&id_producto="+id_producto,
          error: function(){
      alert("error petición ajax");
    },
        success: function(resp){
          var body = document.getElementsByTagName("body")[0];
          body.style.position = "inherit";
          body.style.height = "auto";
          body.style.overflow = "visible";
          }, complete: function(){
            
              $('#container_principal').load('pasarela_mp.php');
           
          }
    });
}
function pago_efectivo(id_producto, tipo_producto)
{
    
  $.ajax({
      url: "sesiones.php",
       type: "POST",
       dataType: "html",
        data: "tipo_producto_mp="+tipo_producto+"&id_producto="+id_producto,
          error: function(){
      alert("error petición ajax");
    },
        success: function(resp){
          var body = document.getElementsByTagName("body")[0];
          body.style.position = "inherit";
          body.style.height = "auto";
          body.style.overflow = "visible";
          }, complete: function(){
            
           $('#container_principal').load('pasarela_pago_efect.php');
           
          }
    });
}

function pago_tarjeta_perfiles(id_producto, tipo_producto, paginador)
{
    
  $.ajax({
      url: "../../sesiones.php",
       type: "POST",
       dataType: "html",
        data: "tipo_producto_mp="+tipo_producto+"&id_producto="+id_producto,
          error: function(){
      alert("error petición ajax");
    },
        success: function(resp){
          var body = document.getElementsByTagName("body")[0];
          body.style.position = "inherit";
          body.style.height = "auto";
          body.style.overflow = "visible";
          }, complete: function(){
            
              $('#'+paginador).load('../../pasarela_mp.php');
           
          }
    });
}
function pago_efectivo_perfiles(id_producto, tipo_producto, paginador)
{
    
  $.ajax({
      url: "../../sesiones.php",
       type: "POST",
       dataType: "html",
        data: "tipo_producto_mp="+tipo_producto+"&id_producto="+id_producto,
          error: function(){
      alert("error petición ajax");
    },
        success: function(resp){
          var body = document.getElementsByTagName("body")[0];
          body.style.position = "inherit";
          body.style.height = "auto";
          body.style.overflow = "visible";
          }, complete: function(){
            
              $('#'+paginador).load('../../pasarela_pago_efect.php');
           
          }
    });
}

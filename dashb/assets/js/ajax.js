function objetoAjax(){
 var xmlhttp=false;
  try{
   xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
  }catch(e){
   try {
    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
   }catch(E){
    xmlhttp = false;
   }
  }
  if (!xmlhttp && typeof XMLHttpRequest!='undefined') {
   xmlhttp = new XMLHttpRequest();
  }
  return xmlhttp;
}

function Pagina(nropagina,url_){
 //donde se mostrará los registros
 divContenido = document.getElementById('get_usuarios');
 
 ajax=objetoAjax();
 //uso del medoto GET
 //indicamos el archivo que realizará el proceso de paginar
 //junto con un valor que representa el nro de pagina
 ajax.open("GET", ""+url_+".php?pag="+nropagina);
  ajax.onreadystatechange=function() {
  if (ajax.readyState==4) {
   //mostrar resultados en esta capa
   divContenido.innerHTML = ajax.responseText
  }
 }
 //como hacemos uso del metodo GET
 //colocamos null ya que enviamos 
 //el valor por la url ?pag=nropagina
 ajax.send(null);
}

function Pagina_usuarios(nropagina){
 //donde se mostrará los registros
 divContenido = document.getElementById('get_usuarios');
 
 ajax=objetoAjax();
 //uso del medoto GET
 //indicamos el archivo que realizará el proceso de paginar
 //junto con un valor que representa el nro de pagina
 ajax.open("GET", "php/paginador_usuarios.php?pag="+nropagina);
  ajax.onreadystatechange=function() {
  if (ajax.readyState==4) {
   //mostrar resultados en esta capa
   divContenido.innerHTML = ajax.responseText
  }
 }
 //como hacemos uso del metodo GET
 //colocamos null ya que enviamos 
 //el valor por la url ?pag=nropagina
 ajax.send(null);
}

function Pagina_entradas(nropagina){
 //donde se mostrará los registros
 divContenido = document.getElementById('tabla_entradas_inventario');
 
 ajax=objetoAjax();
 //uso del medoto GET
 //indicamos el archivo que realizará el proceso de paginar
 //junto con un valor que representa el nro de pagina
 ajax.open("GET", "php/paginador_entradas.php?pag="+nropagina);
  ajax.onreadystatechange=function() {
  if (ajax.readyState==4) {
   //mostrar resultados en esta capa
   divContenido.innerHTML = ajax.responseText
  }
 }
 //como hacemos uso del metodo GET
 //colocamos null ya que enviamos 
 //el valor por la url ?pag=nropagina
 ajax.send(null);
}
function Pagina_salidas(nropagina){
 //donde se mostrará los registros
 divContenido = document.getElementById('tabla_Salidas_Inventario');
 
 ajax=objetoAjax();
 //uso del medoto GET
 //indicamos el archivo que realizará el proceso de paginar
 //junto con un valor que representa el nro de pagina
 ajax.open("GET", "php/paginador_salidas.php?pag="+nropagina);
  ajax.onreadystatechange=function() {
  if (ajax.readyState==4) {
   //mostrar resultados en esta capa
   divContenido.innerHTML = ajax.responseText
  }
 }
 //como hacemos uso del metodo GET
 //colocamos null ya que enviamos 
 //el valor por la url ?pag=nropagina
 ajax.send(null);
}

function Pagina_(nropagina){
 //donde se mostrará los registros
 divContenido = document.getElementById('tabla_ventas_del_mes');
 
 ajax=objetoAjax();
 //uso del medoto GET
 //indicamos el archivo que realizará el proceso de paginar
 //junto con un valor que representa el nro de pagina
 ajax.open("GET", "php/paginador_ventas_agentes.php?pag="+nropagina);
  ajax.onreadystatechange=function() {
  if (ajax.readyState==4) {
   //mostrar resultados en esta capa
   divContenido.innerHTML = ajax.responseText
  }
 }
 //como hacemos uso del metodo GET
 //colocamos null ya que enviamos 
 //el valor por la url ?pag=nropagina
 ajax.send(null);
}
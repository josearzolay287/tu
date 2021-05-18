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

function Pagina(nropagina,buscar){
 //donde se mostrará los registros
 divContenido = document.getElementById('tabla_inventario');
 
 ajax=objetoAjax();
 //uso del medoto GET
 //indicamos el archivo que realizará el proceso de paginar
 //junto con un valor que representa el nro de pagina
 if (buscar=="nada") {
  ajax.open("GET", "php/paginador.php?pag="+nropagina);
}else{
 ajax.open("GET", "php/paginador.php?pag="+nropagina+"&valor_de_busqueda_producto_filtro="+buscar);
}
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

function Paginas(nropagina,url){
 //donde se mostrará los registros
 divContenido = document.getElementById(url);
 
 ajax=objetoAjax();
 //uso del medoto GET
 //indicamos el archivo que realizará el proceso de paginar
 //junto con un valor que representa el nro de pagina
 ajax.open("GET", url+".php?pag="+nropagina);
  ajax.onreadystatechange=function() {
  if (ajax.readyState==4) {
   //mostrar resultados en esta capa
   divContenido.innerHTML = ajax.responseText
   console.log(ajax.responseText);
  }
 }
 //como hacemos uso del metodo GET
 //colocamos null ya que enviamos 
 //el valor por la url ?pag=nropagina
 ajax.send(null);
}

function Pagina_mixes(nropagina){
 //donde se mostrará los registros
 divContenido = document.getElementById('paginador_mixes');
 
 ajax=objetoAjax();
 //uso del medoto GET
 //indicamos el archivo que realizará el proceso de paginar
 //junto con un valor que representa el nro de pagina
 ajax.open("GET", "paginador_mixes.php?pag="+nropagina);
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

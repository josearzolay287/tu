<?php
session_start(); 
require ('conexion.php');
if (isset($_REQUEST['destroy'])) {
  session_destroy();
 echo "Sesion finalizada con exito";
}
//-----------SECCION USUARIOS
if (isset($_REQUEST['tipos_usuarios'])) {

  $fecha_registro=date('Y-m-d');
  $tipos_usuarios=mysqli_query($conexion, "SELECT * FROM tipos_usuario");
  $N="";
  while ($reg_usuarios=mysqli_fetch_array($tipos_usuarios)) {
  if ($reg_usuarios['id_tipo_usuario']=="1") {
    $tipo="Administrador";
  }if ($reg_usuarios['id_tipo_usuario']=="2") {
    $tipo="Agente de ventas";
  }if ($reg_usuarios['id_tipo_usuario']=="3") {
    $tipo="Productor";
  }
  if ($reg_usuarios['id_tipo_usuario']=="4") {
    $tipo="Diseñador";
  }
  ?>
  <tr>
					<th class="text-nowrap" scope="row"><?php echo $reg_usuarios['id_tipo_usuario']; ?></th>
					<td><?php echo $reg_usuarios['nombre']; ?></td>
					<td> <a onclick="abrir_modal('');" >    ✏️     </a><a onclick="pregunta_eliminar_producto_inventario('')" >    🗑️    </a></td>
				</tr>
<?php
  }
}

if (isset($_REQUEST['nombre_usuario_reg'])) {
    
$nombre_user= $_REQUEST[ 'nombre_usuario_reg'];
$nombre_apellido= $_REQUEST['nombre_apellido'];
$contrasena= $_REQUEST[ 'clave'];
$fecha_registro=date('Y-m-d');
$tipo_usuario= $_REQUEST[ 'tipo_usuario'];
$correo=$_REQUEST[ 'email'];
$grupo=$_REQUEST[ 'grupo'];
$foto="";

$consulta_usuario=mysqli_query($conexion, "SELECT * FROM usuarios WHERE  usuario='$nombre_user'") or die(mysqli_error($conexion));

if(mysqli_num_rows($consulta_usuario)>0){
 // mysqli_query($conexion, "UPDATE usuarios SET nombre='$nombre_user', id_tipo_documento='$id_tipo_documento2', documento='$documento', id_tipo_usuario='$id_tipo_usuario2', contrasena='$contrasena'  WHERE documento='$documento'")or die("Problemas con la conexión: " . mysqli_error($conexion));
    echo "El usuario:".$nombre_user." se ha actualizado correctamente";
   
}else{

mysqli_query($conexion, "INSERT INTO usuarios (id_tipo_usuario,nombre_apellido,usuario,clave,correo,grupo,foto, fecha_registro) VALUES ('$tipo_usuario','$nombre_apellido','$nombre_user','$contrasena','$correo','$grupo','$foto','$fecha_registro')")or die("Problemas con la conexión aqui: " . mysqli_error($conexion));
        echo "Se registro el usuario:".$nombre_user." correctamente";
   

    }
   }

   if (isset($_REQUEST['add_tipo_usuario'])) {
    
    $descripcion= $_REQUEST[ 'add_tipo_usuario'];
    $fecha_registro=date('Y-m-d');
    
    $consulta_tipo_usuario=mysqli_query($conexion, "SELECT * FROM tipos_usuario WHERE  nombre='$descripcion'") or die(mysqli_error($conexion));
    
    if(mysqli_num_rows($consulta_tipo_usuario)>0){
     // mysqli_query($conexion, "UPDATE usuarios SET nombre='$nombre_user', id_tipo_documento='$id_tipo_documento2', documento='$documento', id_tipo_usuario='$id_tipo_usuario2', contrasena='$contrasena'  WHERE documento='$documento'")or die("Problemas con la conexión: " . mysqli_error($conexion));
        echo "El tipo de usuario:".$descripcion." ya existe";
       
    }else{
    
    mysqli_query($conexion, "INSERT INTO tipos_usuario (nombre, fecha_registro) VALUES ('$descripcion','$fecha_registro')")or die("Problemas con la conexión aqui: " . mysqli_error($conexion));
            echo "Se registro el tipo usuario:".$descripcion." correctamente";
       
    
        }
       }

if (isset($_REQUEST['count_usuarios'])) {

  $consulta_tipo_usuario=mysqli_query($conexion, "SELECT * FROM usuarios") or die(mysqli_error($conexion));
  echo mysqli_num_rows($consulta_tipo_usuario);

}

// FIN SECCION USUARIOS

//  ---ELIMINIAR
if (isset($_REQUEST['eliminar_'])) {
  if ($_REQUEST['eliminar_']==="usuarios") {
    $tabla=$_REQUEST['eliminar_'];
    $id_=$_REQUEST['id_usuario'];
    mysqli_query($conexion, "DELETE FROM usuarios WHERE id_usuario='$id_'");
     echo "Se elimino:".$id_." correctamente";
  }

  if ($_REQUEST['eliminar_']==="about_me") {
    $tabla=$_REQUEST['eliminar_'];
    $id_=$_REQUEST['id_usuario'];
    mysqli_query($conexion, "DELETE FROM about_me WHERE id_resumen='$id_'");
     echo "Se elimino:".$id_." correctamente  ";
  }
  
  if ($_REQUEST['eliminar_']==="tipos_usuario") {
    $tabla=$_REQUEST['eliminar_'];
    $id_=$_REQUEST['id_usuario'];
    mysqli_query($conexion, "DELETE FROM tipos_usuario WHERE id_tipo_usuario='$id_'");
     echo "Se elimino:".$id_." correctamente  ";
  }
  if ($_REQUEST['eliminar_']==="slide_principal") {
    $tabla=$_REQUEST['eliminar_'];
    $id_=$_REQUEST['id_usuario'];
    mysqli_query($conexion, "DELETE FROM carousel_index WHERE id='$id_'");
     echo "Se elimino:".$id_." correctamente";
  }

  if ($_REQUEST['eliminar_']==="banner_publicidad") {
    $tabla=$_REQUEST['eliminar_'];
    $id_=$_REQUEST['id_usuario'];
    mysqli_query($conexion, "DELETE FROM banner_publicidad WHERE id='$id_'");
     echo "Se elimino:".$id_." correctamente";
  }
  if ($_REQUEST['eliminar_']==="servicios_ofrecidos") {
    $tabla=$_REQUEST['eliminar_'];
    $id_=$_REQUEST['id_usuario'];
    mysqli_query($conexion, "DELETE FROM servicios_dj WHERE id_servicio='$id_'");
     echo "Se elimino:".$id_." correctamente";
  }
  if ($_REQUEST['eliminar_']==="ediciones") {
    $tabla=$_REQUEST['eliminar_'];
    $id_=$_REQUEST['id_usuario'];
    mysqli_query($conexion, "DELETE FROM ediciones WHERE id='$id_'");
     echo "Se elimino:".$id_." correctamente";
  }
  if ($_REQUEST['eliminar_']==="mixes") {
    $tabla=$_REQUEST['eliminar_'];
    $id_=$_REQUEST['id_usuario'];
    mysqli_query($conexion, "DELETE FROM mixes WHERE id='$id_'");
     echo "Se elimino:".$id_." correctamente";
  }
  if ($_REQUEST['eliminar_']==="packs") {
    $tabla=$_REQUEST['eliminar_'];
    $id_=$_REQUEST['id_usuario'];
    mysqli_query($conexion, "DELETE FROM packs WHERE id='$id_'");
     echo "Se elimino:".$id_." correctamente";
  }
  if ($_REQUEST['eliminar_']==="planes_principales") {
    $tabla=$_REQUEST['eliminar_'];
    $id_=$_REQUEST['id_usuario'];
    mysqli_query($conexion, "DELETE FROM planes_principales WHERE id='$id_'");
     echo "Se elimino:".$id_." correctamente";
  }
  if ($_REQUEST['eliminar_']==="eventos") {
    $tabla=$_REQUEST['eliminar_'];
    $id_=$_REQUEST['id_usuario'];
    mysqli_query($conexion, "DELETE FROM eventos WHERE id='$id_'");
     echo "Se elimino:".$id_." correctamente";
  }
  if ($_REQUEST['eliminar_']==="historia_dj") {
    $tabla=$_REQUEST['eliminar_'];
    $id_=$_REQUEST['id_usuario'];
    mysqli_query($conexion, "DELETE FROM historia_dj WHERE id='$id_'");
     echo "Se elimino:".$id_." correctamente";
  }
  if ($_REQUEST['eliminar_']==="estadisticas_dj") {
    $tabla=$_REQUEST['eliminar_'];
    $id_=$_REQUEST['id_usuario'];
    mysqli_query($conexion, "DELETE FROM estadisticas_dj WHERE id='$id_'");
     echo "Se elimino:".$id_." correctamente";
  }
  if ($_REQUEST['eliminar_']==="sobre_nosotros") {
    $tabla=$_REQUEST['eliminar_'];
    $id_=$_REQUEST['id_usuario'];
    mysqli_query($conexion, "DELETE FROM sobre_nosotros WHERE id='$id_'");
     echo "Se elimino:".$id_." correctamente";
  }
  if ($_REQUEST['eliminar_']==="fondo_perfiles") {
    $tabla=$_REQUEST['eliminar_'];
    $id_=$_REQUEST['id_usuario'];
    mysqli_query($conexion, "DELETE FROM fondo_perfiles WHERE id='$id_'");
     echo "Se elimino:".$id_." correctamente";
  }
  if ($_REQUEST['eliminar_']==="beats") {
    $tabla=$_REQUEST['eliminar_'];
    $id_=$_REQUEST['id_usuario'];
    mysqli_query($conexion, "DELETE FROM beats WHERE id='$id_'");
     echo "Se elimino:".$id_." correctamente";
  }
  if ($_REQUEST['eliminar_']==="libreria") {
    $tabla=$_REQUEST['eliminar_'];
    $id_=$_REQUEST['id_usuario'];
    mysqli_query($conexion, "DELETE FROM libreria WHERE id='$id_'");
     echo "Se elimino:".$id_." correctamente";
  }
  if ($_REQUEST['eliminar_']==="generos") {
    $tabla=$_REQUEST['eliminar_'];
    $id_=$_REQUEST['id_usuario'];
    mysqli_query($conexion, "DELETE FROM generos WHERE id='$id_'");
     echo "Se elimino:".$id_." correctamente";
  }
  
}
// FIN ELIMINAR



//-----------SLIDE PRINCIPAL

if (isset($_REQUEST['titulo_slide_reg_'])) {
    
  $titulo= $_REQUEST[ 'titulo_slide_reg_'];
  $resumen= $_REQUEST[ 'resumen'];
  $link= $_REQUEST[ 'link'];
  $id_usuario=$_SESSION['id_usuario'];
  $img= "";
  $fecha_registro=date('Y-m-d');
  
  $consulta_tipo_usuario=mysqli_query($conexion, "SELECT * FROM carousel_index WHERE  titulo='$titulo'") or die(mysqli_error($conexion));
  
  if(mysqli_num_rows($consulta_tipo_usuario)>0){
   // mysqli_query($conexion, "UPDATE usuarios SET nombre='$nombre_user', id_tipo_documento='$id_tipo_documento2', documento='$documento', id_tipo_usuario='$id_tipo_usuario2', contrasena='$contrasena'  WHERE documento='$documento'")or die("Problemas con la conexión: " . mysqli_error($conexion));
      echo "El titulo:".$titulo." ya existe ";
     
  }else{
  
  mysqli_query($conexion, "INSERT INTO carousel_index (id_usuario,titulo,resumen,link,foto, fecha_registro) VALUES ('$id_usuario','$titulo','$resumen','$link','$img','$fecha_registro')")or die("Problemas con la conexión aqui: " . mysqli_error($conexion));
          echo "Se registro el slide:".$titulo." correctamente ";
     
  
      }
     }
//------------- FIN SLIDE
//-----------EVENTOS

if (isset($_REQUEST['titulo_evento_reg'])) {
    
  $titulo_evento_reg= $_REQUEST[ 'titulo_evento_reg'];
  $resumen= $_REQUEST[ 'resumen'];
  $descripcion= $_REQUEST[ 'descripcion'];
  $fecha_evento= $_REQUEST[ 'fecha_evento'];
  $foto_name= $_REQUEST[ 'foto_name'];
  $id_usuario=$_SESSION['id_usuario'];
  $fecha_registro=date('Y-m-d');
  
  $consulta_tipo_usuario=mysqli_query($conexion, "SELECT * FROM eventos WHERE  titulo='$titulo_evento_reg'") or die(mysqli_error($conexion));
  
  if(mysqli_num_rows($consulta_tipo_usuario)>0){
   // mysqli_query($conexion, "UPDATE usuarios SET nombre='$nombre_user', id_tipo_documento='$id_tipo_documento2', documento='$documento', id_tipo_usuario='$id_tipo_usuario2', contrasena='$contrasena'  WHERE documento='$documento'")or die("Problemas con la conexión: " . mysqli_error($conexion));
      echo "El titulo:".$titulo_evento_reg." ya existe ";
     
  }else{
  
  mysqli_query($conexion, "INSERT INTO eventos (id_usuario,titulo,descripcion,resumen,foto, fecha_evento,fecha_registro) VALUES ('$id_usuario','$titulo_evento_reg','$descripcion','$resumen','$foto_name','$fecha_evento','$fecha_registro')")or die("Problemas con la conexión aqui: " . mysqli_error($conexion));
          echo "Se registro el slide:".$titulo_evento_reg." correctamente ";
     
  
      }
     }
//------------- FIN EVENTOS

//-----------ABOUT ME

if (isset($_REQUEST['nombre_apellido_about_reg'])) {
    
  $nombre_apellido_about_reg= $_REQUEST[ 'nombre_apellido_about_reg'];
  $id_usuario=$_SESSION['id_usuario'];
  $resumen= $_REQUEST[ 'resumen'];
  $ubicacion_actual= $_REQUEST[ 'ubicacion_actual'];
  $experiencia= $_REQUEST[ 'experiencia'];
  $mixes= $_REQUEST[ 'mixes'];
  $servicio= $_REQUEST[ 'servicio'];
  $ws= $_REQUEST[ 'ws'];
  $fb= $_REQUEST[ 'fb'];
  $inst= $_REQUEST[ 'inst'];
  $twit= $_REQUEST[ 'twit'];
  $youtube= $_REQUEST[ 'youtube'];
      $ticktock= $_REQUEST[ 'ticktock'];
      $soundcloud= $_REQUEST[ 'soundcloud'];
      $spotify= $_REQUEST[ 'spotify'];
  $foto= "";

  $fecha_registro=date('Y-m-d');
  
  if (is_array($_REQUEST['intereses'])) {
    $selected = '';
    $num_intereses = count($_REQUEST['intereses']);
    $current = 0;
    foreach ($_REQUEST['intereses'] as $key => $value) {
        if ($current != $num_intereses-1)
            $selected .= $value.',';
        else
            $selected .= $value.'';
        $current++;
    }
  }
  else {
    $selected = 'Sin intereses';
  }

  $consulta_aboutme=mysqli_query($conexion, "SELECT * FROM about_me WHERE id_usuario='$id_usuario'") or die(mysqli_error($conexion));
  
  if(mysqli_num_rows($consulta_aboutme)>0){
   // mysqli_query($conexion, "UPDATE usuarios SET nombre='$nombre_user', id_tipo_documento='$id_tipo_documento2', documento='$documento', id_tipo_usuario='$id_tipo_usuario2', contrasena='$contrasena'  WHERE documento='$documento'")or die("Problemas con la conexión: " . mysqli_error($conexion));
      echo "El titulo:".$id_usuario." ya existe   ";
     
  }else{
  
  mysqli_query($conexion, "INSERT INTO about_me (id_usuario,nombre_apellido,resumen,ubicacion,experiencia, cant_mixes,ws,facebook, instagram, twitter,youtube,ticktock, soundcloud, spotify,servicio,intereses,fecha_registro,foto) VALUES ('$id_usuario','$nombre_apellido_about_reg','$resumen','$ubicacion_actual','$experiencia','$mixes','$ws','$fb','$inst','$twit','$youtube','$ticktock','$soundcloud','$spotify','$servicio','$selected','$fecha_registro','$foto')") or die("Problemas con la conexión aqui: " . mysqli_error($conexion));
          echo "Se registro:".$nombre_apellido_about_reg." correctamente";
     
  
      }
}
//------------- FIN ABOUT ME

//-----------SERVICIOS OFRECIDOS

if (isset($_REQUEST['tipo_servicio_reg'])) {
    
  $tipo_servicio_reg= $_REQUEST[ 'tipo_servicio_reg'];
  $costo= $_REQUEST["costo"];
  $modalidad= $_REQUEST[ 'modalidad'];
  $linea1= $_REQUEST[ 'linea1'];
  $linea2= $_REQUEST[ 'linea2'];
  $linea3= $_REQUEST[ 'linea3'];
  $linea4= $_REQUEST[ 'linea4'];
  $id_usuario=$_SESSION['id_usuario'];


  $fecha_registro=date('Y-m-d');
  
  
  $consulta_aboutme=mysqli_query($conexion, "SELECT * FROM servicios_dj WHERE tipo='$tipo_servicio_reg'") or die(mysqli_error($conexion));
  
  if(mysqli_num_rows($consulta_aboutme)>0){
   // mysqli_query($conexion, "UPDATE usuarios SET nombre='$nombre_user', id_tipo_documento='$id_tipo_documento2', documento='$documento', id_tipo_usuario='$id_tipo_usuario2', contrasena='$contrasena'  WHERE documento='$documento'")or die("Problemas con la conexión: " . mysqli_error($conexion));
      echo "El titulo:".$tipo_servicio_reg." ya existe')
      ";
     
  }else{
  
  mysqli_query($conexion, "INSERT INTO servicios_dj (id_usuario,tipo,costo,linea1,linea2,linea3,linea4,fecha_registro, modalidad) VALUES ('$id_usuario','$tipo_servicio_reg','$costo','$linea1','$linea2','$linea3','$linea4','$fecha_registro', '$modalidad')")or die("Problemas con la conexión aqui: " . mysqli_error($conexion));
          echo "Se registro:".$tipo_servicio_reg." se guardo correctamente')
      ";
     
  
      }
     }
//------------- FIN SERVICIOS OFRECIDOS

//-----------PLANES PRINCIPALES

if (isset($_REQUEST['tipo_plan_reg'])) {
    
  $tipo_plan_reg= $_REQUEST[ 'tipo_plan_reg'];
  $costo= $_REQUEST["costo"];
  $modalidad= $_REQUEST[ 'modalidad'];
  $linea1= $_REQUEST[ 'linea1'];
  $linea2= $_REQUEST[ 'linea2'];
  $linea3= $_REQUEST[ 'linea3'];
  $linea4= $_REQUEST[ 'linea4'];
  $estado_plan_reg= $_REQUEST[ 'estado_plan_reg'];
  $id_usuario=$_SESSION['id_usuario'];

  $fecha_registro=date('Y-m-d');
  
  
  $consulta_=mysqli_query($conexion, "SELECT * FROM planes_principales WHERE tipo='$tipo_plan_reg'") or die(mysqli_error($conexion));
  
  if(mysqli_num_rows($consulta_)>0){
   // mysqli_query($conexion, "UPDATE usuarios SET nombre='$nombre_user', id_tipo_documento='$id_tipo_documento2', documento='$documento', id_tipo_usuario='$id_tipo_usuario2', contrasena='$contrasena'  WHERE documento='$documento'")or die("Problemas con la conexión: " . mysqli_error($conexion));
      echo "El titulo:".$tipo_plan_reg." ya existe')
      ";
     
  }else{
  
  mysqli_query($conexion, "INSERT INTO planes_principales (id_usuario,tipo,costo,modo,estado,linea1,linea2,linea3,linea4,fecha_registro ) VALUES ('$id_usuario','$tipo_plan_reg','$costo','$modalidad', '$estado_plan_reg','$linea1','$linea2','$linea3','$linea4','$fecha_registro')")or die("Problemas con la conexión aqui: " . mysqli_error($conexion));
          echo "Se registro:".$tipo_plan_reg." se correctamente')
      ";
     
  
      }
     }
//------------- FIN PLANES PRINCIPALES

//-----------BANNER PUBLICIDAD

if (isset($_REQUEST['descripcion_banner_pub_reg'])) {
    
  $titulo= $_REQUEST[ 'descripcion_banner_pub_reg'];
  $estado= $_REQUEST[ 'estado'];
  $link= $_REQUEST[ 'link'];
  $tipo_banner= $_REQUEST[ 'tipo_banner'];
  $img= "";
  $id_usuario=$_SESSION['id_usuario'];
  $fecha_registro=date('Y-m-d');
  
  $consulta_tipo_usuario=mysqli_query($conexion, "SELECT * FROM banner_publicidad WHERE  descripcion='$titulo'") or die(mysqli_error($conexion));
  
  if(mysqli_num_rows($consulta_tipo_usuario)>0){
   // mysqli_query($conexion, "UPDATE usuarios SET nombre='$nombre_user', id_tipo_documento='$id_tipo_documento2', documento='$documento', id_tipo_usuario='$id_tipo_usuario2', contrasena='$contrasena'  WHERE documento='$documento'")or die("Problemas con la conexión: " . mysqli_error($conexion));
      echo "El titulo:".$titulo." ya existe')
      ";
     
  }else{
  
  mysqli_query($conexion, "INSERT INTO banner_publicidad (descripcion,foto,id_usuario,estado,tipo, link,fecha_registro) VALUES ('$titulo','$img','$id_usuario','$estado','$tipo_banner','$link','$fecha_registro')")or die("Problemas con la conexión aqui: " . mysqli_error($conexion));
          echo "Se registro:".$titulo." correctamente')
      ";
     
  
      }
     }
//------------- FIN BANNER
//-----------ESTADISTICAS DJ

if (isset($_REQUEST['estadisticas_dj_reg'])) {
    
  $estadisticas_dj_reg= $_REQUEST[ 'estadisticas_dj_reg'];
  $produc_estadisticas_dj_reg= $_REQUEST[ 'produc_estadisticas_dj_reg'];
  $editor_estadisticas_dj_reg= $_REQUEST[ 'editor_estadisticas_dj_reg'];
  $calidad_estadisticas_dj_reg= $_REQUEST[ 'calidad_estadisticas_dj_reg'];
  $id_usuario=$_SESSION['id_usuario'];
  $fecha_registro=date('Y-m-d');
  
  $consulta_tipo_usuario=mysqli_query($conexion, "SELECT * FROM estadisticas_dj WHERE  dj='$estadisticas_dj_reg'") or die(mysqli_error($conexion));
  
  if(mysqli_num_rows($consulta_tipo_usuario)>0){
   // mysqli_query($conexion, "UPDATE usuarios SET nombre='$nombre_user', id_tipo_documento='$id_tipo_documento2', documento='$documento', id_tipo_usuario='$id_tipo_usuario2', contrasena='$contrasena'  WHERE documento='$documento'")or die("Problemas con la conexión: " . mysqli_error($conexion));
      echo "El titulo:".$titulo." ya existe')
      ";
     
  }else{
  
  mysqli_query($conexion, "INSERT INTO estadisticas_dj (id_usuario,dj,productor,editor,calidad, fecha_registro) VALUES ('$id_usuario','$estadisticas_dj_reg','$produc_estadisticas_dj_reg','$editor_estadisticas_dj_reg','$calidad_estadisticas_dj_reg','$fecha_registro')")or die("Problemas con la conexión aqui: " . mysqli_error($conexion));
          echo "Se registro:".$estadisticas_dj_reg." correctamente')
      ";
     
  
      }
     }
//------------- FIN ESTADISTICAS DJ
//-----------ZONA BACK

if (isset($_REQUEST['titulo_zona_back_reg'])) {
    
  $titulo= $_REQUEST[ 'titulo_zona_back_reg'];
  $link= $_REQUEST[ 'link'];
  $tipo_zona_back= $_REQUEST[ 'tipo_zona_back'];
  $demo_name= $_REQUEST[ 'demo_name'];
  $foto= $_REQUEST[ 'foto_name'];
  $id_usuario=$_SESSION['id_usuario'];
  $fecha_registro=date('Y-m-d');
  
  $consulta_tipo_usuario=mysqli_query($conexion, "SELECT * FROM zona_back WHERE  titulo='$titulo'") or die(mysqli_error($conexion));
  
  if(mysqli_num_rows($consulta_tipo_usuario)>0){
   // mysqli_query($conexion, "UPDATE usuarios SET nombre='$nombre_user', id_tipo_documento='$id_tipo_documento2', documento='$documento', id_tipo_usuario='$id_tipo_usuario2', contrasena='$contrasena'  WHERE documento='$documento'")or die("Problemas con la conexión: " . mysqli_error($conexion));
      echo "El titulo:".$titulo." ya existe')
      ";
     
  }else{
  
  mysqli_query($conexion, "INSERT INTO zona_back (id_usuario,titulo,link,tipo, foto,demo,fecha_registro) VALUES ('$id_usuario','$titulo','$link','$tipo_zona_back','$foto','$demo_name','$fecha_registro')")or die("Problemas con la conexión aqui: " . mysqli_error($conexion));
          echo "Se registro:".$titulo." correctamente')
      ";
     
  
      }
     }
//------------- FIN ZONA BACK

//-----------GENEROS

if (isset($_REQUEST['nombre_genero_reg'])) {
    
  $titulo= $_REQUEST[ 'nombre_genero_reg'];
  $foto= $_REQUEST[ 'foto_name'];
  $id_usuario=$_SESSION['id_usuario'];
  $fecha_registro=date('Y-m-d');
  
  $consulta_tipo_usuario=mysqli_query($conexion, "SELECT * FROM generos WHERE  genero='$titulo'") or die(mysqli_error($conexion));
  
  if(mysqli_num_rows($consulta_tipo_usuario)>0){
   // mysqli_query($conexion, "UPDATE usuarios SET nombre='$nombre_user', id_tipo_documento='$id_tipo_documento2', documento='$documento', id_tipo_usuario='$id_tipo_usuario2', contrasena='$contrasena'  WHERE documento='$documento'")or die("Problemas con la conexión: " . mysqli_error($conexion));
      echo "El titulo:".$titulo." ya existe')
      ";
     
  }else{
  
  mysqli_query($conexion, "INSERT INTO generos (id_usuario,genero,foto,fecha_registro) VALUES ('$id_usuario','$titulo','$foto','$fecha_registro')")or die("Problemas con la conexión aqui: " . mysqli_error($conexion));
          echo "Se registro:".$titulo." correctamente')
      ";
     
  
      }
     }
//------------- FIN GENEROS
//-----------FONDO PERFILES

if (isset($_REQUEST['estado_reg_fondo'])) {
    
  $estado_reg_fondo= $_REQUEST[ 'estado_reg_fondo'];
  $foto= $_REQUEST[ 'foto_name'];
  $id_usuario=$_SESSION['id_usuario'];
  $fecha_registro=date('Y-m-d');
  
  $consulta_tipo_usuario=mysqli_query($conexion, "SELECT * FROM fondo_perfiles WHERE  estado='$estado_reg_fondo'") or die(mysqli_error($conexion));
  
  if(mysqli_num_rows($consulta_tipo_usuario)>0){
   // mysqli_query($conexion, "UPDATE usuarios SET nombre='$nombre_user', id_tipo_documento='$id_tipo_documento2', documento='$documento', id_tipo_usuario='$id_tipo_usuario2', contrasena='$contrasena'  WHERE documento='$documento'")or die("Problemas con la conexión: " . mysqli_error($conexion));
      echo "El titulo:".$estado_reg_fondo." ya existe')
      ";
     
  }else{
  
  mysqli_query($conexion, "INSERT INTO fondo_perfiles (id_usuario,estado,foto,fecha_registro) VALUES ('$id_usuario','$estado_reg_fondo','$foto','$fecha_registro')")or die("Problemas con la conexión aqui: " . mysqli_error($conexion));
          echo "Se registro:".$estado_reg_fondo." correctamente')
      ";
     
  
      }
     }
//------------- FIN FONDO PERFILES
//-----------HISTORIA DJ
if (isset($_REQUEST['tipo_historia_reg'])) {
    
  $tipo_historia_reg= $_REQUEST[ 'tipo_historia_reg'];
  $titulo_historia_dj= $_REQUEST[ 'titulo_historia_dj'];
  $anio= $_REQUEST[ 'anio'];
  $resumen= $_REQUEST[ 'resumen'];

  
  $id_usuario=$_SESSION['id_usuario'];
  $fecha_registro=date('Y-m-d');
  
  $consulta_tipo_usuario=mysqli_query($conexion, "SELECT * FROM historia_dj WHERE  titulo='$titulo_historia_dj'") or die(mysqli_error($conexion));
  
  if(mysqli_num_rows($consulta_tipo_usuario)>0){
   // mysqli_query($conexion, "UPDATE usuarios SET nombre='$nombre_user', id_tipo_documento='$id_tipo_documento2', documento='$documento', id_tipo_usuario='$id_tipo_usuario2', contrasena='$contrasena'  WHERE documento='$documento'")or die("Problemas con la conexión: " . mysqli_error($conexion));
      echo "El titulo:".$titulo_historia_dj." ya existe')
      ";
     
  }else{
  
  mysqli_query($conexion, "INSERT INTO historia_dj (id_usuario,tipo,titulo,anio,resumen,fecha_registro) VALUES ('$id_usuario','$tipo_historia_reg','$titulo_historia_dj','$anio','$resumen','$fecha_registro')")or die("Problemas con la conexión aqui: " . mysqli_error($conexion));
          echo "Se registro:".$titulo_historia_dj." correctamente')
      ";
     
  
      }
     }
//------------- FIN HISTORIA DJ
//---------- SOBRE NOSOTROS
if (isset($_REQUEST['sobre_nosotros_reg'])) {
    
  $sobre_nosotros_reg= $_REQUEST[ 'sobre_nosotros_reg'];
  $resumen_sobre_nosotros_reg= $_REQUEST[ 'resumen_sobre_nosotros_reg'];
  $tlf_sobre_nosotros_reg= $_REQUEST[ 'tlf_sobre_nosotros_reg'];
  $ws_sobre_nosotros_reg= $_REQUEST[ 'ws_sobre_nosotros_reg'];
  $fb_sobre_nosotros_reg= $_REQUEST[ 'fb_sobre_nosotros_reg'];
  $inst_sobre_nosotros_reg= $_REQUEST[ 'inst_sobre_nosotros_reg'];
  $yt_sobre_nosotros_reg= $_REQUEST[ 'yt_sobre_nosotros_reg'];
  $soundcloud_sobre_nosotros_reg= $_REQUEST[ 'soundcloud_sobre_nosotros_reg'];
  $correo_sobre_nosotros_reg= $_REQUEST[ 'correo_sobre_nosotros_reg'];
  
  $id_usuario=$_SESSION['id_usuario'];
  $fecha_registro=date('Y-m-d');
  
  $consulta_tipo_usuario=mysqli_query($conexion, "SELECT * FROM sobre_nosotros WHERE  titulo='$sobre_nosotros_reg'") or die(mysqli_error($conexion));
  
  if(mysqli_num_rows($consulta_tipo_usuario)>0){
   // mysqli_query($conexion, "UPDATE usuarios SET nombre='$nombre_user', id_tipo_documento='$id_tipo_documento2', documento='$documento', id_tipo_usuario='$id_tipo_usuario2', contrasena='$contrasena'  WHERE documento='$documento'")or die("Problemas con la conexión: " . mysqli_error($conexion));
      echo "El titulo:".$sobre_nosotros_reg." ya existe')
      ";
     
  }else{
  
  mysqli_query($conexion, "INSERT INTO sobre_nosotros (id_usuario,titulo,resumen,telefono,ws,fb,instagram,soundcloud,youtube,correo,fecha_registro) VALUES ('$id_usuario','$sobre_nosotros_reg','$resumen_sobre_nosotros_reg','$tlf_sobre_nosotros_reg','$ws_sobre_nosotros_reg','$fb_sobre_nosotros_reg','$inst_sobre_nosotros_reg','$soundcloud_sobre_nosotros_reg','$yt_sobre_nosotros_reg','$correo_sobre_nosotros_reg','$fecha_registro')")or die("Problemas con la conexión aqui: " . mysqli_error($conexion));
          echo "Se registro:".$sobre_nosotros_reg." correctamente')
      ";
     
  
      }
     }
//------------- FIN SOBRE NOSOTROS
//---------- TIPO DE CAMBIO

if (isset($_REQUEST['tipo_cambio_reg'])) {
    
  $tipo_cambio_reg= $_REQUEST[ 'tipo_cambio_reg'];
  
  
  $id_usuario=$_SESSION['id_usuario'];
  $fecha_registro=date('Y-m-d');
  
  $consulta_tipo_usuario=mysqli_query($conexion, "SELECT * FROM tipo_cambio WHERE  tipo='$tipo_cambio_reg'") or die(mysqli_error($conexion));
  
  if(mysqli_num_rows($consulta_tipo_usuario)>0){
   // mysqli_query($conexion, "UPDATE usuarios SET nombre='$nombre_user', id_tipo_documento='$id_tipo_documento2', documento='$documento', id_tipo_usuario='$id_tipo_usuario2', contrasena='$contrasena'  WHERE documento='$documento'")or die("Problemas con la conexión: " . mysqli_error($conexion));
      echo "El :".$tipo_cambio_reg." ya existe')
      ";
     
  }else{
  
  mysqli_query($conexion, "INSERT INTO tipo_cambio (id_usuario,tipo,fecha_registro) VALUES ('$id_usuario','$tipo_cambio_reg','$fecha_registro')")or die("Problemas con la conexión aqui: " . mysqli_error($conexion));
          echo "Se registro:".$tipo_cambio_reg." correctamente')
      ";
     
  
      }
     }
//------------- FIN TIPO DE CAMBIO

//-----------EDICIONES, MIXES, PACKS, BEATS, LIBRERIA
if (isset($_REQUEST['nombre_cancion_reg_beats'])) {
    
  $nombre_cancion_reg_beats= $_REQUEST[ 'nombre_cancion_reg_beats'];
  $artista_= $_REQUEST[ 'artista_'];
  $bpm= $_REQUEST[ 'bpm'];
  $link= $_REQUEST[ 'link'];
  $estilo_mix= $_REQUEST[ 'estilo_mix'];
  $tipo_mix= $_REQUEST[ 'tipo_mix'];
  $foto_name= $_REQUEST[ 'foto_name'];
  $demo_name= $_REQUEST[ 'demo_name'];
  $genero= $_REQUEST[ 'genero'];
  $costo= $_REQUEST[ 'costo'];
  $id_usuario=$_SESSION['id_usuario'];
  $nombre_usuario=$_SESSION['usuario'];

  $fecha_registro=date('Y-m-d');
  
  $consulta_tipo_usuario=mysqli_query($conexion, "SELECT * FROM beats WHERE  nombre_cancion='$nombre_cancion_reg_beats'") or die(mysqli_error($conexion));
  
  if(mysqli_num_rows($consulta_tipo_usuario)>0){
   // mysqli_query($conexion, "UPDATE usuarios SET nombre='$nombre_user', id_tipo_documento='$id_tipo_documento2', documento='$documento', id_tipo_usuario='$id_tipo_usuario2', contrasena='$contrasena'  WHERE documento='$documento'")or die("Problemas con la conexión: " . mysqli_error($conexion));
      echo "El titulo:".$nombre_cancion_reg_beats." ya existe')
      ";
     
  }else{
  
  mysqli_query($conexion, "INSERT INTO beats (id_usuario,nombre_cancion,artista_original,artista,demo, link,foto,tipo,costo,estilo,bpm,genero,fecha_registro) VALUES ('$id_usuario','$nombre_cancion_reg_beats','$artista_','$nombre_usuario','$demo_name','$link','$foto_name','$tipo_mix','$costo','$estilo_mix','$bpm','$genero','$fecha_registro')")or die("Problemas con la conexión aqui: " . mysqli_error($conexion));
          echo "Se registro:".$nombre_cancion_reg_beats." correctamente')
      ";
      }
     }
if (isset($_REQUEST['nombre_cancion_reg_libreria'])) {
    
      $nombre_cancion_reg_libreria= $_REQUEST[ 'nombre_cancion_reg_libreria'];
      $artista_= $_REQUEST[ 'artista_'];
      if ($_REQUEST[ 'bpm']=="") {
        $bpm= ".";
      }else{
        $bpm= $_REQUEST[ 'bpm'];
      }
      $link= $_REQUEST[ 'link'];
      $estilo_mix= $_REQUEST[ 'estilo_mix'];
      $tipo_mix= $_REQUEST[ 'tipo_mix'];
      $foto_name= $_REQUEST[ 'foto_name'];
      $demo_name= $_REQUEST[ 'demo_name'];
      $genero= $_REQUEST[ 'genero'];
      $costo= $_REQUEST[ 'costo'];
      $id_usuario=$_SESSION['id_usuario'];
      $nombre_usuario=$_SESSION['usuario'];
    
      $fecha_registro=date('Y-m-d');
      
      $consulta_tipo_usuario=mysqli_query($conexion, "SELECT * FROM libreria WHERE  nombre_cancion='$nombre_cancion_reg_libreria'") or die(mysqli_error($conexion));
      
      if(mysqli_num_rows($consulta_tipo_usuario)>0){
       // mysqli_query($conexion, "UPDATE usuarios SET nombre='$nombre_user', id_tipo_documento='$id_tipo_documento2', documento='$documento', id_tipo_usuario='$id_tipo_usuario2', contrasena='$contrasena'  WHERE documento='$documento'")or die("Problemas con la conexión: " . mysqli_error($conexion));
          echo "El titulo:".$nombre_cancion_reg_libreria." ya existe')
          ";
         
      }else{
      
      mysqli_query($conexion, "INSERT INTO libreria (id_usuario,nombre_cancion,artista_original,artista,demo, link,foto,tipo,costo,estilo,bpm,genero,fecha_registro) VALUES ('$id_usuario','$nombre_cancion_reg_libreria','$artista_','$nombre_usuario','$demo_name','$link','$foto_name','$tipo_mix','$costo','$estilo_mix','$bpm','$genero','$fecha_registro')")or die("Problemas con la conexión aqui: " . mysqli_error($conexion));
              echo "Se registro:".$nombre_cancion_reg_libreria." correctamente')
          ";
          }
         }
if (isset($_REQUEST['nombre_cancion_reg_ediciones'])) {
    
  $nombre_cancion_reg_mixes= $_REQUEST[ 'nombre_cancion_reg_ediciones'];
  $artista_= $_REQUEST[ 'artista_'];
  $bpm= $_REQUEST[ 'bpm'];
  $link= $_REQUEST[ 'link'];
  $estilo_mix= $_REQUEST[ 'estilo_mix'];
  $tipo_mix= $_REQUEST[ 'tipo_mix'];
  $foto_name= $_REQUEST[ 'foto_name'];
  $demo_name= $_REQUEST[ 'demo_name'];
  $genero= $_REQUEST[ 'genero'];
  $costo= $_REQUEST[ 'costo'];
  $id_usuario=$_SESSION['id_usuario'];
  $nombre_usuario=$_SESSION['usuario'];

  $fecha_registro=date('Y-m-d');
  
  $consulta_tipo_usuario=mysqli_query($conexion, "SELECT * FROM ediciones WHERE  nombre_cancion='$nombre_cancion_reg_mixes'") or die(mysqli_error($conexion));
  
  if(mysqli_num_rows($consulta_tipo_usuario)>0){
   // mysqli_query($conexion, "UPDATE usuarios SET nombre='$nombre_user', id_tipo_documento='$id_tipo_documento2', documento='$documento', id_tipo_usuario='$id_tipo_usuario2', contrasena='$contrasena'  WHERE documento='$documento'")or die("Problemas con la conexión: " . mysqli_error($conexion));
      echo "El titulo:".$nombre_cancion_reg_mixes." ya existe')
      ";
     
  }else{
  
  mysqli_query($conexion, "INSERT INTO ediciones (id_usuario,nombre_cancion,artista_original,artista,demo, link,foto,tipo,costo,estilo,bpm,genero,fecha_registro) VALUES ('$id_usuario','$nombre_cancion_reg_mixes','$artista_','$nombre_usuario','$demo_name','$link','$foto_name','$tipo_mix','$costo','$estilo_mix','$bpm','$genero','$fecha_registro')")or die("Problemas con la conexión aqui: " . mysqli_error($conexion));
          echo "Se registro:".$nombre_cancion_reg_mixes." correctamente')
      ";
      }
     }


if (isset($_REQUEST['nombre_cancion_reg_mixes'])) {
    
      $nombre_cancion_reg_mixes= $_REQUEST[ 'nombre_cancion_reg_mixes'];
      $artista_= $_REQUEST[ 'artista_'];

  if ($_REQUEST[ 'bpm']=="") {
    $bpm= ".";
  }else{
    $bpm= $_REQUEST[ 'bpm'];
  }

      



      $link= $_REQUEST[ 'link'];
      $costo= $_REQUEST[ 'costo'];
      $estilo_mix= $_REQUEST[ 'estilo_mix'];
      $tipo_mix= $_REQUEST[ 'tipo_mix'];
      $foto_name= $_REQUEST[ 'foto_name'];
      $demo_name= $_REQUEST[ 'demo_name'];
      $genero= $_REQUEST[ 'genero'];
      $id_usuario=$_SESSION['id_usuario'];
      $nombre_usuario=$_SESSION['usuario'];
      $fecha_registro=date('Y-m-d');
      
      $consulta_tipo_usuario=mysqli_query($conexion, "SELECT * FROM mixes WHERE  nombre_cancion='$nombre_cancion_reg_mixes'") or die(mysqli_error($conexion));
      
      if(mysqli_num_rows($consulta_tipo_usuario)>0){
       // mysqli_query($conexion, "UPDATE usuarios SET nombre='$nombre_user', id_tipo_documento='$id_tipo_documento2', documento='$documento', id_tipo_usuario='$id_tipo_usuario2', contrasena='$contrasena'  WHERE documento='$documento'")or die("Problemas con la conexión: " . mysqli_error($conexion));
          echo "El titulo:".$nombre_cancion_reg_mixes." ya existe')
          ";
         
      }else{
      
      mysqli_query($conexion, "INSERT INTO mixes (id_usuario,nombre_cancion,artista_original,artista,demo, link,foto,tipo,estilo,bpm,genero,costo,fecha_registro) VALUES ('$id_usuario','$nombre_cancion_reg_mixes','$artista_','$nombre_usuario','$demo_name','$link','$foto_name','$tipo_mix','$estilo_mix','$bpm','$genero','$costo','$fecha_registro')")or die("Problemas con la conexión aqui: " . mysqli_error($conexion));
              echo "Se registro:".$nombre_cancion_reg_mixes." correctamente')
          ";
          }
         }


if (isset($_REQUEST['nombre_cancion_reg_packs'])) {
    
          $nombre_cancion_reg_mixes= $_REQUEST[ 'nombre_cancion_reg_packs'];
          $artista_= $_REQUEST[ 'artista_'];
          if ($_REQUEST[ 'bpm']=="") {
            $bpm= ".";
          }else{
            $bpm= $_REQUEST[ 'bpm'];
          }
          $link= $_REQUEST[ 'link'];
          $estilo_mix= $_REQUEST[ 'estilo_mix'];
          $tipo_mix= $_REQUEST[ 'tipo_mix'];
          $foto_name= $_REQUEST[ 'foto_name'];
          $demo_name= $_REQUEST[ 'demo_name'];
          $genero= $_REQUEST[ 'genero'];
          $tracks=$_REQUEST['tracks'];
          $costo=$_REQUEST['costo'];
          $id_usuario=$_SESSION['id_usuario'];
          $nombre_usuario=$_SESSION['usuario'];
          $fecha_registro=date('Y-m-d');
          
          $consulta_tipo_usuario=mysqli_query($conexion, "SELECT * FROM packs WHERE  nombre_cancion='$nombre_cancion_reg_mixes'") or die(mysqli_error($conexion));
          
          if(mysqli_num_rows($consulta_tipo_usuario)>0){
           // mysqli_query($conexion, "UPDATE usuarios SET nombre='$nombre_user', id_tipo_documento='$id_tipo_documento2', documento='$documento', id_tipo_usuario='$id_tipo_usuario2', contrasena='$contrasena'  WHERE documento='$documento'")or die("Problemas con la conexión: " . mysqli_error($conexion));
              echo "El titulo:".$nombre_cancion_reg_mixes." ya existe')
              ";
             
          }else{
            $consulta_a=mysqli_query($conexion, "SELECT * FROM usuarios WHERE  id_usuario ='$id_usuario'") or die(mysqli_error($conexion));
            $MostrarFilaa=mysqli_fetch_array($consulta_a);
            $grupo=$MostrarFilac['grupo'];
          mysqli_query($conexion, "INSERT INTO packs (id_usuario,grupo,nombre_cancion,artista_original,artista,tracks,demo, link,foto,tipo,costo,estilo,bpm,genero,fecha_registro) VALUES ('$id_usuario','$grupo','$nombre_cancion_reg_mixes','$artista_','$nombre_usuario','$tracks','$demo_name','$link','$foto_name','$tipo_mix','$costo','$estilo_mix','$bpm','$genero','$fecha_registro')")or die("Problemas con la conexión aqui: " . mysqli_error($conexion));
                  echo "Se registro:".$nombre_cancion_reg_mixes." correctamente')
              ";
              }
             }
//------------- FIN EDICIONES MIXES PACK

//  EDITAR
if (isset($_REQUEST['id_edit'])) {
    if (isset($_REQUEST['edit_descripcion_tipo_usuario'])) {
      $id_edit= $_REQUEST[ 'id_edit'];
      $edit_descripcion_tipo_usuario= $_REQUEST[ 'edit_descripcion_tipo_usuario'];
      $fecha_registro=date('Y-m-d');
      
      $consulta_tipo_usuario=mysqli_query($conexion, "SELECT * FROM tipos_usuario WHERE id_tipo_usuario='$id_edit'") or die(mysqli_error($conexion));
      
      if(mysqli_num_rows($consulta_tipo_usuario)>0){
       mysqli_query($conexion, "UPDATE tipos_usuario SET nombre='$edit_descripcion_tipo_usuario', fecha_registro='$fecha_registro'  WHERE id_tipo_usuario='$id_edit'")or die("Problemas con la conexión aqui: " . mysqli_error($conexion));
          echo "'El actualizo tipo de usuario:".$edit_descripcion_tipo_usuario."')
          ";
         
        }else{
        echo "'No se encuentra el tipo usuario:".$edit_descripcion_tipo_usuario."')
          ";        
      } 
    }


    if (isset($_REQUEST['nombre_usuario_edit'])) {
      $id_edit= $_REQUEST[ 'id_edit'];
      $nombre_apellido= $_REQUEST[ 'nombre_apellido'];
      $nombre_usuario_edit= $_REQUEST[ 'nombre_usuario_edit'];
      $clave= $_REQUEST[ 'clave'];
      $email= $_REQUEST[ 'email'];
      $tipo_usuario= $_REQUEST[ 'tipo_usuario'];
      $grupo= $_REQUEST[ 'grupo'];
      
      $fecha_registro=date('Y-m-d');
      
      $consulta_tipo_usuario=mysqli_query($conexion, "SELECT * FROM usuarios WHERE id_usuario='$id_edit'") or die(mysqli_error($conexion));
      
      if(mysqli_num_rows($consulta_tipo_usuario)>0){
        mysqli_query($conexion, "UPDATE usuarios SET nombre_apellido='$nombre_apellido',usuario='$nombre_usuario_edit',clave='$clave',correo='$email',id_tipo_usuario='$tipo_usuario',grupo='$grupo', fecha_registro='$fecha_registro'  WHERE id_usuario='$id_edit'")or die("Problemas con la conexión aqui: " . mysqli_error($conexion));
          echo "'El actualizo de usuario:".$nombre_usuario_edit."' ";
         
        }else{
        echo "'No se encuentra el usuario:".$nombre_usuario_edit."  ";        
      } 
    }
  


    if (isset($_REQUEST['titulo_slide_edit'])) {
      $id_edit= $_REQUEST[ 'id_edit'];
      $titulo_slide_edit= $_REQUEST[ 'titulo_slide_edit'];
      $resumen= $_REQUEST[ 'resumen'];
      $link= $_REQUEST[ 'link'];
           
      $fecha_registro=date('Y-m-d');
      
      $consulta_tipo_usuario=mysqli_query($conexion, "SELECT * FROM carousel_index WHERE id='$id_edit'") or die(mysqli_error($conexion));
      
      if(mysqli_num_rows($consulta_tipo_usuario)>0){
        mysqli_query($conexion, "UPDATE carousel_index SET titulo='$titulo_slide_edit',resumen='$resumen',link='$link', fecha_registro='$fecha_registro'  WHERE id='$id_edit'")or die("Problemas con la conexión aqui: " . mysqli_error($conexion));
          echo "'El actualizo de slide:".$titulo_slide_edit."' ";
         
        }else{
        echo "'No se encuentra el slide:".$titulo_slide_edit."  ";        
      } 
    }

    if (isset($_REQUEST['descripcion_banner_pub_edit'])) {
      $id_edit= $_REQUEST[ 'id_edit'];
      $descripcion_banner_pub_edit= $_REQUEST[ 'descripcion_banner_pub_edit'];
      $estado= $_REQUEST[ 'estado'];
      $link= $_REQUEST[ 'link'];
      $tipo_banner= $_REQUEST[ 'tipo_banner'];     
      $fecha_registro=date('Y-m-d');
      
      $consulta_tipo_usuario=mysqli_query($conexion, "SELECT * FROM banner_publicidad WHERE id='$id_edit'") or die(mysqli_error($conexion));
      
      if(mysqli_num_rows($consulta_tipo_usuario)>0){
        mysqli_query($conexion, "UPDATE banner_publicidad SET descripcion='$descripcion_banner_pub_edit',estado='$estado',link='$link', tipo='$tipo_banner', fecha_registro='$fecha_registro'  WHERE id='$id_edit'")or die("Problemas con la conexión aqui: " . mysqli_error($conexion));
          echo "'El actualizo:".$descripcion_banner_pub_edit."' ";
         
        }else{
        echo "'No se encuentra :".$descripcion_banner_pub_edit."  ";        
      } 
    }


if (isset($_REQUEST['nombre_apellido_about_edit'])) {
      $id_edit= $_REQUEST[ 'id_edit'];
      $nombre_apellido_about_reg= $_REQUEST[ 'nombre_apellido_about_edit'];
       $id_usuario=$_SESSION['id_usuario'];
      $resumen= $_REQUEST[ 'resumen'];
      $ubicacion_actual= $_REQUEST[ 'ubicacion_actual'];
     $experiencia= $_REQUEST[ 'experiencia'];
     $mixes= $_REQUEST[ 'mixes'];
      $servicio= $_REQUEST[ 'servicio'];
      $ws= $_REQUEST[ 'ws'];
      $fb= $_REQUEST[ 'fb'];
      $inst= $_REQUEST[ 'inst'];
      $twit= $_REQUEST[ 'twit'];
      $youtube= $_REQUEST[ 'youtube'];
      $ticktock= $_REQUEST[ 'ticktock'];
      $soundcloud= $_REQUEST[ 'soundcloud'];
      $spotify= $_REQUEST[ 'spotify'];
      $foto= "";
           
      $fecha_registro=date('Y-m-d');

      if (is_array($_REQUEST['intereses'])) {
        $selected = '';
        $num_intereses = count($_REQUEST['intereses']);
        $current = 0;
        foreach ($_REQUEST['intereses'] as $key => $value) {
            if ($current != $num_intereses-1)
                $selected .= $value.',';
            else
                $selected .= $value.'';
            $current++;
        }
    }
    else {
        $selected = 'Sin intereses';
    }
      $consulta_tipo_usuario=mysqli_query($conexion, "SELECT * FROM about_me WHERE id_resumen='$id_edit'") or die(mysqli_error($conexion));
      
      if(mysqli_num_rows($consulta_tipo_usuario)>0){
        mysqli_query($conexion, "UPDATE about_me SET nombre_apellido='$nombre_apellido_about_reg',resumen='$resumen',ubicacion='$ubicacion_actual',experiencia='$experiencia', cant_mixes='$mixes',ws='$ws',facebook='$fb', instagram='$inst', twitter='$twit',youtube='$youtube',ticktock='$ticktock', soundcloud='$soundcloud', spotify='$spotify',servicio='$servicio',intereses='$selected',fecha_registro='$fecha_registro' WHERE id_resumen='$id_edit'")or die("Problemas con la conexión aqui: " . mysqli_error($conexion));
          echo "'El actualizo :".$nombre_apellido_about_reg."' ";
         
        }else{
        echo "'No se encuentra :".$nombre_apellido_about_reg."  ";        
      } 
}


if (isset($_REQUEST['tipo_servicio_edit'])) {
      $id_edit= $_REQUEST[ 'id_edit'];
      $tipo_servicio_edit= $_REQUEST[ 'tipo_servicio_edit'];
  $costo= $_REQUEST["costo"];
  $modalidad= $_REQUEST[ 'modalidad'];
  $linea1= $_REQUEST[ 'linea1'];
  $linea2= $_REQUEST[ 'linea2'];
  $linea3= $_REQUEST[ 'linea3'];
  $linea4= $_REQUEST[ 'linea4'];
           
      $fecha_registro=date('Y-m-d');
      
      $consulta_tipo_usuario=mysqli_query($conexion, "SELECT * FROM servicios_dj WHERE id_servicio='$id_edit'") or die(mysqli_error($conexion));
      
      if(mysqli_num_rows($consulta_tipo_usuario)>0){
        mysqli_query($conexion, "UPDATE servicios_dj SET tipo='$tipo_servicio_edit',costo='$costo', modalidad='$modalidad',linea1='$linea1',linea2='$linea2',linea3='$linea3',linea4='$linea4',fecha_registro='$fecha_registro'  WHERE id_servicio='$id_edit'")or die("Problemas con la conexión aqui: " . mysqli_error($conexion));
          echo "'El actualizo de slide:".$tipo_servicio_edit."' ";
         
        }else{
        echo "'No se encuentra el slide:".$tipo_servicio_edit."  ";        
      } 
    }

if (isset($_REQUEST['nombre_edit_genero'])) {
      $id_edit= $_REQUEST[ 'id_edit'];
      $nombre_edit_genero= $_REQUEST[ 'nombre_edit_genero'];
  
           
      $fecha_registro=date('Y-m-d');
      
      $consulta_tipo_usuario=mysqli_query($conexion, "SELECT * FROM generos WHERE id='$id_edit'") or die(mysqli_error($conexion));
      
      if(mysqli_num_rows($consulta_tipo_usuario)>0){
        mysqli_query($conexion, "UPDATE generos SET genero='$nombre_edit_genero',fecha_registro='$fecha_registro'  WHERE id='$id_edit'")or die("Problemas con la conexión aqui: " . mysqli_error($conexion));
          echo "'El actualizo de slide:".$nombre_edit_genero."' ";
         
        }else{
        echo "'No se encuentra el slide:".$nombre_edit_genero."  ";        
      } 
    }


if (isset($_REQUEST['nombre_cancion_edit_ediciones'])) {
      $id_edit= $_REQUEST[ 'id_edit'];
      $nombre_cancion_reg_mixes= $_REQUEST[ 'nombre_cancion_edit_ediciones'];
      $artista_= $_REQUEST[ 'artista_'];
      $bpm= $_REQUEST[ 'bpm'];
      $link= $_REQUEST[ 'link'];
      $tipo_mix= $_REQUEST[ 'tipo_mix'];
      $costo= $_REQUEST[ 'costo'];
      $estilo_mix= $_REQUEST[ 'estilo_mix'];
     
      $genero= $_REQUEST[ 'genero'];
           
      $fecha_registro=date('Y-m-d');
      
      $consulta_tipo_usuario=mysqli_query($conexion, "SELECT * FROM ediciones WHERE id='$id_edit'") or die(mysqli_error($conexion));
      
      if(mysqli_num_rows($consulta_tipo_usuario)>0){
        mysqli_query($conexion, "UPDATE ediciones SET nombre_cancion='$nombre_cancion_reg_mixes',artista_original='$artista_', bpm='$bpm',link='$link',tipo='$tipo_mix',estilo='$estilo_mix',genero='$genero',costo='$costo',fecha_registro='$fecha_registro'  WHERE id='$id_edit'")or die("Problemas con la conexión aqui: " . mysqli_error($conexion));
          echo "'El actualizo de :".$nombre_cancion_reg_mixes."' ";
         
        }else{
        echo "'No se encuentra el :".$nombre_cancion_reg_mixes."  ";        
      } 
    }
if (isset($_REQUEST['nombre_cancion_edit_beats'])) {
      $id_edit= $_REQUEST[ 'id_edit'];
      $nombre_cancion_edit_beats= $_REQUEST[ 'nombre_cancion_edit_beats'];
      $artista_= $_REQUEST[ 'artista_'];
      $bpm= $_REQUEST[ 'bpm'];
      $link= $_REQUEST[ 'link'];
      $tipo_mix= $_REQUEST[ 'tipo_mix'];
      $costo= $_REQUEST[ 'costo'];
      $estilo_mix= $_REQUEST[ 'estilo_mix'];
     
      $genero= $_REQUEST[ 'genero'];
           
      $fecha_registro=date('Y-m-d');
      
      $consulta_tipo_usuario=mysqli_query($conexion, "SELECT * FROM beats WHERE id='$id_edit'") or die(mysqli_error($conexion));
      
      if(mysqli_num_rows($consulta_tipo_usuario)>0){
        mysqli_query($conexion, "UPDATE beats SET nombre_cancion='$nombre_cancion_edit_beats',artista_original='$artista_', bpm='$bpm',link='$link',tipo='$tipo_mix',estilo='$estilo_mix',genero='$genero',costo='$costo',fecha_registro='$fecha_registro'  WHERE id='$id_edit'")or die("Problemas con la conexión aqui: " . mysqli_error($conexion));
          echo "'El actualizo de :".$nombre_cancion_edit_beats."' ";
         
        }else{
        echo "'No se encuentra el :".$nombre_cancion_edit_beats."  ";        
      } 
    }
if (isset($_REQUEST['nombre_cancion_edit_libreria'])) {
      $id_edit= $_REQUEST[ 'id_edit'];
      $nombre_cancion_edit_libreria= $_REQUEST[ 'nombre_cancion_edit_libreria'];
      $artista_= $_REQUEST[ 'artista_'];
      $bpm= $_REQUEST[ 'bpm'];
      $link= $_REQUEST[ 'link'];
      $tipo_mix= $_REQUEST[ 'tipo_mix'];
      $costo= $_REQUEST[ 'costo'];
      $estilo_mix= $_REQUEST[ 'estilo_mix'];
     
      $genero= $_REQUEST[ 'genero'];
           
      $fecha_registro=date('Y-m-d');
      
      $consulta_tipo_usuario=mysqli_query($conexion, "SELECT * FROM libreria WHERE id='$id_edit'") or die(mysqli_error($conexion));
      
      if(mysqli_num_rows($consulta_tipo_usuario)>0){
        mysqli_query($conexion, "UPDATE libreria SET nombre_cancion='$nombre_cancion_edit_libreria',artista_original='$artista_', bpm='$bpm',link='$link',tipo='$tipo_mix',estilo='$estilo_mix',genero='$genero',costo='$costo',fecha_registro='$fecha_registro'  WHERE id='$id_edit'")or die("Problemas con la conexión aqui: " . mysqli_error($conexion));
          echo "'El actualizo de :".$nombre_cancion_edit_libreria."' ";
         
        }else{
        echo "'No se encuentra el :".$nombre_cancion_edit_libreria."  ";        
      } 
    }
if (isset($_REQUEST['nombre_cancion_edit_mixes'])) {
      $id_edit= $_REQUEST[ 'id_edit'];
      $nombre_cancion_reg_mixes= $_REQUEST[ 'nombre_cancion_edit_mixes'];
      $artista_= $_REQUEST[ 'artista_'];
      $bpm= $_REQUEST[ 'bpm'];
      $link= $_REQUEST[ 'link'];
      $costo= $_REQUEST[ 'costo'];
      $tipo_mix= $_REQUEST[ 'tipo_mix'];
      $estilo_mix= $_REQUEST[ 'estilo_mix'];
     
      $genero= $_REQUEST[ 'genero'];
           
      $fecha_registro=date('Y-m-d');
      
      $consulta_tipo_usuario=mysqli_query($conexion, "SELECT * FROM mixes WHERE id='$id_edit'") or die(mysqli_error($conexion));
      
      if(mysqli_num_rows($consulta_tipo_usuario)>0){
        mysqli_query($conexion, "UPDATE mixes SET nombre_cancion='$nombre_cancion_reg_mixes',artista_original='$artista_', bpm='$bpm',link='$link',tipo='$tipo_mix',estilo='$estilo_mix',genero='$genero',costo='$costo',fecha_registro='$fecha_registro'  WHERE id='$id_edit'")or die("Problemas con la conexión aqui: " . mysqli_error($conexion));
          echo "'El actualizo de :".$nombre_cancion_reg_mixes."' ";
         
        }else{
        echo "'No se encuentra el :".$nombre_cancion_reg_mixes."  ";        
      } 
    }

if (isset($_REQUEST['nombre_cancion_edit_packs'])) {
      $id_edit= $_REQUEST[ 'id_edit'];
      $nombre_cancion_reg_mixes= $_REQUEST[ 'nombre_cancion_edit_packs'];
      $artista_= $_REQUEST[ 'artista_'];
      $bpm= $_REQUEST[ 'bpm'];
      $link= $_REQUEST[ 'link'];
      $tipo_mix= $_REQUEST[ 'tipo_mix'];
      $costo= $_REQUEST[ 'costo'];
      $tracks=$_REQUEST['tracks'];
      $estilo_mix= $_REQUEST[ 'estilo_mix'];
     
      $genero= $_REQUEST[ 'genero'];
           
      $fecha_registro=date('Y-m-d');
      
      $consulta_tipo_usuario=mysqli_query($conexion, "SELECT * FROM packs WHERE id='$id_edit'") or die(mysqli_error($conexion));
      
      if(mysqli_num_rows($consulta_tipo_usuario)>0){
        mysqli_query($conexion, "UPDATE packs SET nombre_cancion='$nombre_cancion_reg_mixes',artista_original='$artista_', tracks='$tracks',bpm='$bpm',link='$link',tipo='$tipo_mix',estilo='$estilo_mix',costo='$costo',genero='$genero',fecha_registro='$fecha_registro'  WHERE id='$id_edit'")or die("Problemas con la conexión aqui: " . mysqli_error($conexion));
          echo "'El actualizo de :".$nombre_cancion_reg_mixes."' ";
         
        }else{
        echo "'No se encuentra el :".$nombre_cancion_reg_mixes."  ";        
      } 
    }


if (isset($_REQUEST['tipo_plan_edit'])) {
      $id_edit= $_REQUEST[ 'id_edit'];
      $tipo_plan_edit= $_REQUEST[ 'tipo_plan_edit'];
  $costo= $_REQUEST["costo"];
  $modalidad= $_REQUEST[ 'modalidad'];
  $linea1= $_REQUEST[ 'linea1'];
  $linea2= $_REQUEST[ 'linea2'];
  $linea3= $_REQUEST[ 'linea3'];
  $linea4= $_REQUEST[ 'linea4'];
  $estado= $_REQUEST[ 'estado'];  
      $fecha_registro=date('Y-m-d');
      
      $consulta_tipo_usuario=mysqli_query($conexion, "SELECT * FROM planes_principales WHERE id='$id_edit'") or die(mysqli_error($conexion));
      
      if(mysqli_num_rows($consulta_tipo_usuario)>0){
        mysqli_query($conexion, "UPDATE planes_principales SET tipo='$tipo_plan_edit',costo='$costo', modo='$modalidad',linea1='$linea1',linea2='$linea2',linea3='$linea3',linea4='$linea4',estado='$estado',fecha_registro='$fecha_registro'  WHERE id='$id_edit'")or die("Problemas con la conexión aqui: " . mysqli_error($conexion));
          echo "'El actualizo de plan:".$tipo_plan_edit."' ";
         
        }else{
        echo "'No se encuentra el plan:".$tipo_plan_edit."  ";        
      } 
    }


if (isset($_REQUEST['titulo_evento_edit'])) {
      $id_edit= $_REQUEST[ 'id_edit'];
      $titulo_evento_edit= $_REQUEST[ 'titulo_evento_edit'];
      $resumen= $_REQUEST[ 'resumen'];
      $descripcion= $_REQUEST[ 'descripcion'];
      $fecha_evento= $_REQUEST[ 'fecha_evento'];
      $fecha_registro=date('Y-m-d');
      
      $consulta_tipo_usuario=mysqli_query($conexion, "SELECT * FROM eventos WHERE id='$id_edit'") or die(mysqli_error($conexion));
      
      if(mysqli_num_rows($consulta_tipo_usuario)>0){
        mysqli_query($conexion, "UPDATE eventos SET titulo='$titulo_evento_edit',descripcion='$descripcion', resumen='$resumen',fecha_evento='$fecha_evento',fecha_registro='$fecha_registro'  WHERE id='$id_edit'")or die("Problemas con la conexión aqui: " . mysqli_error($conexion));
          echo "'El actualizo de evento:".$titulo_evento_edit."' ";
         
        }else{
        echo "'No se encuentra el evento:".$titulo_evento_edit."  ";        
      } 
    }

if (isset($_REQUEST['estadisticas_dj_edit'])) {
      $id_edit= $_REQUEST[ 'id_edit'];
      $estadisticas_dj_edit= $_REQUEST[ 'estadisticas_dj_edit'];
      $produc_estadisticas_dj_reg= $_REQUEST[ 'produc_estadisticas_dj_reg'];
      $editor_estadisticas_dj_reg= $_REQUEST[ 'editor_estadisticas_dj_reg'];
      $calidad_estadisticas_dj_reg= $_REQUEST[ 'calidad_estadisticas_dj_reg'];
      $fecha_registro=date('Y-m-d');
      
      $consulta_tipo_usuario=mysqli_query($conexion, "SELECT * FROM estadisticas_dj WHERE id='$id_edit'") or die(mysqli_error($conexion));
      
    if(mysqli_num_rows($consulta_tipo_usuario)>0){
        mysqli_query($conexion, "UPDATE estadisticas_dj SET dj='$estadisticas_dj_edit',productor='$produc_estadisticas_dj_reg', editor='$editor_estadisticas_dj_reg',calidad='$calidad_estadisticas_dj_reg',fecha_registro='$fecha_registro'  WHERE id='$id_edit'")or die("Problemas con la conexión aqui: " . mysqli_error($conexion));
          echo "'El actualizo de evento:".$estadisticas_dj_edit."' ";
         
        }else{
        echo "'No se encuentra el evento:".$estadisticas_dj_edit."  ";        
      } 
    }



if (isset($_REQUEST['tipo_historia_edit'])) {
      $id_edit= $_REQUEST[ 'id_edit'];
      $tipo_historia_edit= $_REQUEST[ 'tipo_historia_edit'];
      $titulo_historia_dj= $_REQUEST[ 'titulo_historia_dj'];
      $anio= $_REQUEST[ 'anio'];
      $resumen= $_REQUEST[ 'resumen'];
      $fecha_registro=date('Y-m-d');
      
      $consulta_tipo_usuario=mysqli_query($conexion, "SELECT * FROM historia_dj WHERE id='$id_edit'") or die(mysqli_error($conexion));
      
      if(mysqli_num_rows($consulta_tipo_usuario)>0){
        mysqli_query($conexion, "UPDATE historia_dj SET tipo='$tipo_historia_edit',titulo='$titulo_historia_dj', anio='$anio',resumen='$resumen',fecha_registro='$fecha_registro'  WHERE id='$id_edit'")or die("Problemas con la conexión aqui: " . mysqli_error($conexion));
          echo "'El actualizo de evento:".$tipo_historia_edit."' ";
         
        }else{
        echo "'No se encuentra el evento:".$tipo_historia_edit."  ";        
      } 
    }


if (isset($_REQUEST['sobre_nosotros_edit'])) {
  $id_edit= $_REQUEST[ 'id_edit'];
  $sobre_nosotros_edit= $_REQUEST[ 'sobre_nosotros_edit'];
  $resumen_sobre_nosotros_reg= $_REQUEST[ 'resumen_sobre_nosotros_reg'];
  $tlf_sobre_nosotros_reg= $_REQUEST[ 'tlf_sobre_nosotros_reg'];
  $ws_sobre_nosotros_reg= $_REQUEST[ 'ws_sobre_nosotros_reg'];
  $correo_sobre_nosotros_reg= $_REQUEST[ 'correo_sobre_nosotros_reg'];
  $fb_sobre_nosotros_reg= $_REQUEST[ 'fb_sobre_nosotros_reg'];
  $inst_sobre_nosotros_reg= $_REQUEST[ 'inst_sobre_nosotros_reg'];
  $yt_sobre_nosotros_reg= $_REQUEST[ 'yt_sobre_nosotros_reg'];
  $soundcloud_sobre_nosotros_reg= $_REQUEST[ 'soundcloud_sobre_nosotros_reg'];
  $fecha_registro=date('Y-m-d');
  
  $consulta_tipo_usuario=mysqli_query($conexion, "SELECT * FROM sobre_nosotros WHERE id='$id_edit'") or die(mysqli_error($conexion));
  
  if(mysqli_num_rows($consulta_tipo_usuario)>0){
    mysqli_query($conexion, "UPDATE sobre_nosotros SET titulo='$sobre_nosotros_edit',resumen='$resumen_sobre_nosotros_reg', telefono='$tlf_sobre_nosotros_reg',ws='$ws_sobre_nosotros_reg',fb='$fb_sobre_nosotros_reg',instagram='$inst_sobre_nosotros_reg',soundcloud='$soundcloud_sobre_nosotros_reg',youtube='$yt_sobre_nosotros_reg',correo='$correo_sobre_nosotros_reg',fecha_registro='$fecha_registro'  WHERE id='$id_edit'")or die("Problemas con la conexión aqui: " . mysqli_error($conexion));
      echo "'El actualizo de evento:".$sobre_nosotros_edit."' ";
     
    }else{
    echo "'No se encuentra el evento:".$sobre_nosotros_edit."  ";        
  } 
}
if (isset($_REQUEST['estado_edit_fondo'])) {
  $id_edit= $_REQUEST[ 'id_edit'];
  $estado_edit_fondo= $_REQUEST[ 'estado_edit_fondo'];
  
  $fecha_registro=date('Y-m-d');
  
  $consulta_tipo_usuario=mysqli_query($conexion, "SELECT * FROM sobre_nosotros WHERE id='$id_edit'") or die(mysqli_error($conexion));
  
  if(mysqli_num_rows($consulta_tipo_usuario)>0){
    mysqli_query($conexion, "UPDATE sobre_nosotros SET estado='$estado_edit_fondo',fecha_registro='$fecha_registro'  WHERE id='$id_edit'")or die("Problemas con la conexión aqui: " . mysqli_error($conexion));
      echo "'El actualizo:".$estado_edit_fondo."' ";
     
    }else{
    echo "'No se encuentra:".$estado_edit_fondo."  ";        
  } 
}
if (isset($_REQUEST['tipo_cambio_edit'])) {
  $id_edit= $_REQUEST[ 'id_edit'];
  $tipo_cambio_edit= $_REQUEST[ 'tipo_cambio_edit'];
  
  $fecha_registro=date('Y-m-d');
  
  $consulta_tipo_usuario=mysqli_query($conexion, "SELECT * FROM tipo_cambio WHERE id='$id_edit'") or die(mysqli_error($conexion));
  
  if(mysqli_num_rows($consulta_tipo_usuario)>0){
    mysqli_query($conexion, "UPDATE tipo_cambio SET tipo='$tipo_cambio_edit',fecha_registro='$fecha_registro'  WHERE id='$id_edit'")or die("Problemas con la conexión aqui: " . mysqli_error($conexion));
      echo "'El actualizo:".$tipo_cambio_edit."' ";
     
    }else{
    echo "'No se encuentra:".$tipo_cambio_edit."  ";        
  } 
}
}
//FIN EDITAR

?>
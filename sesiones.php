<?php
session_start(); 
require ('conexion.php');
if (isset($_REQUEST['modal_publicidad'])) {
  $arreglo=array(); 

  $registros=mysqli_query($conexion, "SELECT * FROM banner_publicidad WHERE estado='Activo' AND tipo='Modal'");
  $nrow= mysqli_num_rows($registros);
if ($nrow > 0) {
  echo 1;
}else{
  echo 0;
}
   
      


}


if (isset($_REQUEST['get_mixes'])) {
  $arreglo=array(); 

  if ($_REQUEST['get_mixes']==0) {
  $registros=mysqli_query($conexion, "SELECT * FROM mixes WHERE tipo='Free' ORDER BY id DESC");
  $nConfig= mysqli_num_rows($registros);

  for ($i=0; $i<$nConfig; $i++)  
  {  
    $_salida= mysqli_fetch_array($registros); 
    $artist_data = array('archivo' =>$_salida['demo'],'nombre' => $_salida['nombre_cancion'],'foto' => $_salida['foto'],'artista' => $_salida['artista'],'id' => $_salida['id']);
    array_push($arreglo,$artist_data );   
  } 

  echo json_encode($arreglo);

  }else{
    $id_=$_REQUEST['get_mixes'];
    $tabla=$_REQUEST['get_tabla_play'];
  $registros=mysqli_query($conexion, "SELECT * FROM $tabla WHERE id='$id_' ORDER BY id DESC");
  $nConfig= mysqli_num_rows($registros);
  $_salida= mysqli_fetch_array($registros);
  $artist_data = array('archivo' =>$_salida['demo'],'nombre' => $_salida['nombre_cancion'],'foto' => $_salida['foto'],'artista' => $_salida['artista'],'id' => $_salida['id']);
    array_push($arreglo,$artist_data ); 
    echo json_encode($arreglo);
  }
   
      


}



if (isset($_REQUEST['registrar_pago'])) {

  $misDatosJSON =(array)json_decode($_REQUEST['registrar_pago']);
  $listaItems = (array)$misDatosJSON["comprador"];

  $id_producto=$misDatosJSON['id_producto'];
  $status=$misDatosJSON['status'];
  $status_detail=$misDatosJSON['status_detail'];
  $id_mp=$misDatosJSON['id_mp'];
  $payment_type_id=$misDatosJSON['payment_type_id'];
  $monto=$misDatosJSON['monto'];
  $nombre_apellido=$listaItems["nombre_apellido"];
  $documento=$listaItems["documento"];
  $direccion=$listaItems["direccion"];
  $email=$listaItems["email"];
  $tabla=$_SESSION["tipo_producto_mp"];
  $estado_boleta="Pagado";
  $fecha_registro=date('Y-m-d');
    
  $consulta_=mysqli_query($conexion, "SELECT * FROM pasarela WHERE  id_mp='$id_mp'") or die(mysqli_error($conexion));
  $consulta_b=mysqli_query($conexion, "SELECT * FROM $tabla WHERE  id ='$id_producto'") or die(mysqli_error($conexion));
  $MostrarFila=mysqli_fetch_array($consulta_b);
  $id_usuario=$MostrarFila['id_usuario'];

  if(mysqli_num_rows($consulta_)>0){
   // mysqli_query($conexion, "UPDATE usuarios SET nombre='$nombre_user', id_tipo_documento='$id_tipo_documento2', documento='$documento', id_tipo_usuario='$id_tipo_usuario2', contrasena='$contrasena'  WHERE documento='$documento'")or die("Problemas con la conexión: " . mysqli_error($conexion));
      echo "<script type=''text/javascript''>
      alert('El id_mp:".$id_mp." ya existe')
      </script>";
     
  }else{
    mysqli_query($conexion, "INSERT INTO boletas (id_usuario,tipo_producto,nombre_apellido,numero_documento,correo,direccion,id_producto, estado, monto,fecha_registro) VALUES ('$id_usuario','$tabla','$nombre_apellido','$documento','$email','$direccion','$id_producto','$estado_boleta','$monto','$fecha_registro')")or die("Problemas con la conexión aqui: " . mysqli_error($conexion));

    $consulta_c=mysqli_query($conexion, "SELECT * FROM boletas WHERE  numero_documento ='$documento' AND id_producto ='$id_producto' AND fecha_registro ='$fecha_registro'") or die(mysqli_error($conexion));
    $MostrarFilac=mysqli_fetch_array($consulta_c);
    $id_boleta=$MostrarFilac['id'];

  mysqli_query($conexion, "INSERT INTO pasarela (id_usuario,tipo_producto,status_mp,status_detail,id_mp,n_boleta, id_comprador,tipo_pago,monto,fecha_registro) VALUES ('$id_usuario','$tabla','$status','$status_detail','$id_mp','$id_boleta','$documento','$payment_type_id','$monto','$fecha_registro')")or die("Problemas con la conexión aqui: " . mysqli_error($conexion));

          echo "Se registro el:".$id_mp." correctamente";
     
  
      }
}

if (isset($_REQUEST['registrar_pago_efectivo'])) {

  $misDatosJSON =(array)json_decode($_REQUEST['registrar_pago_efectivo']);
  $listaItems = (array)$misDatosJSON["comprador"];

  $id_producto=$misDatosJSON['id_producto'];
  $status=$misDatosJSON['status'];
  $status_detail=$misDatosJSON['status_detail'];
  $id_mp=$misDatosJSON['id_mp'];
  $payment_type_id=$misDatosJSON['payment_type_id'];
  $monto=$misDatosJSON['monto'];
  $nombre_apellido=$listaItems["nombre_apellido"];
  $documento=$listaItems["documento"];
  $direccion=$listaItems["direccion"];
  $email=$listaItems["email"];
  $tabla=$_SESSION["tipo_producto_mp"];
  $estado_boleta="Pendiente";
  $fecha_registro=date('Y-m-d');
    
  $consulta_=mysqli_query($conexion, "SELECT * FROM pasarela WHERE  id_mp='$id_mp'") or die(mysqli_error($conexion));
  $consulta_b=mysqli_query($conexion, "SELECT * FROM $tabla WHERE  id ='$id_producto'") or die(mysqli_error($conexion));
  $MostrarFila=mysqli_fetch_array($consulta_b);
  $id_usuario=$MostrarFila['id_usuario'];

  if(mysqli_num_rows($consulta_)>0){
   // mysqli_query($conexion, "UPDATE usuarios SET nombre='$nombre_user', id_tipo_documento='$id_tipo_documento2', documento='$documento', id_tipo_usuario='$id_tipo_usuario2', contrasena='$contrasena'  WHERE documento='$documento'")or die("Problemas con la conexión: " . mysqli_error($conexion));
      echo "<script type=''text/javascript''>
      alert('El id_mp:".$id_mp." ya existe')
      </script>";
     
  }else{
    mysqli_query($conexion, "INSERT INTO boletas (id_usuario,tipo_producto,nombre_apellido,numero_documento,correo,direccion,id_producto, estado,monto, fecha_registro) VALUES ('$id_usuario','$tabla','$nombre_apellido','$documento','$email','$direccion','$id_producto','$estado_boleta','$monto','$fecha_registro')")or die("Problemas con la conexión aqui: " . mysqli_error($conexion));

    $consulta_c=mysqli_query($conexion, "SELECT * FROM boletas WHERE  numero_documento ='$documento' AND id_producto ='$id_producto' AND fecha_registro ='$fecha_registro'") or die(mysqli_error($conexion));
    $MostrarFilac=mysqli_fetch_array($consulta_c);
    $id_boleta=$MostrarFilac['id'];

  mysqli_query($conexion, "INSERT INTO pasarela (id_usuario,tipo_producto,status_mp,status_detail,id_mp,n_boleta, id_comprador,tipo_pago,monto,fecha_registro) VALUES ('$id_usuario','$tabla','$status','$status_detail','$id_mp','$id_boleta','$documento','$payment_type_id','$monto','$fecha_registro')")or die("Problemas con la conexión aqui: " . mysqli_error($conexion));

  echo "Se registro el:".$id_mp." correctamente";
     
  
      }
}

if (isset($_REQUEST['tipo_producto_mp'])) {
    
  $_SESSION["tipo_producto_mp"]= $_REQUEST[ 'tipo_producto_mp'];
  $_SESSION["id_producto"]= $_REQUEST[ 'id_producto'];
  echo $_SESSION["tipo_producto_mp"];
}

if (isset($_REQUEST['tipo_cambio_dia'])) {
  $fecha_registro=date('Y-m-d');
  $consulta_=mysqli_query($conexion, "SELECT * FROM tipo_cambio LIMIT 1") or die(mysqli_error($conexion));
  $reg=mysqli_fetch_array($consulta_);
  $_SESSION["tipo_cambio_dia"]= $reg['tipo'];

  echo $_SESSION["tipo_cambio_dia"];
}

if (isset($_REQUEST['id_perfil'])) {
    
  $id_perfil= $_REQUEST[ 'id_perfil'];
  
  $consulta_usuario=mysqli_query($conexion, "SELECT * FROM about_me WHERE id_usuario='$id_perfil'") or die(mysqli_error($conexion));
  
  if(mysqli_num_rows($consulta_usuario)>0){
   // mysqli_query($conexion, "UPDATE usuarios SET nombre='$nombre_user', id_tipo_documento='$id_tipo_documento2', documento='$documento', id_tipo_usuario='$id_tipo_usuario2', contrasena='$contrasena'  WHERE documento='$documento'")or die("Problemas con la conexión: " . mysqli_error($conexion));
      while ($reg=mysqli_fetch_array($consulta_usuario)) {
         $_SESSION["id_usuario_perfil"]=$reg['id_usuario'];
      }
      echo $_SESSION["id_usuario_perfil"];
    
  }else{
  
  //mysqli_query($conexion, "INSERT INTO usuarios (id_tipo_usuario,nombre_apellido,usuario,clave,correo,img, fecha_registro) VALUES ('$tipo_usuario','$nombre_apellido','$nombre_user','$contrasena','$correo','$img','$fecha_registro')")or die("Problemas con la conexión aqui: " . mysqli_error($conexion));
          echo 1;
      
      }
  }


//-----------SECCION USUARIOS

if (isset($_REQUEST['usuario_login'])) {
    
$nombre_user= $_REQUEST[ 'usuario_login'];
$clave= $_REQUEST[ 'password'];

$consulta_usuario=mysqli_query($conexion, "SELECT * FROM usuarios WHERE correo='$nombre_user' AND clave='$clave'") or die(mysqli_error($conexion));

if(mysqli_num_rows($consulta_usuario)>0){
 // mysqli_query($conexion, "UPDATE usuarios SET nombre='$nombre_user', id_tipo_documento='$id_tipo_documento2', documento='$documento', id_tipo_usuario='$id_tipo_usuario2', contrasena='$contrasena'  WHERE documento='$documento'")or die("Problemas con la conexión: " . mysqli_error($conexion));
    echo "1";
    while ($reg=mysqli_fetch_array($consulta_usuario)) {
      $_SESSION["usuario"]=$reg['usuario'];
      $_SESSION["nombre_apellido"]=$reg['nombre_apellido'];
      $_SESSION["img"]=$reg['foto'];
      $_SESSION["tipo_user"]=$reg['id_tipo_usuario'];
      $_SESSION["id_usuario"]=$reg['id_usuario'];
    }
  
}else{

//mysqli_query($conexion, "INSERT INTO usuarios (id_tipo_usuario,nombre_apellido,usuario,clave,correo,img, fecha_registro) VALUES ('$tipo_usuario','$nombre_apellido','$nombre_user','$contrasena','$correo','$img','$fecha_registro')")or die("Problemas con la conexión aqui: " . mysqli_error($conexion));
        echo "<script type=''text/javascript''>
    alert('error en combinacion de usuario o clave')
    </script>";
    
    }
}


   if (isset($_REQUEST['add_tipo_usuario'])) {
    
    $descripcion= $_REQUEST[ 'add_tipo_usuario'];
    $fecha_registro=date('Y-m-d');
    
    $consulta_tipo_usuario=mysqli_query($conexion, "SELECT * FROM tipos_usuario WHERE  nombre='$descripcion'") or die(mysqli_error($conexion));
    
    if(mysqli_num_rows($consulta_tipo_usuario)>0){
     // mysqli_query($conexion, "UPDATE usuarios SET nombre='$nombre_user', id_tipo_documento='$id_tipo_documento2', documento='$documento', id_tipo_usuario='$id_tipo_usuario2', contrasena='$contrasena'  WHERE documento='$documento'")or die("Problemas con la conexión: " . mysqli_error($conexion));
        echo "<script type=''text/javascript''>
        alert('El tipo de usuario:".$descripcion." ya existe')
        </script>";
       
    }else{
    
    mysqli_query($conexion, "INSERT INTO tipos_usuario (nombre, fecha_registro) VALUES ('$descripcion','$fecha_registro')")or die("Problemas con la conexión aqui: " . mysqli_error($conexion));
            echo "<script type=''text/javascript''>
        alert('Se registro el tipo usuario:".$descripcion." correctamente')
        </script>";
       
    
        }
       }
// FIN SECCION USUARIOS




?>
<?php
//Reanudamos la sesión 

//Validamos si existe realmente una sesión activa o no 
if($_SESSION["tipo_user"] ==="2")
{ 	
	//echo"<script language='javascript'>window.location='php/inventario.php'</script>";	
//header("Location: php/inventario.php");

	}
if($_SESSION["tipo_user"] ==="1")
{ 	
	//echo"<script language='javascript'>window.location='index.php'</script>";	
	//header("Location: index.php");

	}

if ($_SESSION["tipo_user"]==="3") 
{ 
    //nos envía al inicio
    
}
if ($_SESSION["tipo_user"]==="4") 
{ 
    //nos envía al inicio
    
}

if (!isset($_SESSION["tipo_user"])) 
{ 
  echo"<script language='javascript'>window.location='../../../index.php'</script>";
    exit;
    
}
?>
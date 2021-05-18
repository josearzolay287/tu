<?php
session_start(); 
require ('conexion.php');
//-----------SECCION USUARIOS
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
					<td> <a onclick="editar('<?php echo $reg_usuarios['id_tipo_usuario']; ?>','tipos_usuario','registrar_tipo_usuarios');" >    ✏️     </a><a onclick="pregunta_eliminar('<?php echo $reg_usuarios['id_tipo_usuario']; ?>', 'tipos_usuario')" >    🗑️    </a></td>
				</tr>
<?php
  }
<?php
    include('conexion.php');
	
	$RegistrosAMostrar=4;

 //estos valores los recibo por GET
 if(isset($_GET['pag'])){
  $RegistrosAEmpezar=($_GET['pag']-1)*$RegistrosAMostrar;
  $PagAct=$_GET['pag'];
  //caso contrario los iniciamos
 }else{
  $RegistrosAEmpezar=0;
  $PagAct=1;
 }
if (isset($_REQUEST['valor_de_busqueda_producto_filtro'])) { 
$buscar = $_REQUEST['valor_de_busqueda_producto_filtro'];
$Resultado=mysqli_query($conexion,"SELECT * FROM stock WHERE nombre_producto='$buscar' OR cantidad='$buscar' OR calidad='$buscar' OR sexo='$buscar' OR talla='$buscar' OR color='$buscar' LIMIT $RegistrosAEmpezar, $RegistrosAMostrar");
$NroRegistros=mysqli_num_rows(mysqli_query($conexion,"SELECT * FROM stock WHERE nombre_producto='$buscar' OR cantidad='$buscar' OR calidad='$buscar' OR sexo='$buscar' OR talla='$buscar' OR color='$buscar'"));
if ($NroRegistros==0) echo "<div style='margin-top: 5px;'><a class='boton_todo' onclick='tabla_inventario()';>No hay resultados  <img src='img/volver.png' alt='Volver' width='20px' />    </a> ";
if ($NroRegistros>0)echo "<table class='blueTable'>";
 while($MostrarFila=mysqli_fetch_array($Resultado)){
  ?>
				<tr>
					<td><?php echo $MostrarFila['id_producto']; ?></td>
					<td style="width: 110px;"><?php echo $MostrarFila['nombre_producto']; ?></td>
					<td style="width: 55px;"><?php echo $MostrarFila['talla']; ?></td>
					<td style="width: 90px;"><?php echo $MostrarFila['color']; ?></td>
					<td style="width: 90px;"><?php echo $MostrarFila['calidad']; ?></td>
					<td style="width: 80px;"><?php echo $MostrarFila['sexo']; ?></td>
					<td style="width: 80px;"><?php echo $MostrarFila['cantidad']; ?></td>
					<td><?php echo $MostrarFila['ultima_entrada']; ?></td>
					<td> <a onclick="abrir_modal('<?php echo $MostrarFila['id_producto']; ?>');editar_inventario('<?php echo $MostrarFila['id_producto']; ?>');" >    ✏️     </a><a onclick="pregunta_eliminar_producto_inventario('<?php echo $MostrarFila['id_producto']; ?>')" >    🗑️    </a></td>
				</tr>
			<?php
 }
 echo "</table>";

 //******--------determinar las páginas---------******//
  $PagAnt=$PagAct-1;
 $PagSig=$PagAct+1;
 $PagUlt=$NroRegistros/$RegistrosAMostrar;

 //verificamos residuo para ver si llevará decimales
 $Res=$NroRegistros%$RegistrosAMostrar;
 // si hay residuo usamos funcion floor para que me
 // devuelva la parte entera, SIN REDONDEAR, y le sumamos
 // una unidad para obtener la ultima pagina
 if($Res>0) $PagUlt=floor($PagUlt)+1;
 
 //desplazamiento
 echo "<div style='margin-left:250px;margin-top: 5px;'><a class='boton_todo' onclick=\"Pagina('1','$buscar')\"><img src='img/tizquierda.svg' alt='Primera Pagina' width='20px' />    </a> ";
 if($PagAct>1) echo "<a class='boton_todo' onclick=\"Pagina('$PagAnt','$buscar')\"> <img src='img/izquierda.svg' alt='Pagina Anterior' width='20px'/>    </a> ";
 echo "<span style='font-size: 17px;font-weight: bold;'>  ".$PagAct."/".$PagUlt."</span>";
 if($PagAct<$PagUlt)  echo "<a class='boton_todo' onclick=\"Pagina('$PagSig','$buscar')\"><img src='img/derecha-.svg' alt='Pagina Siguiente' width='20px' />    </a> ";
 echo "<a class='boton_todo' onclick=\"Pagina('$PagUlt','$buscar')\"><img src='img/tderecha.svg' alt='Ultima Pagina' width='20px'/>    </a></div>";



}else{
	$Resultado=mysqli_query($conexion,"SELECT * FROM usuarios ORDER BY id_usuario ASC LIMIT $RegistrosAEmpezar, $RegistrosAMostrar");
	$NroRegistros=mysqli_num_rows(mysqli_query($conexion,"SELECT * FROM usuarios "));
	$N="";
?>
<table class="table table-bordered table-striped table-hover">
						<thead>
							<tr>
                            <th class="text-xs-center">
									Id Usuario
								</th>
								<th class="text-xs-center">
									Nombre de Usuario
								</th>
								<th class="text-xs-center">
									Tipo de Usuario
								</th>
								<th class="text-xs-center">
									Correo
								</th>
								<th class="text-xs-center">
									Grupo
								</th>
								<th class="text-xs-center">
									Foto
								</th>
								<th class="text-xs-center">
									Opciones
								</th>
							</tr>
						</thead>
						<tbody >	

<?php
 while($MostrarFila=mysqli_fetch_array($Resultado)){
	$id_tipo_usuario=$MostrarFila['id_tipo_usuario'];
	$Resultado2=mysqli_query($conexion,"SELECT * FROM tipos_usuario WHERE id_tipo_usuario ='$id_tipo_usuario' ");
	$MostrarFila2=mysqli_fetch_array($Resultado2);
	$tipo_usuario=$MostrarFila2['nombre'];
	$N++;
  ?>
				<tr>
					<th class="text-nowrap" scope="row"><?php echo $MostrarFila['id_usuario']; ?></th>
					<td><?php echo $MostrarFila['nombre_apellido']; ?></td>
					<td align="center"><?php echo $tipo_usuario ?></td>
					<td><?php echo $MostrarFila['correo']; ?></td>
					<td><?php echo $MostrarFila['grupo']; ?></td>
					<?php
			if ($MostrarFila['foto']=="") {
				?>
				<td><input type="file" class="file_input" name="archivo" id="archivo<?php echo $N; ?>" onblur="subirArchivos2('usuarios','<?php echo $MostrarFila['id_usuario']; ?>','<?php echo $N; ?>');" accept="image/png, .jpeg, .jpg, image/gif">
					 			<input type="text" name="ext_archivo" id="nombre_archivo"  style="display: none;" /></td>
				<?php
			}else{
				?>
				<td><img class="img-thumbnail" src="archivos_subidos/<?php echo $MostrarFila['foto']; ?>"  style="width: 10vh;"/>
				<input type="file" class="file_input"  name="archivo" id="archivo<?php echo $N; ?>" onchange="subirArchivos2('usuarios','<?php echo $MostrarFila['id_usuario']; ?>','<?php echo $N; ?>');" accept="image/png, .jpeg, .jpg, image/gif">
				</td>
			<?php
			}
			?>
					
					<td> <a onclick="editar('<?php echo $MostrarFila['id_usuario']; ?>','usuarios','registro_usuarios');">    ✏️     </a><a onclick="pregunta_eliminar('<?php echo $MostrarFila['id_usuario']; ?>', 'usuarios')" >    🗑️    </a></td>
				</tr>
			<?php
 }
echo "	</tbody>
</table>";
 //******--------determinar las páginas---------******//
  $PagAnt=$PagAct-1;
 $PagSig=$PagAct+1;
 $PagUlt=$NroRegistros/$RegistrosAMostrar;

 //verificamos residuo para ver si llevará decimales
 $Res=$NroRegistros%$RegistrosAMostrar;
 // si hay residuo usamos funcion floor para que me
 // devuelva la parte entera, SIN REDONDEAR, y le sumamos
 // una unidad para obtener la ultima pagina
 if($Res>0) $PagUlt=floor($PagUlt)+1;
 
 //desplazamiento
 echo "<div style='margin-left:250px;margin-top: 5px;'><a class='page-link' onclick=\"Pagina('1','paginador_usuarios')\"><span aria-hidden='true'>«</span><span class='sr-only'></span>  </a> ";
 if($PagAct>1) echo "<a class='page-link' onclick=\"Pagina('$PagAnt','paginador_usuarios')\">".$PagAnt." </a> ";
 echo "<span class='page-link'>  ".$PagAct."/".$PagUlt."</span>";
 if($PagAct<$PagUlt)  echo "<a class='page-link' onclick=\"Pagina('$PagSig','paginador_usuarios')\"> ".$PagSig." </a> ";
 echo "<a class='page-link' onclick=\"Pagina('$PagUlt','paginador_usuarios')\"><span aria-hidden='true'>»</span><span class='sr-only'></span></a></div>";
}
		?>

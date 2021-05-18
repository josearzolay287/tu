<?php
include('conexion.php');
if (isset($_REQUEST['id_editar'])) {
    $tabla=$_REQUEST['tabla_editar'];
    $id_=$_REQUEST['id_editar'];
    $Resultado=mysqli_query($conexion,"SELECT * FROM $tabla WHERE id_usuario ='$id_' ");
//$NroRegistros=mysqli_num_rows(mysqli_query($conexion,"SELECT * FROM carousel_index "));
if ($MostrarFila=mysqli_fetch_array($Resultado)) {
	$id_tipo_usuario=$MostrarFila['id_tipo_usuario'];
	$Resultado2=mysqli_query($conexion,"SELECT * FROM tipos_usuario WHERE id_tipo_usuario ='$id_tipo_usuario' ");
	$MostrarFila2=mysqli_fetch_array($Resultado2);
	$tipo_usuario=$MostrarFila2['nombre'];
?>

<div class="row match-height">
		<div class="col-md-6">
			<div class="card">
				<div class="card-header">
					<h4 class="card-title" id="basic-layout-round-controls">Editar Registrar Usuarios</h4>
					<a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
					
				</div>
				<div class="card-body collapse in">
					<div class="card-block">

						<div class="card-text">
							<p>Editar la informacion para inicio de sesion de usuario.</p>
						</div>

						<form class="form"  id="form_editar_usuario">
							<div class="form-body">
							<div class="form-group">
									<label for="complaintinput1">Id</label>
									<input type="text" id="id_edit" class="form-control round" placeholder="company name" name="id_edit" value="<?php echo $MostrarFila['id_usuario']; ?>">
								</div>
								<div class="form-group">
									<label for="complaintinput1">Nombres y Apellidos</label>
									<input type="text" id="nombre_apellido" class="form-control round" name="nombre_apellido" value="<?php echo $MostrarFila['nombre_apellido']; ?>">
								</div>

								<div class="form-group">
									<label for="complaintinput2">Nombre de usuario</label>
									<input type="text" id="nombre_usuario" class="form-control round" name="nombre_usuario_edit" value="<?php echo $MostrarFila['usuario']; ?>">
								</div>

								<div class="form-group">
									<label for="complaintinput3">Contraseña</label>
									<input type="password" id="clave" class="form-control round" name="clave" value="<?php echo $MostrarFila['clave']; ?>">
								</div>
                                <div class="form-group">
									<label for="complaintinput3">Confirmar Contraseña</label>
									<input type="password" id="clave_confirm" class="form-control round" name="clave_confirm" onchange="comprobarClave()" value="<?php echo $MostrarFila['clave']; ?>">
								</div>


								<div class="form-group">
									<label for="complaintinput4">Correo</label>
									<input type="email" id="email" class="form-control round" name="email" value="<?php echo $MostrarFila['correo']; ?>">
								</div>

								<div class="form-group">
									<label for="projectinput5">Tipo de Usuario</label>
										<select id="projectinput5" name="tipo_usuario" class="form-control">
											<option value="<?php echo $id_tipo_usuario; ?>" selected><?php echo $tipo_usuario; ?></option>
											<option value="1">Administrador</option>
											<option value="2">Editor</option>
											<option value="3">Dj</option>
										</select>
								</div>
								<div class="form-group">
									<label for="projectinput5">Grupo</label>
										<select id="projectinput5" name="grupo" class="form-control" >
											<option value="<?php echo $MostrarFila['grupo']; ?>" selected><?php echo $MostrarFila['grupo']; ?></option>
											<option value="A">A</option>
											<option value="B">B</option>
											<option value="C">C</option>
										</select>
								</div>
							</div>

							<div class="form-actions">
								<button type="button" class="btn btn-warning mr-1" onclick="carga_formulario('lista_usuarios')">
									<i class="icon-cross2"></i> Cancelar
								</button>
								<button type="button" class="btn btn-primary" onclick="guardar_edicion('form_editar_usuario','usuarios')">
									<i class="icon-check2"></i> Guardar
								</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>

	</div>
<?php
}
  }else{
?>
<div class="row match-height">
		<div class="col-md-6">
			<div class="card">
				<div class="card-header">
					<h4 class="card-title" id="basic-layout-round-controls">Registrar Usuarios</h4>
					<a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
					<div class="heading-elements">
						<ul class="list-inline mb-0">
							<li><a data-action="collapse"><i class="icon-minus4"></i></a></li>
							<li><a data-action="reload"><i class="icon-reload"></i></a></li>
							<li><a data-action="expand"><i class="icon-expand2"></i></a></li>
							<li><a data-action="close"><i class="icon-cross2"></i></a></li>
						</ul>
					</div>
				</div>
				<div class="card-body collapse in">
					<div class="card-block">

						<div class="card-text">
							<p>Registrar la informacion para inicio de sesion de usuario.</p>
						</div>

						<form class="form"  id="registrar_">
							<div class="form-body">

								<div class="form-group">
									<label for="complaintinput1">Nombres y Apellidos</label>
									<input type="text" id="nombre_apellido" class="form-control round" name="nombre_apellido">
								</div>

								<div class="form-group">
									<label for="complaintinput2">Nombre de usuario</label>
									<input type="text" id="nombre_usuario" class="form-control round" name="nombre_usuario_reg">
								</div>

								<div class="form-group">
									<label for="complaintinput3">Contraseña</label>
									<input type="password" id="clave" class="form-control round" name="clave">
								</div>
                                <div class="form-group">
									<label for="complaintinput3">Confirmar Contraseña</label>
									<input type="password" id="clave_confirm" class="form-control round" name="clave_confirm" onchange="comprobarClave()">
								</div>


								<div class="form-group">
									<label for="complaintinput4">Correo</label>
									<input type="email" id="email" class="form-control round" name="email">
								</div>

								<div class="form-group">
									<label for="projectinput5">Tipo de Usuario</label>
										<select id="projectinput5" name="tipo_usuario" class="form-control">
											<option value="none" selected="" disabled="">Tipo de Usuario</option>
											<option value="1">Administrador</option>
											<option value="2">Editor</option>
											<option value="3">Dj</option>
										</select>
								</div>
								<div class="form-group">
									<label for="projectinput5">Grupo</label>
										<select id="projectinput5" name="grupo" class="form-control">
											<option value="A">A</option>
											<option value="B">B</option>
											<option value="C">C</option>
											<option value="ZonaTop Lite">ZonaTop Lite</option>
										</select>
								</div>
							</div>

							<div class="form-actions">
								<button type="button" class="btn btn-warning mr-1" onclick="carga_formulario('dashboard')">
									<i class="icon-cross2"></i> Cancelar
								</button>
								<button type="submit" class="btn btn-primary">
									<i class="icon-check2"></i> Guardar
								</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>

	</div>
<?php
  }
?>
<script type="text/javascript">

$('#registrar_').validate({
  rules: {
    nombre_apellido: {
      required: true       
    },
   
     nombre_usuario: {
      required: true       
    }, 
	clave: {
      required: true       
    }, 
	clave_confirm: {
      required: true       
    }, 
	email: {
      required: true       
    },
  },
  messages : {
  nombre_apellido: {
    required: "Este campo es obligatorio"
  },
  nombre_usuario: {
    required: "Este campo es obligatorio"
  },
  clave: {
    required: "Este campo es obligatorio"
  },
  clave_confirm: {
    required: "Este campo es obligatorio"
  },
  email: {
    required: "Este campo es obligatorio"
  },
},
     submitHandler: function(form) {
		
		regis_('registrar_','registro_usuarios')
	 }

});

</script>
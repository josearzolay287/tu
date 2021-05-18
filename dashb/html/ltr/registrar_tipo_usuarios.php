<?php
include('conexion.php');
if (isset($_REQUEST['id_editar'])) {
    $tabla=$_REQUEST['tabla_editar'];
    $id_=$_REQUEST['id_editar'];
    $Resultado=mysqli_query($conexion,"SELECT * FROM $tabla WHERE id_tipo_usuario ='$id_' ");
//$NroRegistros=mysqli_num_rows(mysqli_query($conexion,"SELECT * FROM carousel_index "));
if ($MostrarFila=mysqli_fetch_array($Resultado)) {
?>
<div class="row match-height">
		<div class="col-md-6">
			<div class="card">
				<div class="card-header">
					<h4 class="card-title" id="basic-layout-round-controls">Editar Tipo Usuarios</h4>
					<a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
				</div>
				<div class="card-body collapse in">
					<div class="card-block">

						<div class="card-text">
							<p>Registrar tipo de usuario.</p>
						</div>

						<form class="form"  id="editar_form_tipo_usuario">
							<div class="form-body">
								<div class="form-group">
									<label for="complaintinput1">Id</label>
									<input type="text" id="id_edit" class="form-control round" placeholder="company name" name="id_edit" value="<?php echo $MostrarFila['id_tipo_usuario']; ?>">
								</div>

								<div class="form-group">
									<label for="complaintinput1">Descripcion</label>
									<input type="text" id="nombre_apellido" class="form-control round" placeholder="company name" name="edit_descripcion_tipo_usuario" value="<?php echo $MostrarFila['nombre']; ?>">
								</div>

							<div class="form-actions">
								<button type="button" class="btn btn-warning mr-1" onclick="carga_formulario('tipos_usuarios')">
									<i class="icon-cross2"></i> Cancelar
								</button>
								<button type="button" class="btn btn-primary" onclick="guardar_edicion('editar_form_tipo_usuario','tipos_usuarios')">
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
				<h4 class="card-title" id="basic-layout-round-controls">Registrar Tipo Usuarios</h4>
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
						<p>Registrar tipo de usuario.</p>
					</div>

					<form class="form"  id="form_addtipo_usuario">
						<div class="form-body">

							<div class="form-group">
								<label for="complaintinput1">Descripcion</label>
								<input type="text" id="nombre_apellido" class="form-control round" placeholder="company name" name="add_tipo_usuario">
							</div>

						<div class="form-actions">
							<button type="button" class="btn btn-warning mr-1" onclick="carga_formulario('dashboard')">
								<i class="icon-cross2"></i> Cancelar
							</button>
							<button type="button" class="btn btn-primary" onclick="registrar_tipo_usuario()">
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
<?php
          include ('conexion.php');
          ?>
<div class="col-md-12" id="content_edit">
		<div class="card">
			<div class="card-header">
				<h4 class="card-title">Usuarios</h4>
				<a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
				<button type="button" class="btn btn-primary" onclick="carga_formulario('registrar_usuarios')">
									<i class="icon-check2"></i> Añadir Usuario
								</button>
			</div>
			<div class="card-body collapse in collapse in">
				<div class="card-block" id="get_usuarios">					
					
							<?php  include ('paginador_usuarios.php');  ?>
					
				</div>
			</div>
		</div>
	</div>
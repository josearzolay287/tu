<?php
          include ('conexion.php');
          ?>
<div class="col-md-12">
		<div class="card"  id="content_edit">
			<div class="card-header">
				<h4 class="card-title">Tipos de Usuarios</h4>
				<a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
				<button type="button" class="btn btn-primary" onclick="carga_formulario('registrar_tipo_usuarios')">
									<i class="icon-check2"></i> Añadir Tipo
								</button>
			</div>
			<div class="card-body collapse in collapse in" >
				<div class="card-block"  id="content_edit">
					<p>While Bootstrap uses <code>em</code>s or <code>rem</code>s for defining most sizes, <code>px</code>s are used for grid breakpoints and container widths. This is because the viewport width is in pixels and does not change with the font size.</p>
					<p>See how aspects of the Bootstrap grid system work across multiple devices with a handy table.</p>
					<table class="table table-bordered table-striped">
						<thead>
							<tr>
                            <th class="text-xs-center">
									Id Usuario
								</th>
								<th class="text-xs-center">
									Descripcion
								</th>
								
								<th class="text-xs-center">
									Opciones
								</th>
							</tr>
						</thead>
						<tbody id="get_listusuarios">
						<?php
          include ('tipos_usuarios_tabla.php');
          ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
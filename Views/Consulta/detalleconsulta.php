<?php headerAdmin(); ?>
<main class="app-content">
	<div class="app-title  <?php
							if ($data->estado == 'En espera') echo 'tituloDetalleConsultaAmarillo';
							if ($data->estado == 'Terminado') echo 'tituloDetalleConsultaVerde';
							if ($data->estado == 'En proceso') echo 'tituloDetalleConsultaAzul';
							if ($data->estado == 'Cancelado') echo 'tituloDetalleConsultaRojo'
							?>">
		<div>
			<h1><?= $data->nombre_paciente . " " . $data->apellido_paciente ?> </h1>
			<p><?= substr($data->hora, 0, -3) . " " . date("d-m-Y", strtotime($data->fecha)) ?></p>
		</div>
		<ul class="app-breadcrumb breadcrumb">
			<li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
			<li class="breadcrumb-item"><a href="#">Detalles de la Consulta</a></li>
		</ul>
	</div>
	<div>
		<div class="card p-3">
			<div class="card my-2 p-3">
				<h5>Estado: <span class="
						<?php
						if ($data->estado == 'En espera') echo 'text-warning';
						if ($data->estado == 'Terminado') echo 'text-success';
						if ($data->estado == 'En proceso') echo 'text-primary';
						if ($data->estado == 'Cancelado') echo 'text-danger'
						?>"><?= $data->estado ?></span> </h5>
				<div class="col-md-2">
					<select class="form-control form-select" aria-label="Default select example" onchange="cambiarEstadoConsulta(this.value, <?= $data->id_consulta ?>)" id="selectEstadoConsulta" name="selectEstadoConsulta">
						<option selected>Cambiar estado</option>
						<option value="En espera">En espera</option>
						<option value="Terminado">Terminado</option>
						<option value="En proceso">En proceso</option>
						<option value="Cancelado">Cancelado</option>
					</select>
				</div>
			</div>

			<div class="card my-2 p-3">
				<h5>Recetas <button class="mx-2 btn btn-primary" onclick="nuevaDescripcionConsulta('receta')"><i class="fa fa-plus-circle"></i></button></h5>
				<?php if ($data->recetas) : ?>
					<div class="alert alert-primary" role="alert">
						<?php foreach ($data->recetas as $receta) : ?>
							<p>
								<?= $receta["descripcion"] ?>
								<button class="btn ml-1 p-0 text-primary" onclick='editarDescripcionConsulta(<?php print_r(json_encode($receta)); ?>,"receta")'> <i class="fa fa-pencil" aria-hidden="true"></i></button>
								<button class="btn ml-1 p-0 text-danger" onclick="eliminarDescripcionConsulta(<?= $receta['id'] ?>, 'receta')"> <i class="fa fa-trash" aria-hidden="true"></i></button>
							</p>
						<?php endforeach; ?>
					</div>
				<?php endif ?>
			</div>


			<div class="card my-2 p-3">
				<h5>Analisis <button class="mx-2 btn btn-primary" onclick="nuevaDescripcionConsulta('analisis')"><i class="fa fa-plus-circle"></i></button></h5>
				<?php if ($data->analisis) : ?>
					<div class="alert alert-primary" role="alert">
						<?php foreach ($data->analisis as $analisis) : ?>
							<p>
								<?= $analisis["descripcion"] ?>
								<button class="btn ml-1 p-0 text-primary" onclick='editarDescripcionConsulta(<?php print_r(json_encode($analisis)); ?>,"analisis")'> <i class="fa fa-pencil" aria-hidden="true"></i></button>
								<button class="btn ml-1 p-0 text-danger" onclick="eliminarDescripcionConsulta(<?= $analisis['id'] ?>, 'analisis')"> <i class="fa fa-trash" aria-hidden="true"></i></button>
							</p>
						<?php endforeach; ?>
					</div>
				<?php endif ?>
			</div>

			<div class="card my-2 p-3">
				<h5>Tratamientos <button class="mx-2 btn btn-primary" onclick="nuevaDescripcionConsulta('tratamiento')"><i class="fa fa-plus-circle"></i></button></h5>
				<?php if ($data->tratamientos) : ?>
					<div class="alert alert-primary" role="alert">
						<?php foreach ($data->tratamientos as $tratamiento) : ?>
							<p>
								<?= $tratamiento["descripcion"] ?>
								<button class="btn ml-1 p-0 text-primary" onclick='editarDescripcionConsulta(<?php print_r(json_encode($tratamiento)); ?>,"tratamiento")'> <i class="fa fa-pencil" aria-hidden="true"></i></button>
								<button class="btn ml-1 p-0 text-danger" onclick="eliminarDescripcionConsulta(<?= $tratamiento['id'] ?>, 'tratamiento')"> <i class="fa fa-trash" aria-hidden="true"></i></button>
							</p>
						<?php endforeach; ?>
					</div>
				<?php endif ?>
			</div>

			<div class="card my-2 p-3">
				<h5>Diagnósticos <button class="mx-2 btn btn-primary" onclick="nuevaDescripcionConsulta('diagnostico')"><i class="fa fa-plus-circle"></i></button></h5>
				<?php if ($data->diagnosticos) : ?>
					<div class="alert alert-primary" role="alert">
						<?php foreach ($data->diagnosticos as $diagnostico) : ?>
							<p>
								<?= $diagnostico["descripcion"] ?>
								<button class="btn ml-1 p-0 text-primary" onclick='editarDescripcionConsulta(<?php print_r(json_encode($diagnostico)); ?>,"diagnostico")'> <i class="fa fa-pencil" aria-hidden="true"></i></button>
								<button class="btn ml-1 p-0 text-danger" onclick="eliminarDescripcionConsulta(<?= $diagnostico['id'] ?>, 'diagnostico')"> <i class="fa fa-trash" aria-hidden="true"></i></button>
							</p>
						<?php endforeach; ?>
					</div>
				<?php endif ?>
			</div>
		</div>
		<style>
			.tituloDetalleConsultaVerde {
				color: #004e47;
				background-color: #cceae7;
				border-color: #b8e2de;
			}

			.tituloDetalleConsultaRojo {
				color: #721c24;
				background-color: #f8d7da;
				border-color: #f5c6cb;
			}

			.tituloDetalleConsultaAzul {
				color: #084298;
				background-color: #cfe2ff;
				border-color: #b6d4fe;
			}

			.tituloDetalleConsultaAmarillo {
				color: #856404;
				background-color: #fff3cd;
				border-color: #ffeeba;
			}
		</style>
</main>
<?php
getModal("modalConsultaOpciones", $data);
getModal('modalConsultaOpcionesEliminar', null);
footerAdmin();
?>
<?php headerAdmin(); ?>
<main class="app-content">
	<div class="app-title">
		<div>
			<h1><?= $data->nombre_paciente . " " . $data->apellido_paciente ?></h1>
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
				<h5>Recetas <button class="mx-2 btn btn-primary"  onclick="nuevaDescripcionConsulta('receta')"><i class="fa fa-plus-circle"></i></button></h5>
				<?php if ($data->recetas) : ?>
					<div class="alert alert-primary" role="alert">
						<?php foreach ($data->recetas as $receta) : ?>
							<p><?= $receta["descripcion"]?> <button><i class="fa fa-pencil" aria-hidden="true"></i></button> </p>
						<?php endforeach; ?>
					</div>
				<?php endif ?>
			</div>


			<div class="card my-2 p-3">
				<h5>Analisis <button class="mx-2 btn btn-primary"  onclick="nuevaDescripcionConsulta('analisis')"><i class="fa fa-plus-circle"></i></button></h5>
				<?php if ($data->analisis) : ?>
					<div class="alert alert-primary" role="alert">
						<?php foreach ($data->analisis as $analisis) : ?>
							<p><?= $analisis["descripcion"]?> <button><i class="fa fa-pencil" aria-hidden="true"></i></button> </p>
						<?php endforeach; ?>
					</div>
				<?php endif ?>
			</div>

			<div class="card my-2 p-3">
				<h5>Tratamientos <button class="mx-2 btn btn-primary"  onclick="nuevaDescripcionConsulta('tratamiento')"><i class="fa fa-plus-circle"></i></button></h5>
				<?php if ( $data->tratamientos) : ?>
					<div class="alert alert-primary" role="alert">
						<?php foreach ($data->tratamientos as $tratamiento) : ?>
							<p>
								<?= $tratamiento["descripcion"]?>
								<button class="btn ml-1 p-0 text-primary" onclick='editarDescripcionConsulta(<?php print_r(json_encode($tratamiento));?>,"tratamiento")'> <i class="fa fa-pencil" aria-hidden="true"></i></button>
								<button class="btn ml-1 p-0 text-danger" onclick="eliminarDescripcionConsulta(<?= $tratamiento['id'] ?>, 'tratamiento')"> <i class="fa fa-trash" aria-hidden="true"></i></button>
							</p>
						<?php endforeach; ?>
					</div>
				<?php endif ?>
			</div>

			<div class="card my-2 p-3">
				<h5>Diagnósticos <button class="mx-2 btn btn-primary"  onclick="nuevaDescripcionConsulta('diagnostico')"><i class="fa fa-plus-circle"></i></button></h5>
				<?php if ($data->diagnosticos) : ?>
					<div class="alert alert-primary" role="alert">
						<?php foreach ($data->diagnosticos as $diagnostico) : ?>
							<p><?= $diagnostico["descripcion"]?> <button><i class="fa fa-pencil" aria-hidden="true"></i></button> </p>
						<?php endforeach; ?>
					</div>
				<?php endif ?>
			</div>
		</div>

</main>
<?php 
	getModal("modalConsultaOpciones", $data);
	getModal('modalConsultaOpcionesEliminar', null);
	footerAdmin(); 
	?>
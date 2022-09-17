<?php headerAdmin(); ?>
<main class="app-content">
	<div class="app-title">
		<div>
			<h1>
				<i class="fa fa-hospital-o" aria-hidden="true"></i> Asistente <button class="btn btn-primary" type="button" onclick="setModal('modalFormAsistenteNuevo','show')"><i class="fa fa-plus-circle"></i> Nuevo</button>
			</h1>
			
			<!-- <p>Start a beautiful journey here</p> -->
		</div>
		<ul class="app-breadcrumb breadcrumb">
			<li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
			<li class="breadcrumb-item"><a href="#">Clínicas</a></li>
		</ul>
	</div>
	<div>
	<div class="card">
		<div class="row min-vh-100 d-flex align-items-center justify-content-center" id="list Asistente">
			<?php foreach ($data as $asistente): ?>
				<div class="card text-center mx-2 col-md-3 my-2" >
					<div class="card-body">
						<h5 class="card-title"><?= $asistente["nombre"]." ". $asistente["apellido"] ; ?></h5>
						<p> <?= $asistente["estado"]; ?> </p>
						<button class="btn btn-primary" type="button" onclick='openModalAsistenteEditar(<?= $asistente["id"]?>)'><i class="fa fa-plus-circle"></i> Editar</button>
						<button class="btn btn-danger" type="button" onclick='openModalAsistenteEliminar(<?= $asistente["id"]?>)'><i class="fa fa-plus-circle"></i> Eliminar</button>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
	<?php getModal("modalAsistenteNuevo", $data) ?>
	<?php getModal("modalAsistenteEditar", $data) ?>
	<?php getModal("modalAsistenteEliminar", $data) ?>
</main>
<?php footerAdmin(); ?>
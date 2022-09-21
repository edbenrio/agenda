<?php headerAdmin(); ?>
<main class="app-content">
	<div class="app-title">
		<div>
			<h1>
				<i class="fa fa-hospital-o" aria-hidden="true"></i> Pacientes <button class="btn btn-primary" type="button" onclick="setModal('modalFormPacienteNuevo','show')"><i class="fa fa-plus-circle"></i> Nuevo</button>
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
		<div class="row min-vh-100 d-flex align-items-center justify-content-center" id="listaPacientes">
			<?php foreach ($data as $paciente): ?>
				<div class="card text-center mx-2 col-md-3 my-2" >
					<div class="card-body">
						<h5 class="card-title"><?= $paciente["nombre"]." ". $paciente["apellido"] ; ?></h5>
						<p><?= $paciente["email"]; ?></p>
						<p> <?= $paciente["direccion"].' - '. $paciente["ciudad"]; ?> </p>
						<p> <?= $paciente["telefono"]; ?> </p>
						<button class="btn btn-primary" type="button" onclick='openModalPacienteEditar(<?= $paciente["id"]?>)'> Editar</button>
						<button class="btn btn-danger" type="button" onclick='openModalPacienteEliminar(<?= $paciente["id"]?>)'> Eliminar</button>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
	<?php getModal('modalPacienteNuevo', $data) ?>
    <?php getModal('modalPacienteEditar', $data) ?>
    <?php getModal('modalPacienteEliminar', $data) ?>
</main>
<?php footerAdmin(); ?>
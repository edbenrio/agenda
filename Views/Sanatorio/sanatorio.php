<?php headerAdmin(); ?>
<main class="app-content">
	<div class="app-title">
		<div>
			<h1>
				<i class="fa fa-hospital-o" aria-hidden="true"></i> Sanatorios <button class="btn btn-primary" type="button" onclick="openModalSanatorioNuevo()"><i class="fa fa-plus-circle"></i> Nuevo</button>
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
		<div class="row min-vh-100 d-flex align-items-center justify-content-center" id="listaSanatorios">
			<?php foreach ($data as $sanatorio): ?>
				<div class="card text-center mx-2 col-md-3 my-2" >
					<div class="card-body">
						<h5 class="card-title"><?= $sanatorio["nombre"]; ?></h5>
						<p><?= $sanatorio["mail"]; ?></p>
						<p> <?= $sanatorio["direccion"].' - '. $sanatorio["ciudad"]; ?> </p>
						<p> <?= $sanatorio["telefono"].' '.$sanatorio["celular"]; ?> </p>
						<button class="btn btn-primary" type="button" onclick='openModalSanatorioEditar(<?= $sanatorio["id"]?>)'><i class="fa fa-plus-circle"></i> Editar</button>
						<button class="btn btn-danger" type="button" onclick='openModalSanatorioEliminar(<?= $sanatorio["id"]?>)'><i class="fa fa-plus-circle"></i> Eliminar</button>
					</div>
				</div>
			
			<?php endforeach; ?>
		</div>
	</div>
	<?php getModal('modalsSanatorio',$data); ?>
	<?php getModal('modalsSanatorioEditar',$data); ?>
	<?php getModal('modalSanatorioEliminar',$data); ?>
</main>
<?php footerAdmin(); ?>
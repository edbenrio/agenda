<?php headerAdmin(); ?>
<main class="app-content">
	<div class="app-title">
		<div>
			<h1><i class="fa fa-dashboard"></i> </h1>
			<!-- <p>Start a beautiful journey here</p> -->
		</div>
		<ul class="app-breadcrumb breadcrumb">
			<li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
			<li class="breadcrumb-item"><a href="#">Agenda</a></li>
		</ul>
	</div>

	<div class="row min-vh-100 d-flex align-items-center justify-content-center ">
		<?php foreach ($data as $sanatorio) : ?>
			<div class="card text-center mx-2 col-md-3 my-2">
					<div class="card-body">
						<h5 class="card-title"><?= $sanatorio["nombre"]; ?></h5>
						<p><?= $sanatorio["mail"]; ?></p>
						<p> <?= $sanatorio["direccion"].' - '. $sanatorio["ciudad"]; ?> </p>
						<p> <?= $sanatorio["telefono"].' - '.$sanatorio["celular"]; ?> </p>
						<button class="btn btn-primary" type="button" onclick='setSanatorio(<?= $sanatorio["id"]; ?>)'> ver</button>
					</div>
				</div>
		<?php endforeach; ?>
	</div>
</main>
<?php footerAdmin(); ?>
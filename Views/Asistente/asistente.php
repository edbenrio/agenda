<?php headerAdmin(); ?>
<main class="app-content">
	<div class="app-title">
		<div>
			<h1>
				<i class="fa fa-hospital-o" aria-hidden="true"></i> Asistente <button class="btn btn-primary" type="button" onclick="openModalAsistenteNuevo()"><i class="fa fa-plus-circle"></i> Nuevo</button>
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
			<?php foreach ($data as $sanatorio): ?>
				<p>hola</p>
			<?php endforeach; ?>
		</div>
	</div>
	<?php getModal("modalAsistenteNuevo", $data) ?>
</main>
<?php footerAdmin(); ?>
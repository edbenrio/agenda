<?php headerAdmin(); ?>

<main class="app-content">
	<div class="app-title">
		<div>
			<h1><i class="fa fa-dashboard"></i>
				<button class="btn btn-primary" type="button"><i class="fa fa-plus-circle"></i> Nuevo</button>
			</h1>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="tile">
				<div id="calendar">

				</div>
			</div>
		</div>
	</div>
<?php getModal('modalFechaNueva', null); ?>

</main>

<?php require_once("Views/Template/footer_calendario.php");?>    
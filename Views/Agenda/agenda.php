<?php headerAdmin("Agenda Médica"); ?>

<main class="app-content">
	
	<div class="row">
		<div class="col-md-12">
			<div class="tile">
				<div id="calendar">

				</div>
			</div>
		</div>
	</div>
<?php getModal('modalFechaNueva', null); 
	getModal("modalHorarioNuevo", null);
	getModal("modalConsultaNueva", null);
?>

</main>

<?php require_once("Views/Template/footer_calendario.php");?>    
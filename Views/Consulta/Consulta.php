<?php headerAdmin("Consultas"); ?>
<main class="app-content">
<div class="app-title">
		<div>
			<h1>
			<i class="app-menu__icon fa fa-pencil-square-o" aria-hidden="true"></i> Consultas
			</h1>
			
			<!-- <p>Start a beautiful journey here</p> -->
		</div>
		<ul class="app-breadcrumb breadcrumb">
			<li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
			<li class="breadcrumb-item"><a href="#">Clínicas</a></li>
		</ul>
	</div>
    <div class="card px-4 py-3">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Estado</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Apellido</th>
                    <th scope="col">Fecha</th>
                    <th scope="col">Inicio del turno</th>
                    <th scope="col">Sanatorio</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data as $consulta) : ?>
                    <tr onclick='setOpcionesConsulta(<?= $consulta["id_consulta"] ?>)' style="cursor: pointer;" 
                    class="
                        <?php
                        if ($consulta["estado"] == 'En espera') echo 'table-warning';
                        if ($consulta["estado"] == 'Terminado') echo 'table-success';
                        if ($consulta["estado"] == 'En proceso') echo 'table-primary';
                        if ($consulta["estado"] == 'Cancelado') echo 'table-danger'
                    ?>">
                        <td><?= $consulta["estado"] ?></td>
                        <td><?= $consulta["nombre"] ?></td>
                        <td><?= $consulta["apellido"] ?></td>
                        <td><?= date("d-m-Y", strtotime($consulta["fecha"]));  ?></td>
                        <td><?= $consulta["desde"] ?></td>
                        <td><?= $consulta["sanatorio"] ?></td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>

    <?php
        footerAdmin();
    ?>

</main>



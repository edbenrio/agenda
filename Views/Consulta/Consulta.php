<?php headerAdmin(); ?>
<main class="app-content">
    <div class="card px-4 py-3">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Estado</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Apellido</th>
                    <th scope="col">Fecha</th>
                    <th scope="col">Hora</th>
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
        getModal("modalConsultaOpciones", null);
        footerAdmin();
    ?>

</main>



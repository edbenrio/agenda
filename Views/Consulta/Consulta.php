<?php headerAdmin(); ?>
<main class="app-content">
    <div class="app-title">
        <div>
            <h1>
                <i class="fa fa-hospital-o" aria-hidden="true"></i> Consultas <button class="btn btn-primary" type="button" onclick="setModal('modalFormAsistenteNuevo','show')"><i class="fa fa-plus-circle"></i> Nuevo</button>
            </h1>
            <!-- <p>Start a beautiful journey here</p> -->
        </div>
    </div>
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
                    <tr>
                        <td><?= $consulta["estado"] ?></td>
                        <td><?= $consulta["nombre"] ?></td>
                        <td><?= $consulta["apellido"] ?></td>
                        <td><?= $consulta["fecha"] ?></td>
                        <td><?= $consulta["desde"] ?></td>
                        <td><?= $consulta["sanatorio"] ?></td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>

</main>
<?php footerAdmin(); ?>
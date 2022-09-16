<div class="modal" id="modalFormSanatorioEditar" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Editar Sanatorio</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <?php foreach ($data as $sanatorio): ?>
                <form id="formSanatorioNuevo" name="formSanatorioNuevo">
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label class="control-label">Nombre</label>
                            <input class="form-control" type="text" id="txtnombreEditar" name="txtnombreEditar" placeholder="Nombre" <?php echo('value="'.$sanatorio['nombre'].'"'); ?>>
                        </div>

                        <div class="form-group col-md-6">
                            <label class="control-label">Correo</label>
                            <input class="form-control" type="text" id="txtcorreoEditar" name="txtcorreoEditar" placeholder="Correo" <?php echo('value="'.$sanatorio['mail'].'"'); ?>>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Dirección</label>
                        <input class="form-control" type="text" id="txtdireccionEditar" name="txtdireccionEditar" placeholder="Dirección" <?php echo('value="'.$sanatorio['direccion'].'"'); ?>>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-6">
                            <label class="control-label">Ciudad</label>
                            <input class="form-control" type="text" id="txtciudadEditar" name="txtciudadEditar" placeholder="Ciudad" <?php echo('value="'.$sanatorio['ciudad'].'"'); ?>>
                        </div>

                        <div class="form-group col-md-6">
                            <label class="control-label">Barrio</label>
                            <input class="form-control" type="text" id="txtbarrioEditar" name="txtbarrioEditar" placeholder="Barrio" <?php echo('value="'.$sanatorio['barrio'].'"'); ?>>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-6">
                            <label class="control-label">Telefono</label>
                            <input class="form-control" type="text" id="txttelefonoEditar" name="txttelefonoEditar" placeholder="Telefono" <?php echo('value="'.$sanatorio['telefono'].'"'); ?>>
                        </div>

                        <div class="form-group col-md-6">
                            <label class="control-label">Celular</label>
                            <input class="form-control" type="text" id="txtcelularEditar" name="txtcelularEditar" placeholder="Celular"  <?php echo('value="'.$sanatorio['celular'].'"'); ?>>
                        </div>
                    </div>
                    <input class="hiddenId" type="hidden" id="hiddenid" name="hiddenId"  <?php echo('value="'.$sanatorio['id'].'"'); ?>>
                    <input class="hiddenIdAgenda" type="hidden" id="hiddenIdAgenda" name="hiddenIdAgenda" <?php echo('value="'.$sanatorio['id_agenda'].'"'); ?>>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modalFormSanatorioEditar">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                </form>
            <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>
<?php headerAdmin("Fecha"); ?>
<main class="app-content">
	<div class="app-title">
		<div>
            <h1>
	            <i class="fa fa-hospital-o" aria-hidden="true"></i> Fecha <button class="btn btn-primary" type="button" onclick="setModal('modalFormFechaNuevo','show')"><i class="fa fa-plus-circle"></i> Nuevo</button>
            </h1>
        </div>
    </div>
    
    <div class="card">
        <form id="formFechaNuevo">
            <div class="row">
                <div class="form-group col-md-6">
                    <label class="control-label">Fecha</label>
                    <input class="form-control"  id="txtfecha" name="txtfecha" placeholder="Fecha: año-mes-dia">
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" onclick="setModal('modalFormPacienteNuevo','hide')" data-bs-dismiss="modalFormPacienteNuevo">Cancelar</button>
                <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
        </form>
    </div>
</main>
<?php footerAdmin(); ?>
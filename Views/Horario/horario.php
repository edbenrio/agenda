<?php 
    $data["page_title"] = "Horarios";
    headerAdmin($data); 
?>
<main class="app-content">
	<div class="app-title">
		<div>
            <h1>
	            <i class="fa fa-hospital-o" aria-hidden="true"></i> Horario <button class="btn btn-primary" type="button" onclick="setModal('modalFormFechaNuevo','show')"><i class="fa fa-plus-circle"></i> Nuevo</button>
            </h1>
        </div>
    </div>
    
    <div class="card">
        <?php foreach ($data as $horario) :?>
            <p><?= dep($horario) ?></p>
        <?php endforeach ?>
    </div>
    
    <div class="card">
        <form id="formHorarioNuevo">
            <p>Horario</p>
            <div class="row">
                <div class="form-group col-md-3">
                    <label class="control-label">Desde</label>
                    <input class="form-control" type="time"  id="txtdesde" name="txtdesde" placeholder="Desde">
                </div>
                <div class="form-group col-md-3">
                    <label class="control-label">Hasta</label>
                    <input class="form-control" type="time"  id="txthasta" name="txthasta" placeholder="Hasta">
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" onclick="setModal('formHorarioNuevo','hide')" data-bs-dismiss="formHorarioNuevo">Cancelar</button>
                <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
        </form>
    </div>
</main>
<?php footerAdmin(); ?>
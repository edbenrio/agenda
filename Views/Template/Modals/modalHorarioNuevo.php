<div class="modal" id="modalFormHorarioNuevo" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Nuevo Horario</h5>
            </div>
            <div class="modal-body text-center">
                <form id="formHorarioNuevo" name="formHorarioNuevo">
                    <p>Crear Nuevo horario de consulta</p>
                    <div class="row d-flex justify-content-center">
                        <div class="form-group col-md-3">
                            <label class="control-label">Desde</label>
                            <input class="form-control" type="time" id="txtdesde" name="txtdesde" placeholder="Desde">
                        </div>
                        <div class="form-group col-md-3">
                            <label class="control-label">Hasta</label>
                            <input class="form-control" type="time" id="txthasta" name="txthasta" placeholder="Hasta">
                        </div>
                    </div>
                    <input class="hiddenIdHorarioNuevo" type="hidden" id="hiddenIdHorarioNuevo" name="hiddenIdHorarioNuevo">
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" onclick="cerrarModalHorarioNuevo()">Cancelar</button>
                        <button type="submit" class="btn btn-success">Crear</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
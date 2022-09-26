<div class="modal" id="modalFormConsultaNueva" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Nueva Consulta</h5>
            </div>
            <div class="modal-body text-center">
                <form id="formConsultaNueva" name="formConsultaNueva">
                    <p>Crear nueva consulta</p>
                    <div class="row d-flex justify-content-center">
                        <div class="form-group col-md-6">
                            <label class="control-label">CI Paciente</label>
                            <div class="input-group mb-3">
                                <input class="form-control" type="text" id="txtpacienteci" name="txtpacienteci" placeholder="Número CI del paciente" require>
                                <div class="input-group-append">
                                    <button class="btn btn-outline-secondary" type="button" onclick="buscarPacientePorCi()" class=""><i class="fa fa-search"></i></button>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-4">
                            <label class="control-label">Duración de la cosulta</label>
                            <input class="form-control" type="time" id="txtduracion" name="txtduracion" placeholder="Duración en minutos">
                        </div>
                    </div>
                    <input type="hidden" id="hiddenIdPacienteConsultaNueva" name="hiddenIdPacienteConsultaNueva">
                    <input type="hidden" id="hiddenfechaConsultaNueva" name="hiddenfechaConsultaNueva">
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" onclick="cerrarModalConsultaNueva()">Cancelar</button>
                        <button type="submit" class="btn btn-success">Crear</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
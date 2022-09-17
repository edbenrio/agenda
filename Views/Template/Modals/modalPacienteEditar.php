<div class="modal" id="modalFormPacienteEditar" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Editar Paciente</h5>
            </div>
            <div class="modal-body">
                <form id="formPacienteEditar" name="formPacienteEditar">
                <div class="row">
                        <div class="form-group col-md-6">
                            <label class="control-label">Nombre</label>
                            <input class="form-control" type="text" id="txtnombreEditar" name="txtnombreEditar" placeholder="Nombre">
                        </div>

                        <div class="form-group col-md-6">
                            <label class="control-label">Apellido</label>
                            <input class="form-control" type="text" id="txtapellidoEditar" name="txtapellidoEditar" placeholder="apellido">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Dirección</label>
                        <input class="form-control" type="text" id="txtdireccionEditar" name="txtdireccionEditar" placeholder="Dirección">
                    </div>

                    <div class="form-group">
                        <label class="control-label">Correo</label>
                        <input class="form-control" type="text" id="txtcorreoEditar" name="txtcorreoEditar" placeholder="Correo">
                    </div>

                    <div class="row">
                        <div class="form-group col-md-6">
                            <label class="control-label">Estado</label>
                            <input class="form-control" type="text" id="txtestadoEditar" name="txtestadoEditar" placeholder="Estado">
                        </div>

                        <div class="form-group col-md-6">
                            <label class="control-label">Barrio</label>
                            <input class="form-control" type="text" id="txtbarrioEditar" name="txtbarrioEditar" placeholder="Barrio">
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-6">
                            <label class="control-label">Ciudad</label>
                            <input class="form-control" type="text" id="txtciudadEditar" name="txtciudadEditar" placeholder="ciudad">
                        </div>
                        <div class="form-group col-md-6">
                            <label class="control-label">Telefono</label>
                            <input class="form-control" type="text" id="txttelefonoEditar" name="txttelefonoEditar" placeholder="Telefono">
                        </div>
                    </div>
                    <input class="hiddenIdEditar" type="hidden" id="hiddenidEditar" name="hiddenIdEditar"  >
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" onclick="setModal('modalFormPacienteEditar','hide')" data-bs-dismiss="modalFormPacienteEditar">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
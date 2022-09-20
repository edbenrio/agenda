<div class="modal" id="modalFormAsistenteNuevo" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Nuevo Asistente</h5>
            </div>
            <div class="modal-body">
                
                <form id="formAsistenteNuevo" name="formAsistenteNuevo">
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label class="control-label">Nombre</label>
                            <input class="form-control" type="text" id="txtnombre" name="txtnombre" placeholder="Nombre">
                        </div>

                        <div class="form-group col-md-6">
                            <label class="control-label">Apellido</label>
                            <input class="form-control" type="text" id="txtapellido" name="txtapellido" placeholder="apellido">
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-6">
                            <label class="control-label">Usuario</label>
                            <input class="form-control" type="text" id="txtusuario" name="txtusuario" placeholder="Usuario">
                        </div>

                        <div class="form-group col-md-6">
                            <label class="control-label">Estado</label>
                            <input class="form-control" type="text" id="txtestado" name="txtestado" placeholder="Estado">
                        </div>
                    </div>
                
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label class="control-label">Contraseña</label>
                            <input class="form-control" type="password" id="txtcontrasena" name="txtcontrasena" placeholder="Contraseña">
                        </div>
                        <div class="form-group col-md-6">
                            <label class="control-label">Repetir Contraseña</label>
                            <input class="form-control" type="password" id="txtcontrasenaverify" name="txtcontrasenaverify" placeholder="Repetir Contraseña">
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" onclick='setModal("modalFormAsistenteNuevo","hide")' data-bs-dismiss="modalFormAsistenteNuevo">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
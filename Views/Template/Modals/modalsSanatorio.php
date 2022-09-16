<div class="modal" id="modalFormSanatorioNuevo" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Nuevo Sanatorio</h5>
            </div>
            <div class="modal-body">
                
                <form id="formSanatorioNuevo" name="formSanatorioNuevo">
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label class="control-label">Nombre</label>
                            <input class="form-control" type="text" id="txtnombre" name="txtnombre" placeholder="Nombre">
                        </div>

                        <div class="form-group col-md-6">
                            <label class="control-label">Correo</label>
                            <input class="form-control" type="text" id="txtcorreo" name="txtcorreo" placeholder="Correo">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Dirección</label>
                        <input class="form-control" type="text" id="txtdireccion" name="txtdireccion" placeholder="Dirección">
                    </div>

                    <div class="row">
                        <div class="form-group col-md-6">
                            <label class="control-label">Ciudad</label>
                            <input class="form-control" type="text" id="txtciudad" name="txtciudad" placeholder="Ciudad">
                        </div>

                        <div class="form-group col-md-6">
                            <label class="control-label">Barrio</label>
                            <input class="form-control" type="text" id="txtbarrio" name="txtbarrio" placeholder="Barrio">
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-6">
                            <label class="control-label">Telefono</label>
                            <input class="form-control" type="text" id="txttelefono" name="txttelefono" placeholder="Telefono">
                        </div>

                        <div class="form-group col-md-6">
                            <label class="control-label">Celular</label>
                            <input class="form-control" type="text" id="txtcelular" name="txtcelular" placeholder="Celular">
                        </div>
                    </div>
                    
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" onclick="cerrarModalSanatorioNuevo()" data-bs-dismiss="modalFormSanatorioNuevo">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
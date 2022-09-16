<div class="modal" id="modalFormRol" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Nuevo Rol</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modalFormRol" aria-label="Close">x</button>
            </div>
            <div class="modal-body">
                <form id="formRol" name="formRol">
                    <div class="form-group">
                        <label class="control-label">Nombre</label>
                        <input class="form-control" type="text" id="txtnombre" name="txtnombre" placeholder="Nombre del rol">
                    </div>
                    <div class="form-group">
                        <label class="control-label">descripción</label>
                        <textarea class="form-control" type="text" id="txtDescripcion" rows="2" name="txtDescripcion" placeholder="Descripción" required=""></textarea>
                    </div>
                    <div class="form-group">
                        <label for=exampleSelect1>Estado</label>
                        <select class="form-control" id="liststatus" name="liststatus" required="">
                            <option value="1">Activo</option>
                            <option value="2">Inactivo</option>
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modalFormRol">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
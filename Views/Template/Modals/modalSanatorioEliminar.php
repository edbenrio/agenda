<div class="modal" id="modalFormSanatorioEliminar" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Sanatorio</h5>
            </div>
            <div class="modal-body">
                <form id="formSanatorioEliminar" name="formSanatorioEliminar">
                   <p>¿Eliminar este sanatorio?</p>
                   <input class="hiddenIdEliminar" type="hidden" id="hiddenIdEliminar" name="hiddenIdEliminar"  >
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" onclick="setModal('modalFormSanatorioEliminar','hide')">Cancelar</button>
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="modal" id="modalFormConsultaOpcionesEliminar" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 id="modalEliminarOpcionesTitle" class="modal-title">Eliminar</h5>
            </div>
            <div class="modal-body">
                <form id="formConsultaOpcionesEliminar" name="formConsultaOpcionesEliminar">
                   <p id="modalEliminarOpcionesPregunta">¿Eliminar este sanatorio?</p>
                   <input class="hiddenIdConsultaOpcionesEliminar" type="hidden" id="hiddenIdConsultaOpcionesEliminar" name="hiddenIdConsultaOpcionesEliminar">
                   <input type="hidden" id="hiddenConsultaOpcionesUrlEliminar">
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" onclick="setModal('modalFormConsultaOpcionesEliminar','hide')">Cancelar</button>
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
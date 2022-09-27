<div class="modal" id="modalConsultaOpciones" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Opciones de la consulta</h5>
            </div>
            <form id="formModalConsultaOpciones" name="formModalConsultaOpciones">
                <div class="modal-body">
                    <div class="form-group">
                        <label class="control-label">Cambiar estado</label>
                        <select class="form-control form-select" aria-label="Default select example" id="selectEstadoConsulta" name="selectEstadoConsulta">
                            <option selected>Seleccione un estado</option>
                            <option value="En espera">En espera</option>
                            <option value="Terminado">Terminado</option>
                            <option value="En proceso">En proceso</option>
                            <option value="Cancelado">Cancelado</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="control-label">Analisis</label>
                        <textarea class="form-control" type="text" id="txtestadoEditar" name="txtestadoEditar" placeholder="Descripción del analisis"></textarea>
                    </div>

                    <div class="form-group">
                        <label class="control-label">Diagnóstico</label>
                        <textarea class="form-control" type="text" id="txtestadoEditar" name="txtestadoEditar" placeholder="Descripción del diagnóstico"></textarea>
                    </div>

                    <div class="form-group">
                        <label class="control-label">Tratamiento</label>
                        <textarea class="form-control" type="text" id="txtestadoEditar" name="txtestadoEditar" placeholder="Descripción del tratamiento"></textarea>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" onclick="cerrarModalHorarioNuevo()">Cancelar</button>
                    <button type="submit" class="btn btn-success">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal" id="modalFormPacienteNuevo" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#tabPaciente">Paciente</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#tabFicha">Ficha</a>
                    </li>
                </ul>
            </div>
            <div class="modal-body">
                <form id="formPacienteNuevo" name="formPacienteNuevo">
                    <div class="tab-content">

                        <div id="tabPaciente" class="tab-pane active">

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
                            <div class="form-group">
                                <label class="control-label">Dirección</label>
                                <input class="form-control" type="text" id="txtdireccion" name="txtdireccion" placeholder="Dirección">
                            </div>

                            <div class="form-group">
                                <label class="control-label">Correo</label>
                                <input class="form-control" type="text" id="txtcorreo" name="txtcorreo" placeholder="Correo">
                            </div>

                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label class="control-label">Estado</label>
                                    <input class="form-control" type="text" id="txtestado" name="txtestado" placeholder="Estado">
                                </div>

                                <div class="form-group col-md-6">
                                    <label class="control-label">Barrio</label>
                                    <input class="form-control" type="text" id="txtbarrio" name="txtbarrio" placeholder="Barrio">
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label class="control-label">Ciudad</label>
                                    <input class="form-control" type="text" id="txtciudad" name="txtciudad" placeholder="ciudad">
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="control-label">Telefono</label>
                                    <input class="form-control" type="text" id="txttelefono" name="txttelefono" placeholder="Telefono">
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" onclick="setModal('modalFormPacienteNuevo','hide')" data-bs-dismiss="modalFormPacienteNuevo">Cancelar</button>
                                <button type="button" onclick="openTabFicha()" class="btn btn-primary">Crear Ficha</button>
                            </div>

                        </div>

                        <div id="tabFicha" class="tab-pane">
                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <label class="control-label">Enfermedades de base</label>
                                        <textarea rows="3" class="form-control" type="text" id="txtenfermedadesbase" name="txtenfermedadesbase" placeholder="Enfermedades de base"></textarea>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <label class="control-label">Alergias</label>
                                        <textarea rows="3" class="form-control" type="text" id="txtalergia" name="txtalergia" placeholder="Alergias"></textarea>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <label class="control-label">Observaciones</label>
                                        <textarea rows="3" class="form-control" type="text" id="txtobservaciones" name="txtobservaciones" placeholder="Observaciones"></textarea>
                                    </div>
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" onclick="setModal('modalFormPacienteNuevo','hide')" data-bs-dismiss="modalFormPacienteNuevo">Cancelar</button>
                                    <button type="submit" class="btn btn-primary">Guardar</button>
                                </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php

include_once '../includes/db.php';
include_once '../includes/funciones.php';


?>

<div class="modal" tabindex="-1" role="dialog" id="formEditPermisos">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body mb-4" id="editPermiso">
        <form method="post" id="frmEditPermiso">
        <!--	<div class="form-group">
                <label for="tipoUsuario">Tipo de Usuario</label>
                  <select class="form-control" name="editTipoUser" id="editTipoUser">
              <option value="Admin">Administrador</option>
              <option value="Servicio">Servicio al Cliente</option>
            </select>
          </div>
          <div class="form-group">
              <button type="submit" name="editPermisoUser" class="btn btn-primary mt-3">Guardar</button>
          </div> -->
        </form>
      </div>
     
    </div>
  </div>
</div>
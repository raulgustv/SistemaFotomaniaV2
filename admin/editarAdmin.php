<?php 

include_once '../includes/funciones.php';

access("editarAdmin");


?>

<div class="modal fade" id="form_editAdmin" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="frmEditUser" method="post">
           <!-- <div class="form-group">
          <label for="editNombreUsuario">Nombre Completo</label>
          <input type="text" name="editNombreUsuario" class="form-control" id="editNombreUsuario" placeholder="Ingresa el Nombre Completo">
        </div>
        <div class="form-group">
          <label for="editEmailUser">Correo Electrónico</label>
          <input type="email" name="editEmailUser" class="form-control" id="editEmailUser" aria-describedby="emailHelp" placeholder="Ingresa el correo electrónico" required>
        </div>
        <div class="form-group">
          <label for="editAdminPass1">Contraseña</label>
          <input type="password" name="editAdminPass1" class="form-control" id="editAdminPass1" placeholder="Contraseña">
        </div>
        <div class="form-group">
          <label for="editAdminPass2">Confirmar Contraseña</label>
          <input type="password" name="editAdminPass2" class="form-control" id="editAdminPass2" placeholder="Confirma tu contraseña">
        </div>
        <div class="form-group">
          <label for="editTipoUser">Tipo de Usuario</label>
          <select class="form-control" name="editTipoUser" id="editTipoUser">
            <option value="Admin">Admin</option>
            <option value="Otro">Otro</option>
          </select>
          <button type="submit" name="editarAdminRegistro" class="btn btn-primary mt-3"><span class="fas fa-user"></span>&nbsp; Registrar</button>
        </div> -->
      </form> 
    </div>
  </div>
</div>
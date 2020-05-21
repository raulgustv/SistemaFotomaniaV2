<?php

include_once '../includes/db.php';
include_once '../includes/funciones.php';



?>



<div class="modal fade" id="formEditCats" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         <form method="post" id="frmEditCats" role="form">
            <div class="form-group">
              <label for="categoria">Categoría</label>
              <input name="categoria" class="form-control" id="categoria" placeholder="Ingresa la nueva categoría">             
            </div>                      
            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
      </div>      
    </div>
  </div>
</div>
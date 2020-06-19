<?php

include_once '../includes/db.php';
include_once '../includes/funciones.php';

?>

<div class="modal" tabindex="-1" role="dialog" id="formEditPedidoStatus">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body mb-4" id="editStatus">
        <form method="post" id="frmEditPedidoStatus">
        	<!-- <input type="hidden" name="idPedido" value="idPedido">
        	<label for="statusPedido" class="input-group-text">Cambiar Estado Pedido</label>
			<select class="custom-select" name="statusPedido" id="statusPedido">
				<option value="6">Buenas</option>
				<option value="1">Hola</option>
				<option value="2" selected>Adios</option> 
			</select> -->
			 <!-- <div class="modal-footer">
	        	 <input type="submit" name="editStatus" id="editStatus" class="btn btn-primary" value="Guardar">   	
	       </div>  -->
        </form>
      </div>
     
    </div>
  </div>
</div>



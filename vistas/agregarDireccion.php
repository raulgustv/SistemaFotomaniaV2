<?php

    $page = basename($_SERVER['PHP_SELF'], '.php');

    if($page == "agregarDireccion"){
        header("Location: principal.php");
    } 


?>


<div class="modal" tabindex="-1" role="dialog" id="form_direccion">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Nueva dirección</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" id="frmDireccion">
            <div class="form-group">
                <label for="addLine1">Dirección 1*</label>
                <textarea type="text" class="form-control" name="addLine1" placeholder="Ejemplo: Del parque 300m sur"></textarea>
            </div>

            <div class="form-group">
               <label for="addLine2">Dirección 2 (Opcional)</label>
                <input type="text" class="form-control" name="addLine2" placeholder="#apartamento, #casa">
            </div>

            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <label class="input-group-text" for="provincia">Provincia*</label>
                    <select class="custom-select" name="provincia" id="provincia">
                      <option value="">Seleccione una provincia</option>
                       <!--  <option value="1">San José</option>
                        <option value="2">Alajuela</option>
                         <option value="3">Cartago</option> -->
                    </select>
                </div>
              </div>
            <div id="errorC"></div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">

                    <label class="input-group-text" for="canton">Canton*</label>
                    <select id="canton" class="custom-select" name="canton">
                       <!--  <option value="1">Desamparados</option>
                        <option value="2">Alajuelita</option>
                         <option value="3">La Unión</option> -->
                    </select>
                </div>
              </div>
                
              
               <div class="input-group mb-3">
                 <div class="input-group-prepend">
                    <label class="input-group-text" for="distrito">Distrito*</label>
                    <select class="custom-select" name="distrito" id="distrito">
                       <!-- <option value="1">Desamparados</option>
                        <option value="2">Alajuelita</option>
                         <option value="3">La Unión</option> -->
                    </select>
                </div>
                </div>

            
            <div class="form-group">
               <label for="zip">Código Postal*</label>
                <input type="text" class="form-control" name="zip" placeholder="11111">                
            </div>

             <div class="form-group">
              <a href="https://correos.go.cr/codigo-postal/" target="_blank">Ubica tu código postal</a>
            </div>


             <div class="form-group">
               <label for="tel">Número de teléfono*</label>
                <input type="text" class="form-control" name="tel" placeholder="2222-22-22">                
            </div>


           

             <div class="modal-footer">
               <input type="submit" id="guardarDireccion" class="btn btn-primary" value="Guardar Dirección">    
            </div>
        </form> 
        <div class="d-flex flex-row-reverse">
          <small>* Campo Requerido</small>
      </div>
      </div>

      
     
    </div>
  </div>
</div>



<div class="modal" tabindex="-1" role="dialog" id="form_editDirecion">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" id="frmDireccionEdit">
            <div class="form-group">
                <label for="editAddLine1">Dirección 1*</label>
                <textarea type="text" class="form-control" name="editAddLine1" placeholder=""></textarea>
            </div>

            <div class="form-group">
               <label for="editAddLine2">Dirección 2 (Opcional)</label>
                <input type="text" class="form-control" name="editAddLine2" placeholder="">
            </div>

            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <label class="input-group-text" for="provinciaEdit">Provincia*</label>
                    <select class="custom-select" name="provinciaEdit" id="provinciaEdit">
                       <!--  <option value="1">San José</option>
                        <option value="2">Alajuela</option>
                         <option value="3">Cartago</option> -->
                    </select>
                </div>
              </div>       
            <div class="input-group mb-3">
                <div class="input-group-prepend">

                    <label class="input-group-text" for="cantonEdit">Canton*</label>
                    <select id="cantonEdit" class="custom-select" name="cantonEdit">
                       <!--  <option value="1">Desamparados</option>
                        <option value="2">Alajuelita</option>
                         <option value="3">La Unión</option> -->
                    </select>
                </div>
              </div>
                
              
               <div class="input-group mb-3">
                 <div class="input-group-prepend">
                    <label class="input-group-text" for="distritoEdit">Distrito*</label>
                    <select class="custom-select" name="distritoEdit" id="distritoEdit">
                       <!-- <option value="1">Desamparados</option>
                        <option value="2">Alajuelita</option>
                         <option value="3">La Unión</option> -->
                    </select>
                </div>
                </div>

            
            <div class="form-group">
               <label for="zipEdit">Código Postal*</label>
                <input type="text" class="form-control" name="zipEdit" placeholder="">                
            </div>

            <div class="form-group">
              <a href="https://correos.go.cr/codigo-postal/" target="_blank">Ubica tu código postal</a>
            </div>

             <div class="modal-footer">
               <input type="submit" id="guardarEditDireccion" class="btn btn-primary" value="Guardar Dirección">    
            </div>
        </form> 
        <div class="d-flex flex-row-reverse">
          <small>* Campo Requerido</small>
      </div>
      </div>

      
     
    </div>
  </div>
</div>
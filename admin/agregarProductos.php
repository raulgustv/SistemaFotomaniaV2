<div class="modal fade" id="form_productos" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" id="frmProductos" enctype="multipart/form-data">
          <div class="form-group">
              <label for="nombreProd">Nombre</label>
              <input type="text" class="form-control" name="nombreProd" id="#nombreProd" placeholder="Nombre del producto"> 
          </div>
          <div class="form-group">
              <label for="descProd">Descripción</label>
              <textarea  type="text" rows="3" class="form-control" name="descProd" id="#descProd" placeholder="Descripción del producto"></textarea> 
          </div>
          <div class="form-group">
              <label for="precioProd">Precio</label>
              <input type="text" class="form-control" name="precioProd" id="#precioProd" placeholder="Precio producto"> 
          </div>                    
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                   <div class="custom-file">
                     <input type="file" name="imgProd" class="custom-file-input" id="imgProd">
                     <label class="custom-file-label" for="imgProd">Seleccionar Archivo</label>
                   </div> 
                </div> 
                            
            </div>            
         

          <div class="input-group mb-3">
              <div class="input-group-prepend">
                  <label class="input-group-text" for="catProd">Categoría</label>
                  <select class="custom-select" name="catAddProd" id="catAddProd">
                    <!-- <option value="1">Videojuegos</option> 
                     <option value="2">Cocina</option> 
                     <option value="3">Ferretería</option> -->
                  </select> 
              </div>
          </div>
          <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
      </div>
     
      </div>
    </div>
  </div>
</div>



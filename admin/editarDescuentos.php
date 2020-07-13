<?php

include_once '../includes/db.php';
include_once '../includes/funciones.php';

access("editarDescuentos");


?>



<div class="modal fade" id="formEditDesc" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Editar descuento</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="editDesc">

       <form method='post' id='frmEditDescuentos' enctype='multipart/form-data'>
          
       
         
        <!--      <div class="form-group">
              <label for="editNombre">Nombre</label>
              <input type="text" class="form-control" name="editNombre" id="editNombre" placeholder="Nombre del producto"> 
          </div>
          <div class="form-group">
              <label for="editDesc">Descripción</label>
              <textarea  type="text" rows="3" class="form-control" name="editDesc" id="editDesc" placeholder="Descripción del producto"></textarea> 
          </div>
          <div class="form-group">
              <label for="editPrecio">Precio</label>
              <input type="text" class="form-control" name="editPrecio" id="editPrecio" placeholder="Precio producto"> 
          </div> 

            <div class="input-group mb-3">
                <div class="input-group-prepend">
                   <div class="custom-file">
                     <input type="file" name="editImgProd" class="custom-file-input" id="editImgProd">
                     <label class="custom-file-label" for="editImgProd">Seleccionar Archivo</label>
                   </div> 
                </div>                             
            </div>   

            <div class="mb-3" id="prevContainer">
               <img class="imgPrev" id="imgPrev" src="#">
            </div>   -->       
         

       

            
            
          </form>  
  
  
               
      </div>      
    </div>
  </div>
</div>
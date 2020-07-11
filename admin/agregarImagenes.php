<?php 

include_once '../includes/funciones.php';

access("agregarImagenes");


?>

<div class="modal fade" id="form_imagenes" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="frmGaleria" enctype="multipart/form-data" method="post">
            <div class="form-group">
                <label>Título de la imagen</label>
                <input type="text" name="tituloImg" id="tituloImg" class="form-control" placeholder="Nombre de la imagen">
            </div>

            <div class="form-group">
                <label>Autor</label>
                <input type="text" name="nombreAutor" id="nombreAutor" class="form-control" placeholder="Nombre del Autor que tomó la fotografía">
            </div>

            <div class="form-group">
                <label>Tomada con</label>
                <input type="text" name="nombreCam" id="nombreCam" class="form-control" placeholder="Cámara usada para tomar la foto">
            </div>

               <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <div class="custom-file">
                      <input type="file" name="imgMain" class="custom-file-input" id="imgMain">
                      <label class="custom-file-label" for="imgMain">Seleccionar imagen Principal</label>
                     </div>
                </div>
            </div>

            <div class="mb-3" id="prevContainer">
                <img src="#" class="imgPrev" id="prev3">
            </div>
        
      </div>

      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Guardar</button>        
      </div>
      </form>
    </div>
  </div>
</div>
<?php 

include_once '../includes/funciones.php';

access("agregarDescuento");


?>

<div class="modal fade" id="form_descuentos" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Nuevo Descuento</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         <form method="post" id="frmDescuento" role="form">
         <div class="form-group">
              <label for="nombreProd">Nombre</label>
              <input type="text" class="form-control" name="nombreDesc" id="#nombreDesc" placeholder="Nombre del descuento"> 
          </div>
          <div class="form-group">
              <label for="descProd">Descripción</label>
              <textarea  type="text" rows="3" class="form-control" name="descripciondesc" id="#descripciondesc" placeholder="Descripción del descuento"></textarea> 
          </div>

          <div class="form-group">
              <label for="descuento">Porcentaje descuento</label>
              <div class="input-group mb-3">
              <div class="input-group-prepend">
                  <label class="input-group-text" for="porcentDesc">Descuento</label>
                  <select class="custom-select" name="porcentDesc" id="porcentDesc">
                    <option value="5">5% de descuento</option> 
                     <option value="10">10% de descuento</option> 
                     <option value="15">15% de descuento</option>
                     <option value="20">20% de descuento</option>
                     <option value="25">25% de descuento</option>
                     <option value="30">30% de descuento</option>
                     <option value="35">35% de descuento</option>
                     <option value="40">40% de descuento</option>
                     <option value="45">45% de descuento</option>
                     <option value="50">50% de descuento</option>
                     <option value="55">55% de descuento</option>
                     <option value="60">60% de descuento</option>
                     <option value="65">65% de descuento</option>
                     <option value="70">70% de descuento</option>
                     <option value="75">75% de descuento</option>
                     <option value="80">80% de descuento</option>
                     <option value="85">85% de descuento</option>
                     <option value="90">90% de descuento</option>
                     <option value="95">95% de descuento</option>
                     <option value="100">100% de descuento</option>
                  </select> 
              </div>
          </div>             
            </div>  

            <div class="form-group">
              <label for="producto">Producto</label>
              <div class="input-group mb-3">
              <div class="input-group-prepend">
                  <label class="input-group-text" for="prodDesc">Producto</label>
                  <select class="custom-select" name="prodAddDesc" id="prodAddDesc">
                    <!-- <option value="1">Videojuegos</option> 
                     <option value="2">Cocina</option> 
                     <option value="3">Ferretería</option> -->
                  </select> 
              </div>
          </div>             
            </div>  
            
            <div class="form-group">
            <label for="fechaInicio">Fecha de Inicio</label>
        <div class="input-group date" id="datetimepicker1" data-target-input="nearest">         
          <div class="input-group-append" data-target="#datetimepicker1" data-toggle="datetimepicker">
            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
          </div>
           <input type="text" id="fechaInicio" name="fechaInicio" class="form-control datetimepicker-input" data-target="#datetimepicker1" />
        </div>
      </div>

      <div class="form-group">
            <label for="fechaFinal">Fecha de Finalizacion</label>
        <div class="input-group date" id="datetimepicker2" data-target-input="nearest">          
          <div class="input-group-append" data-target="#datetimepicker2" data-toggle="datetimepicker">
            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
          </div>
          <input type="text" id="fechaFinal" name="fechaFinal" class="form-control datetimepicker-input" data-target="#datetimepicker2" />
        </div>
      </div>


<script>
    (function() {
  $('#datetimepicker1').datetimepicker();
});
(function() {
  $('#datetimepicker2').datetimepicker();
});
</script>
            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
      </div>      
    </div>
  </div>
</div>
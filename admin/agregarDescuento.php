<script>
var slider = new Slider("#slDesc");
</script>
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
          <input id="slDesc" type="text" data-slider-min="1" data-slider-max="99" data-slider-step="1" data-slider-value="10"/>
          <span id="ex6CurrentSliderValLabel">Descuento: <span id="ex6SliderVal">10</sspan></span><span>%</span>
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
          <input type="text" id="fechaInicio" class="form-control datetimepicker-input" data-target="#datetimepicker1" />
          <div class="input-group-append" data-target="#datetimepicker1" data-toggle="datetimepicker">
            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
          </div>
        </div>
      </div>

      <div class="form-group">
            <label for="fechaFinal">Fecha de Finalizacion</label>
        <div class="input-group date" id="datetimepicker2" data-target-input="nearest">
          <input type="text" id="fechaFinal" class="form-control datetimepicker-input" data-target="#datetimepicker2" />
          <div class="input-group-append" data-target="#datetimepicker2" data-toggle="datetimepicker">
            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
          </div>
        </div>
      </div>


<script>
    $(function() {
  $('#datetimepicker1').datetimepicker();
});
$(function() {
  $('#datetimepicker2').datetimepicker();
});
</script>
            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
      </div>      
    </div>
  </div>
</div>
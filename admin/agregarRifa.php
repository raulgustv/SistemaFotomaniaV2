<div class="modal fade" id="form_concurso" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Nueva Rifa</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         <form method="post" id="frmConcurso" role="form">
         <div class="form-group">
              <label for="nombreConc">Nombre</label>
              <input type="text" class="form-control" name="nombreConc" id="#nombreConc" placeholder="Nombre de la Rifa"> 
          </div>
          <div class="form-group">
              <label for="descripcionConc">Descripción</label>
              <textarea  type="text" rows="3" class="form-control" name="descripcionConc" id="#descripcionConc" placeholder="Descripción de la Rifa"></textarea> 
          </div>

          <div class="form-group">
              <div class="input-group mb-3">
              <div class="input-group-prepend">
                  <label class="input-group-text" for="cantidadMax">Cantidad de Participantes</label>
                  <select class="custom-select" name="cantidadMax" id="cantidadMax">
                    <option value="5">5 participantes</option> 
                     <option value="10">10 participantes</option> 
                     <option value="15">15 participantes</option>
                     <option value="20">20 participantes</option>
                     <option value="25">25 participantes</option>
                     <option value="30">30 participantes</option>
                     <option value="35">35 participantes</option>
                     <option value="40">40 participantes</option>
                     <option value="45">45 participantes</option>
                     <option value="50">50 participantes</option>
                     <option value="55">55 participantes</option>
                     <option value="60">60 participantes</option>
                     <option value="65">65 participantes</option>
                     <option value="70">70 participantes</option>
                     <option value="75">75 participantes</option>
                     <option value="80">80 participantes</option>
                     <option value="85">85 participantes</option>
                     <option value="90">90 participantes</option>
                     <option value="95">95 participantes</option>
                     <option value="100">100 participantes</option>
                  </select> 
              </div>
          </div>             
            </div>  

            <div class="form-group">
              <div class="input-group mb-3">
              <div class="input-group-prepend">
                  <label class="input-group-text" for="prodAddConc">Producto</label>
                  <select class="custom-select" name="prodAddConc" id="prodAddConc">
                    <!-- <option value="1">Videojuegos</option> 
                     <option value="2">Cocina</option> 
                     <option value="3">Ferretería</option> -->
                  </select> 
              </div>
          </div>             
            </div> 

        
            
            <div class="form-group">
            <label for="fechaInicio">Fecha de Inicio</label>
        <div class="input-group date" id="datetimepicker3" data-target-input="nearest">
          <input type="text" id="fechaInicio" name="fechaInicio" class="form-control datetimepicker-input" data-target="#datetimepicker3" />
          <div class="input-group-append" data-target="#datetimepicker3" data-toggle="datetimepicker">
            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
          </div>
        </div>
      </div>

      <div class="form-group">
            <label for="fechaFinal">Fecha de Finalizacion</label>
        <div class="input-group date" id="datetimepicker4" data-target-input="nearest">
          <input type="text" id="fechaFinal" name="fechaFinal" class="form-control datetimepicker-input" data-target="#datetimepicker4" />
          <div class="input-group-append" data-target="#datetimepicker4" data-toggle="datetimepicker">
            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
          </div>
        </div>
      </div>


<script>
    (function() {
  $('#datetimepicker3').datetimepicker();
});
(function() {
  $('#datetimepicker4').datetimepicker();
});
</script>
        <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
      </div>      
    </div>
  </div>
</div>
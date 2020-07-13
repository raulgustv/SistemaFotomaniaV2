<?php include '../templates/mainHeader.php' ?>





  <div class="backgroundOverlayLoad" id="load">
  <div class="d-flex justify-content-md-center align-items-center vh-100">
    <div class="card bg-primary bg-light">
      <div class="card-body">
        <img class="loaderGif" src="../vistas/../logos/preloader.gif">
      </div>
    </div>
  </div>
</div>


<div id="getConcursos">

  <div class="container">
      <div class="row" id="obtenerConcurso">
          <div class="col-lg-6 mb-2">
            <div class="card">
              <div class="card-header text-center">
                  Nombre Rifa
              </div>
              <div class="card-body">
                  <div class="row">
                      <div class="col-lg-6 vDivider">
                        <img class="card-img-top" src="imagenes/Canon EOS SL2681.png">
                      </div>
                      <div class="col-lg-6">
                          <p>Cámara Canon</p>
                          <p>6/10 Participantes</p>
                          <p>Ganador: Antonio Vera</p>

                          <button  id="ingConcurso" class="btn btn-success">Ingresar</button>
                          <button  id="delConcurso" class="btn btn-danger">Salir</button>
                      </div>
                  </div>              
            </div>
            <div class="footer">
                <h5 class="text-center">Quedan 4 días</h5>
            </div>
          </div>
      </div>
  </div> 

</div>








<?php include '../templates/mainFooter.php' ?>
<?php include '../templates/mainHeader.php' ?>
<?php include '../includes/db.php' ?>






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
    <div class="row">
      
  
    </div>
      <div class="row" id="obtenerConcurso">

      <?php

        $q = $con->query("SELECT idConcurso, concurso.nombre AS nombreConc, fechaInicio, fechaFinal, cantidadMaxima, ganador, productos.nombre AS nombreProd, productos.imagen FROM concurso INNER JOIN productos ON concurso.idPremio = productos.id");

        
        $cont = 1;

        while ($r = mysqli_fetch_array($q)){

              $nombreC = $r['nombreConc'];
              $fechaInicio = $r['fechaInicio'];
              $fechaFinal = $r['fechaFinal'];
              $max = $r['cantidadMaxima'];
              $ganador = $r['ganador'];
              $producto = $r['nombreProd'];
              $imagen = $r['imagen'];
              $idConcurso = $r['idConcurso'];

              $fechaFinalizado = date('Y-m-d H:i:s', strtotime($fechaFinal));

              date_default_timezone_set("America/Costa_Rica");
              $fechahoy = date("Y-m-d H:i:s");

             $yacomenzo = ($fechaInicio<$fechahoy);
             $yatermino = ($fechaFinal>$fechahoy);
         
              if($yacomenzo==1 && $yatermino==1){
              ?>

              <div class="col-lg-6 mb-2">
            <div class="card cardRifa">
              <div class="card-header text-center">
                  <?php echo $nombreC; ?>
              </div>
              <div class="card-body">
                  <div class="row">
                      <div class="col-lg-6 vDivider">
                        <img class="card-img-top" src="imagenes/<?php echo $imagen ?>">
                      </div>
                      <div class="col-lg-6">
                          <p> <?php echo $producto; ?></p>
                          <p>Cantiad máxima participantes: <?php echo $max ?></p> 
                          <p>Finaliza: <?php echo $fechaFinalizado; ?>  </p>
                          <?php 
                              $uid = $row['id'];

                              $q2 = $con->query("SELECT concurso.idConcurso, concurso.cantidadMaxima FROM clientesxconcurso INNER JOIN concurso ON concurso.idConcurso = clientesxconcurso.idConcurso WHERE concurso.idConcurso = $idConcurso");

                              

                              if(mysqli_num_rows($q2) >= $max){ ?>

                                <div class="alert alert-info text-warning text-center" role="alert">
                                  Cantidad máxima de concursantes han ingresado.
                              </div>
                             
                              <button  cid="<?php echo $idConcurso ?>" id="delConcurso" class="btn btn-danger">Salir</button>

                            <?php  }else{

                                  $sql = $con->query("SELECT * FROM clientesxconcurso WHERE idCliente = $uid AND idConcurso = $idConcurso");
                                 if(mysqli_num_rows($sql) > 0){ ?>

                                   <div class="alert alert-info text-center" role="alert">
                                ¡Felicidades, ya estás participando!  
                                 </div>
                              <button  cid="<?php echo $idConcurso ?>" id="delConcurso" class="btn btn-danger">Salir</button>

                              
                            <?php }else{ ?>
                                  <button cid="<?php echo $idConcurso ?>"  id="ingConcurso" class="btn btn-success">Ingresar</button>
                              
                           <?php } }


                           ?>
                          
                      </div>
                  </div>              
            </div>
            <div class="card-footer footerRifas">
                <h5 class="text-center">Quedan</h5>
                <div class="Countdown" data-date="<?php echo $fechaFinal ?>"></div>
                <h5 class="text-center">Para ingresar a este concurso</h5>
            </div>
          </div>
      </div> 



   <?php     } }



      ?>


          
  </div> 

</div>








<?php include '../templates/mainFooter.php' ?>
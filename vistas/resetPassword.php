<?php
include_once '../includes/funciones.php';
include '../includes/db.php';
if (isset($_GET['token'])) {
    $tokenenviado = $_GET['token'];
    echo $tokenenviado;
    echo "<br>";
} else {
    echo 'no existe';
    echo "<br>";
}
/*
$tokendb = $con->prepare("SELECT * FROM contrareset");
$tokendb->execute();
$ftoken = $tokendb->get_result();
if($ftoken->num_rows>0){
  while($arraytoken = mysqli_fetch_array($ftoken)){
        echo $arraytoken['token'];
        if($arraytoken['token'] == $tokenenviado){
        $existe = 1;
        }else{
            $existe = 0;
        }

    echo "<br>";
}
  }  

  if($existe == 1){
    echo 'Aqui nos quedamos';
 }else{
     echo 'Adios';
 }*/

 $existecr;
if(!isset($tokenenviado)){
   
    redir("./"); 

    }else{
        $qcr = $con->query("SELECT * FROM contrareset WHERE token = '$tokenenviado'");
        if(mysqli_num_rows($qcr)<=0){
            redir("http://localhost/SISTEMAFOTOMANIAv2/");
        }else{
            $datos = mysqli_fetch_array($qcr);
            echo $datos['tokenExpira'] ."<br>";
            date_default_timezone_set('America/Costa_Rica');
            $now = new \DateTime();
            $target = new \DateTime($datos['tokenExpira']);
            $minutes = ($target->getTimestamp() - $now->getTimestamp())/60;
            if($minutes <= 0){
                redir("http://localhost/SISTEMAFOTOMANIAv2/");  
            }else{
                
            }
        }
    }
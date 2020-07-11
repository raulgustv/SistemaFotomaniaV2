<?php

include_once '../includes/funciones.php';
include '../includes/db.php';

/*session_start();
checkAdmin();*/
?>

<div class="modal fade" id="formPartConc" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Participantes del concurso</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="PartConcurso">

<div class="container-fluid mt-2">
	<table class="table table-striped" id="dtTablaPart">
		<thead>
			<tr>
				<th>Concurso</th>
                <th>Id participante</th>
				<th>Nombre del participante</th>
				<th>Numero Participante</th>
			</tr>	
		</thead>
        <tbody id="tblBPartConc">
		
		</tbody>
			

	</table>

    
               
      </div>      
    </div>
  </div>
</div>
<!-- Button trigger modal -->


<!-- Modal -->
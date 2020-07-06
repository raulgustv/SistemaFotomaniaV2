<?php 

include '../templates/mainHeader.php';
include '../includes/db.php'
//include '../acciones/sesion.php';
?>

<!--========================================
=            Cabecera Principal            =
=========================================-->

<header class="headMain">
	<div class="background-overlay text- py-5">
		<div class="container">
			<div class="row"> 
				<div class="col-lg-6 text-center text-white justify-content-center align-self-center">
					<h1>Esta es la página principal</h1>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dicta veniam obcaecati illo dolores perferendis consequuntur modi perspiciatis ullam accusantium, vel, magnam maiores, eius doloremque laudantium, ea consequatur recusandae eveniet officiis!</p>
					<a href="#" class="btn btn-outline-secondary btn-lg text-white">Leer Más</a>
				</div>
				<div class="col-lg-6">
					<img src="../logos/sonyalpha7.png" class="img-fluid d-none d-sm-block" alt="sonyA6400">
				</div>
			</div>
		</div>
	</div>
</header>

<!--====  End of Cabecera Principal  ====-->


<!--====================================
=            Sobre Nosotros            =
=====================================-->


<section class="py-5">
	<div class="container"> 
		<div class="row">
			<div class="col-lg-4">
				<div class="card text-center border-primary">
					<div class="card-body">
						<h3>Nuestra tienda</h3>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Qui.</p>
					</div>
				</div>
			</div>
			<div class="col-lg-4">
				<div class="card text-center border-primary">
					<div class="card-body">
						<h3>Sobre Nosotros</h3>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Qui.</p>
					</div>
				</div>
			</div>
			<div class="col-lg-4">
				<div class="card text-center border-primary">
					<div class="card-body">
						<h3>Contáctanos</h3>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Qui.</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<!--====  End of Sobre Nosotros  ====-->

<!--======================================
=            Porqué fotomanía            =
=======================================-->

<section class="bg-light text-center">
	<div class="container">
		<div class="row">
			<div class="m-5">
				<h3>¿Porqué fotomanía?</h3>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia, hic? Eum quod ab facilis voluptates eos nesciunt quos laudantium accusantium nemo, in perferendis veniam velit, dolorem fugit doloribus est voluptatibus.</p>
			</div>
		</div>
	</div>
</section>

<!--====  End of Porqué fotomanía  ====-->

<!--====================================
=            Accordion FAQS            =
=====================================-->

<section class="container text-center p-5">
	<div class="row">
		<div class="accordion" id="accordionExample">
  <div class="card">
    <div class="card-header" id="headingOne">
      <h2 class="mb-0">
        <button class="btn btn-link btn-block text-center" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
          ¿Cómo comprar? 
        </button>
      </h2>
    </div>

    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
      <div class="card-body">
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsum deserunt sapiente impedit ut eius ab, tempora magni fugiat, corporis inventore ea voluptatem voluptatibus dignissimos reprehenderit iusto minima eaque reiciendis. Delectus reiciendis, consequatur explicabo eveniet numquam, alias assumenda. Necessitatibus a beatae nihil consequatur recusandae optio aliquam, officiis ipsum neque, commodi ex.
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header" id="headingTwo">
      <h2 class="mb-0">
        <button class="btn btn-link btn-block text-center collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
          Collapsible Group Item #2
        </button>
      </h2>
    </div>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
      <div class="card-body">
        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header" id="headingThree">
      <h2 class="mb-0">
        <button class="btn btn-link btn-block text-center collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
          Collapsible Group Item #3
        </button>
      </h2>
    </div>
    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
      <div class="card-body">
        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
      </div>
    </div>
  </div>
</div>
	</div>
</section>

<!--====  End of Accordion FAQS  ====-->

<!--===============================
=            Contactar            =
================================-->

<section class="bg-light py-5">
	<div class="container">
		<div class="row">
			<div class="col-lg-9">
				<h3>Contacto</h3>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing.</p>
				<form action="">
					<div class="input-group mb-3">
						<div class="input-group-prepend">
						    <i class="fas fa-user input-group-text"></i>
						</div>
					<input type="text" class="form-control" placeholder="Tu Nombre" aria-label="Username" aria-describedby="basic-addon1">
					</div>

					<div class="input-group mb-3">
						<div class="input-group-prepend">
						    <i class="fas fa-envelope input-group-text"></i>
						</div>
					<input type="text" class="form-control" placeholder="Tu Correo electrónico" aria-label="Username" aria-describedby="basic-addon1">
					</div>

					<div class="input-group mb-3">
						<div class="input-group-prepend">
						    <i class="fas fa-pencil-alt input-group-text"></i>
						</div>
					<textarea name="messageForm" cols="30" row="10" class="form-control"></textarea>
					</div>
				</form>
			</div>
			<div class="col-lg-3"></div>
		</div>
	</div>
</section>

<!--====  End of Contactar  ====-->










<?php include '../templates/mainFooter.php' ?>
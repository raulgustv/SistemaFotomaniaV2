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
					<h1>Bienvenido a Fotomanía Costa Rica</h1>
					<p>Insuperables en Atención y Asesoría porque... SÍ sabemos de Fotografía</p>
					<a href="tienda.php" class="btn btn-outline-success btn-lg text-white">Comprar ahora</a>
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
					<div class="card-body cardPrincipal">
						<h3>FOTO BOUTIQUE</h3>
						<p>Cámaras, Lentes y accesorios con el toque de exclusividad para que el nuevo fotografo aficionado o el profesional cumplan sus retos.</p>
						<p>Atención personalizada y exclusiva, sin mostradores, sin posturas, puro amor a la foto y nuestros clientes.</p>
					</div>
				</div>
			</div>
			<div class="col-lg-4">
				<div class="card text-center border-primary">
					<div class="card-body cardPrincipal">
						<h3>Sobre Nosotros</h3>
						<p>FOTOMANIACR con más de una década en el mercado te brinda su Experiencia, Soporte y Respaldo de tu compra para cuando... las cosas no salen bien. Ahí es donde se diferencia una empresa de verdad de los que solo venden cajas.</p>
					</div>
				</div>
			</div>
			<div class="col-lg-4">
				<div class="card text-center border-primary">
					<div class="card-body cardPrincipal">
						<h3>Asesoría</h3>
						<p>NUNCA te sentirás mejor que adquirir un equipo fotográfico con nosotros.Recibe TODA la asesoria que requieres sin límites de tiempo. <a href="#contact">Puedes contactarnos con nuestro formulario</a></p>
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
				<p>Bajo la modalidad FOTO MIAMI DIRECTO estás comprando directamente en el Warehouse de Distribuidor en USA.
					Pagás con tarjeta igual que una compra en Amazon y a precio Amazon o BH Photo pero con la GARANTÍA , SOPORTE y PLAN de RENOVACION de FOTOMANIACR en CR. </p>
					<p>Los costos de Envío, Aduanas y Seguros a CR son GRATIS y solo cancelás el 14.13% de impuestos de nacionalizaición y es todo.  Tu garantia es manejada directamente en CR sin costos adicionales.</p>
					<p>TODO EQUIPO ES TOTALMENTE NUEVO (NO Refurbished) y salen del Warehouse local en Miami o subsidiaria en categoría de producto para Exportación.</p>
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
      	<p>Enviaremos tus productos a tu dirección principal, puedes administrar tu <a href="libretaDirecciones.php" target="_blank" class="btn-link">libreta de direcciones</a> antes de realizar tu compra </p>
       <p>	Cuando ingresas a nuestra sección de Tienda podrás encontrar diferentes menús de categorías por Cámaras, Lentes y/o sus Marcas.  Cuando elijas el producto de tu agrado haces clic sobre el ícono de agregar al carrito y selecciona la cantidad que deseas. Después solo debes ir al menú superior y hacer clic sobre tu carrito, verás tus productos y la opcion "Ir a Carrito". </p>
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header" id="headingTwo">
      <h2 class="mb-0">
        <button class="btn btn-link btn-block text-center collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
         Verificando tu carrito
        </button>
      </h2>
    </div>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
      <div class="card-body">
        Verifica tu compra, podrás ver el producto que elegiste, su precio unitario, descuento (si aplica) y total del producto. Puedes modificar tu carrito agregando o eliminando productos del carrito. Debes hacer clic en el ícono de "check" para confirmar tu pedido. 
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header" id="headingThree">
      <h2 class="mb-0">
        <button class="btn btn-link btn-block text-center collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
          Compra con Paypal <img src="../logos/paypal icon.png" style="width: 5%;">
        </button>
      </h2>
    </div>
    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
      <div class="card-body">
        Haz clic sobre el boton de "Paypal Checkout" estaremos enviando tus productos a tu dirección principal. No es necesario que modifiques tu dirección de Paypal. Tu pedido puede tardar entre 10-15 días hábiles para ser entregado. Si tienes dudas puedes <a href="#contact">contactar con nosotros</a>.
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

<section class="bg-light py-5" id="contact">
	<div class="container">
		<div class="row">
			<div class="col-lg-9">
				<h3>Contacto</h3>
				<p>Es un gusto atenderte por favor escribe tu mensaje e indícanos con todos los detalles cómo podemos ayudarte.</p>
				<form action="">
					<div class="input-group mb-3">
						<div class="input-group-prepend">
						    <i class="fas fa-user input-group-text"></i>
						</div>
					<input type="text" class="form-control" placeholder="Tu Nombre" aria-label="Username" aria-describedby="basic-addon1">
					</div>

					<div class="input-group mb-3">
						<div class="input-group-prepend">
						    <span class="input-group-text" id="addon-wrapping">@</span>
						</div>
					<input type="text" class="form-control" placeholder="Tu Correo electrónico" aria-label="Username" aria-describedby="basic-addon1">
					</div>

					<div class="input-group mb-3 input-group-lg">
						<div class="input-group-prepend">
						    <i class="fas fa-envelope input-group-text"></i>
						</div>
					<textarea name="messageForm" cols="30" rows="7" class="form-control" aria-label="hola"></textarea>
					</div>
				</form>
				<button class="btn btn-primary btn-lg btn-block">Envía tu mensaje</button>
			</div>
			<div class="col-lg-3">
				<img src="../logos/logoFotomania.PNG" alt="Logo Fotomania" style="width: 40%;">
				<h3>FOTOMANIA CR</h3>
				<p>Los Yoses, Montes de Oca, San José, Costa Rica</p>
				<p><b>Teléfono: </b>(506) 4000-0938 / (506) 4000-0939</p>
			</div>
		</div>
	</div>
</section>

<!--====  End of Contactar  ====-->

<!--==========================
=            Mapa            =
===========================-->
<section>

	<div class="container py-5 text-center">
		<div id="map"></div>
	</div>
</section>



<!--====  End of Mapa  ====-->












<?php include '../templates/mainFooter.php' ?>
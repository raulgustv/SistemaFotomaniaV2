<?php include '../templates/mainHeader.php' ?>
<style>

body{background:#59ABE3;margin:0}
.formcont{width:340px;height:540px;background:#e6e6e6;border-radius:8px;box-shadow:0 0 40px -10px #000;margin:calc(50vh - 220px) auto;padding:20px 30px;max-width:calc(100vw - 40px);box-sizing:border-box;font-family:'Montserrat',sans-serif;position:relative}
h2{margin:10px 0;padding-bottom:10px;width:180px;color:#78788c;border-bottom:3px solid #78788c}
input.form-control{width:100%;padding:10px;box-sizing:border-box;background:none;outline:none;resize:none;border:0;font-family:'Montserrat',sans-serif;transition:all .3s;border-bottom:2px solid #bebed2}
input.form-control:focus{border-bottom:2px solid #78788c}
p:before{content:attr(type);display:block;margin:28px 0 0;font-size:14px;color:#5a5a5a}
button.contactar{float:right;padding:8px 12px;margin:8px 0 0;font-family:'Montserrat',sans-serif;border:2px solid #78788c;background:0;color:#5a5a6e;cursor:pointer;transition:all .3s}
button.contactar:hover{background:#78788c;color:#fff}
div.divcont{content:'Hi';position:absolute;bottom:-15px;right:-20px;background:#50505a;color:#fff;width:320px;padding:16px 4px 16px 0;border-radius:6px;font-size:13px;box-shadow:10px 10px 40px -14px #000}
span{margin:0 5px 0 15px}

</style>
<div class="formcont">
<form method="post" id="formContacto" enctype='multipart/form-data'>
  <h2>Contactanos</h2>
  <p type="Nombre:"><input class='form-control' id="contNombre" name="contNombre" placeholder="Escriba aqui su nombre.."></input></p>
  <p type="Correo Electronico:"><input class='form-control' id="contEmail" name="contEmail" placeholder="Email al cual lo contactaremos.."></input></p>
  <p type="Mensaje:"><input class='form-control' id="contMensaje" name="contMensaje" placeholder="Mensaje que desea enviarnos.."></input></p>
  <div class="divcont">
    <span class="fa fa-phone"></span>2200 00 00
    <span class="fa fa-envelope-o"></span> fotomania@correo.com
  </div>
</form>
<button id="contactar" name="contactar" class="contactar">Enviar mensaje</button>
</div>
<?php include '../templates/mainFooter.php' ?>
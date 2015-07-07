<div class="titulo-AM">
	<h2>
		Registro de Nuevo Usuario
	</h2>
</div>
<script src="view/js/utils.js"></script>
<section id="formulario">
	<form action="?c=usuario&a=insertar" method="post" class="form-horizontal" onsubmit="return validarNuevoUsuario();">
		<?php if(isset($_REQUEST['errorRegistro'])) {?>		
		<div class="form-group">
			<span><p class="bg-warning"><?php echo "'".$_REQUEST['errorRegistro']."' ya se encuentra registrado en el sistema";?></p></span>		
		</div>		
		<?php } ?>
		<div class="form-group">		
			<label for="nombre">Nombre:</label>
			<input id="nombre" class="form-control" type="text" name="nombre" placeholder="Nombre" required="" />
		</div>
		<div class="form-group">						
			<label for="nombre">Apellido:</label>
			<input id="apellido" class="form-control" type="text" name="apellido" placeholder="Apellido" required="" />
		</div>		
		<div class="form-group">				
			<label for="email">Email:</label>
			<input id="email" class="form-control" type="email" name="email" placeholder="ejemplo@correo.com" required="" />
		</div>		
		<div class="form-group">						
			<label for="usuario">Nombre de usuario:</label>
			<input id="usuario" class="form-control" type="text" name="usuario" placeholder="Usuario" required="" />
<div id="resultado"></div>
		</div>		
		<div class="form-group">				
			<label for="pass"> Contraseña</label>
			<input id="pass" class="form-control" type="password" name="pass" placeholder="" required="" />
		</div>		
		<!--<div class="form-group">				
			<label for="confirmPass">Confirmar Contraseña</label>
			<input id="confirmPass" class="form-control"  type="password" name="confirmPass" placeholder="" required="" />
		</div>-->		
		<div class="form-group">				
			<label for="fechaNac">Fecha de Nacimiento</label>
			<input id="fechaNac" class="form-control" type="date" name="fechaNac" required="" />
		</div>		
		<div class="form-group">				
			<label for="nroTarjeta">N° de Tarjeta</label>
			<input id="nroTarjeta" class="form-control"  type="text" name="nroTarjeta" placeholder="1111-2222-3333-4444" required="" />
		</div>
		<input id="submit" type="submit" name="submit" value="Enviar" />
	</form>
</section>
<div style="clear:both;"> </div>
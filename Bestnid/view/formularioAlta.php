<div class="titulo-AM">
	<h2>
		Registro de Nuevo Usuario
	</h2>
</div>
<script src="view/js/utils.js"></script>
<section id="formulario">
<<<<<<< Updated upstream
	<form action="?c=usuario&a=insertar" method="post" class="form-horizontal" onsubmit="return validarNuevoUsuario();">
		<?php if(isset($_REQUEST['errorRegistro'])) {?>
=======
	<form action="?c=usuario&a=insertar" method="post" class="form-horizontal" onsubmit="return validarNuevoUsuario();">		
		<?php 
		if(isset($_REQUEST['usr'])) {
			$usr=$_REQUEST['usr'];		
		}		
		if(isset($_REQUEST['errorRegistro'])) {?>				
>>>>>>> Stashed changes
		<div class="form-group">
			<span><p class="bg-warning"><?php echo "'".$_REQUEST['errorRegistro']."' ya se encuentra registrado en el sistema";?></p></span>
		</div>
		<?php } ?>
		<div class="form-group">
			<label for="nombre">Nombre:</label>
			<input id="nombre" class="form-control" type="text" name="nombre" placeholder="Nombre" required="" value="<?php echo $usr->__GET('nombre'); ?>" />
		</div>
		<div class="form-group">
			<label for="nombre">Apellido:</label>
<<<<<<< Updated upstream
			<input id="apellido" class="form-control" type="text" name="apellido" placeholder="Apellido" required="" />
		</div>
		<div class="form-group">
			<label for="email">Email:</label>
			<input id="email" class="form-control" type="email" name="email" placeholder="ejemplo@correo.com" required="" />
		</div>
		<div class="form-group">
=======
			<input id="apellido" class="form-control" type="text" name="apellido" placeholder="Apellido" required="" value="<?php echo $usr->__GET('apellido'); ?>" />
		</div>		
		<div class="form-group">				
			<label for="email">Email:</label>
			<input id="email" class="form-control" type="email" name="email" placeholder="ejemplo@correo.com" required="" value="<?php echo $usr->__GET('email'); ?>" />
		</div>		
		<div class="form-group">						
>>>>>>> Stashed changes
			<label for="usuario">Nombre de usuario:</label>
			<input id="usuario" class="form-control" type="text" name="usuario" placeholder="Usuario" required="" value="<?php echo $usr->__GET('nombreUsuario'); ?>" />
<div id="resultado"></div>
		</div>
		<div class="form-group">
			<label for="pass"> Contraseña</label>
<<<<<<< Updated upstream
			<input id="pass" class="form-control" type="password" name="pass" placeholder="" required="" />
		</div>
		<!--<div class="form-group">
=======
			<input id="pass" class="form-control" type="password" name="pass" placeholder="" required="" value="<?php echo $usr->__GET('pasw'); ?>" />
		</div>		
		<!--<div class="form-group">				
>>>>>>> Stashed changes
			<label for="confirmPass">Confirmar Contraseña</label>
			<input id="confirmPass" class="form-control"  type="password" name="confirmPass" placeholder="" required="" />
		</div>-->
		<div class="form-group">
			<label for="fechaNac">Fecha de Nacimiento</label>
<<<<<<< Updated upstream
			<input id="fechaNac" class="form-control" type="date" name="fechaNac" required="" />
		</div>
		<div class="form-group">
			<label for="nroTarjeta">N° de Tarjeta</label>
			<input id="nroTarjeta" class="form-control"  type="text" name="nroTarjeta" placeholder="XXXX-XXXX-XXXX-XXXX" required="" />
=======
			<input id="fechaNac" class="form-control" type="date" name="fechaNac" required="" value="<?php echo $usr->__GET('fecha_nac'); ?>" />
		</div>		
		<div class="form-group">				
			<label for="nroTarjeta">N° de Tarjeta</label>
			<input id="nroTarjeta" class="form-control"  type="text" name="nroTarjeta" placeholder="1111-2222-3333-4444" required="" value="<?php echo $usr->__GET('nro_tarjeta'); ?>" />
>>>>>>> Stashed changes
		</div>
		<input id="submit" type="submit" name="submit" value="Enviar" />
	</form>
</section>
<div style="clear:both;"> </div>

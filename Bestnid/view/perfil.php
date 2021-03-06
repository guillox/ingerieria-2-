<div class="titulo-AM">
	<h2>
		Perfil del Usuario
	</h2>
</div>
<script src="view/js/utils.js"></script>

<?php 

		//$perfil=$this->model->obtenerPorID($_SESSION['idUser']);
		//$pf=new SubastaModel();
		//$perfil=$pf->obtenerPorID($_SESSION['idUser']);		
		//print_r($pf);
		?>

<section id="formulario">
	<form action="?c=usuario&a=actualizar" method="post" class="form-horizontal" onsubmit="return validarNuevoUsuario();">		
		<?php 
		if(isset($_REQUEST['usr'])) {
			$usr=$_REQUEST['usr'];		
		}else {
			$usr=	$this->model->obtenerPorID($_SESSION['idUser']);
		}
		if(isset($error)) {?>				
		<div class="alert alert-warning mensaje-op" role="alert">
			<span><p><span class="resaltado"><?php echo "'".$error."'</span> ya se encuentra registrado en el sistema";?></p></span>		
		</div>		
		<?php }
		if(isset($error1)) {?>				
		<div class="alert alert-danger mensaje-op" role="alert">
			<span><p><span class="resaltado"><?php echo "'".$error1."'</span>";?></p></span>		
		</div>		
		<?php }
		if(isset($exito)) { ?>
		<div class="alert alert-success mensaje-op" role="alert">
			<span><p><?php echo $exito; ?></p></span>		
			<p>Vuelva a iniciar sesión para notar los cambios</p>		
		</div>
		<?php }
			echo '<input type="hidden" name="usuarioID" value="'.$_SESSION['idUser'].'"/>'	;		
		 ?>
		
		<div class="form-group">		
			<label for="nombre">Nombre:</label>
			<input id="nombre" class="form-control" type="text" name="nombre" placeholder="Nombre" required="" value="<?php echo $usr->__GET('nombre'); ?>" />
		</div>
		<div class="form-group">						
			<label for="nombre">Apellido:</label>
			<input id="apellido" class="form-control" type="text" name="apellido" placeholder="Apellido" required="" value="<?php echo $usr->__GET('apellido'); ?>" />
		</div>		
		<div class="form-group">				
			<label for="email">Email:</label>
			<input id="email" class="form-control" type="email" name="email" placeholder="ejemplo@correo.com" required="" value="<?php echo $usr->__GET('email'); ?>"  />
		</div>		
		<div class="form-group">						
			<label for="usuario">Nombre de usuario:</label>
			<input id="usuario" class="form-control" type="text" name="usuario" placeholder="Usuario" required="" value="<?php echo $usr->__GET('nombreUsuario'); ?>" disabled />
<div id="resultado"></div>
		</div>		
	<!--	<div class="form-group">				
			<label for="pass"> Contraseña</label>
			<input id="pass" class="form-control" type="password" name="pass" placeholder="" required="" value="<?php echo $usr->__GET('pasw'); ?>" />
		</div>		
		<div class="form-group">				
			<label for="confirmPass">Confirmar Contraseña</label>
			<input id="confirmPass" class="form-control"  type="password" name="confirmPass" placeholder="" required="" />
		</div>-->		
		<div class="form-group">				
			<label for="fechaNac">Fecha de Nacimiento</label>
			<input id="fechaNac" class="form-control" type="date" name="fechaNac" required="" value="<?php echo $usr->__GET('fecha_nac'); ?>" />
		</div>		
		<div class="form-group">				
			<label for="nroTarjeta">N° de Tarjeta</label>
			<input id="nroTarjeta" class="form-control"  type="text" name="nroTarjeta" placeholder="1111-2222-3333-4444" required="" value="<?php echo $usr->__GET('nro_tarjeta'); ?>" />
		</div>
		<input id="submit" type="submit" name="submit" class="btn btn-primary act-btn" value="Actualizar" />
	</form>
</section>
<section class="secDarBaja">
	<div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingTwo">
      <h4 class="panel-title">
        <a class="collapsed btn btn-warning act-btn" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
          DARME DE BAJA DEL SISTEMA
        </a>
      </h4>
    </div>
    <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
      <div class="panel-body alert alert-warning mensaje-op" role="alert">
			<p>¿Esta seguro que desea darse de baja? Al seguir adelante con esta desicion tenga en cuenta que no podra volver a 
			ofertar por una subasta ni publicar un producto para subastar.</p><br /><br />
			<a class="btn btn-danger act-btn" href="?c=usuario&a=darDeBaja&id=<?php echo $_SESSION['idUser']; ?>">ACEPTAR</a>
      </div>
    </div>
  </div>
</section>
<div style="clear:both;"> </div>
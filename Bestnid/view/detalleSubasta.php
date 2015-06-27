<?php
                //recupera la subasta por id y imprimirlo
/*---------------detalle es un obj de clase Subasta (usar gets)-------------------*/
                $detalle=$this->model->obtener($_REQUEST['idActual']);
            ?>
<div class="titulo-AM">
	<h2>
		Detalles del Producto
	</h2>
</div>
<div class="content-detalle">
		<h2><?php echo $detalle->__GET('nombre'); ?></h2>
	<section class="content-img">
		<img src="<?php echo $detalle->__GET('imagen'); ?> " alt="">
	</section>
	<section class="content-datos">
		<p><span class="resaltado">Propietario:</span><?php
		$UM=new UsuarioModel();
		$user=$UM->obtenerPorID($detalle->__GET('usuarioID'));
		echo " ".$user->__GET('nombre');		
		?> </p>
		<p><span class="resaltado">Fecha de finalización:</span><?php echo " ".$detalle->__GET('fecha_fin'); ?></p>
		<input type="button" class="btn btn-success" value="Ofertar" />
	</section>
	<section class="content-desc">
		<p><?php echo $detalle->__GET('descripcion');?></p>
	</section>
</div>
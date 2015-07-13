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
		<p><span class="resaltado">Fecha de finalización:</span><?php 
		$date = date_create($detalle->__GET('fecha_fin'));    		
		echo " ".date_format($date, 'd-m-Y ');?></p>
		<?php if(isset($_SESSION['idUser'])) { ?>
<button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Ofertar</button>
<!-- Comienzo del Lightbox -->		
		<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">Completa para ofertar</h4>
      </div>
      <div class="modal-body">
        <form enctype="multipart/form-data" action="?c=ofertas&a=insertarOferta" method="post">
        		<?php
				echo '<input type="hidden" name="usuarioID" value="'.$_SESSION['idUser'].'"/>'	;
				echo '<input type="hidden" name="idSubasta" value="'.$detalle->__GET('id').'"/>'	;
				?>	
          <div class="form-group">
            <label for="recipient-name" class="control-label">Precio:</label>
            <input type="number" class="min-textbox form-control"  name="precio" id="recipient-name" value="1" required="">
          </div>
          <div class="form-group">
            <label for="message-text" class="control-label">Necesidad:</label>
            <textarea class="form-control" id="message-text" name="necesidad" rows="7" required=""></textarea>
          </div>
          <div class="modal-footer">
				<input type="submit" class="btn btn-primary" value="Aceptar" width="100%" />          
          </div>
        </form>
      </div>
      <!-- <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div> -->
    </div>
  </div>
</div>
	<?php } ?>
<!-- Fin del Lightbox -->		
	</section>
	<section class="content-desc">
		<p><?php echo $detalle->__GET('descripcion');?></p>
	</section>
</div>
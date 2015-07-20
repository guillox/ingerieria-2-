<?php require_once 'model/categoria.entidad.php';
require_once 'model/categoria.model.php';?>
<div class="titulo-AM">
	<h2><?php
			if($sub->id >0) {
				echo "MODIFICAR SUBASTA";			
			} else {
				echo "INGRESAR NUEVA SUBASTA";			
			}
		?>	
	</h2>
</div>
<script src="view/js/utils.js"></script>
<section id="formulario">
	<form enctype="multipart/form-data" action="?c=subasta&a=<?php echo $sub->id > 0 ? 'modificarSubasta' : 'insertarSubasta'; ?>" method="post" class="form-horizontal" onsubmit="return ;">
		<?php
		echo '<input type="hidden" name="usuarioID" value="'.$_SESSION['idUser'].'"/>'	;
		echo '<input type="hidden" name="id" value="'.$sub->id.'"/>'	;
		?>	
		<div class="form-group">		
			<label for="nombre">Nombre:</label>
			<input id="nombre" class="form-control" type="text" name="nombre" placeholder="Nombre" value="<?php echo $sub->__GET('nombre'); ?>" required="" />
		</div>
		<div class="form-group">						
			<label for="imagen">Imagen:</label>
			<input id="imagen" class="btn-default" type="file" name="imagen" placeholder="" required="" />
		</div>		
		<div class="form-group">
			<label for="categoria">Categoria:</label>
			<select class="form-control" id="categoria" name="categoria">
			  <?php 
						$categoria=new CategoriaModel();			  
			  			foreach($categoria->listarAll() as $r): ?>
			  			<option value="<?php echo $r->__GET('id') ?>" <?php echo $sub->__GET('categoriaID')==$r->__GET('id') ? 'selected':''; ?>><?php echo $r->__GET('nombre') ?></option>
				 	<?php endforeach; ?>
			</select>		
		</div>
		
		<div class="form-group">				
			<label for="fechaFin">Duración:</label>
			<?php 
				function dias_transcurridos($fecha_i,$fecha_f)
				{
					$dias	= (strtotime($fecha_i)-strtotime($fecha_f))/86400;
					$dias 	= abs($dias); $dias = floor($dias);		
					return $dias;
				}			
			?>
			<input type="number" class="form-control" min="15" max="30" name="duracion" value="<?php echo dias_transcurridos($sub->__GET('fecha_inicio'),$sub->__GET('fecha_fin'))== 0 ? 15 : dias_transcurridos($sub->__GET('fecha_inicio'),$sub->__GET('fecha_fin')) ; ?>" />
			<!-- <select class="form-control" id="duracion" name="duracion">
				<option value ="15" <?php echo dias_transcurridos($sub->__GET('fecha_inicio'),$sub->__GET('fecha_fin')) == 15 ? 'selected' : ''; ?>>15 Días</option>
				<option value ="30" <?php echo dias_transcurridos($sub->__GET('fecha_inicio'),$sub->__GET('fecha_fin')) == 30 ? 'selected' : ''; ?>>30 Días</option>
			</select> -->
		</div>
		<div class="form-group">				
			<label for="descripcion">Descripcion:</label><br/>
			<textarea id="descripcion" class="form-control" name="descripcion" placeholder="Escriba una breve descripcion del Producto" rows="8" cols="65"> <?php echo $sub->__GET('descripcion'); ?></textarea>
		</div>
		<input id="submit" class="btn btn-default" type="submit" name="submit" value="Enviar" />
	</form>
</section>
<div style="clear:both;"> </div>
<div class="pure-g">
    <div class="pure-u-1-12">
        
        <br /><br />

        <table class="table table-striped">
            <thead>
                <tr>
                    <th style="text-align:left;">Nombre</th>
                    <th style="text-align:left;">Fecha de Inicio</th>
                    <th style="text-align:left;">Fecha de Finalizacion</th>
                    <th style="text-align:left;">Fecha Oferta</th> 
							<th style="text-align:left;">Necesidad</th> 
                    <th style="text-align:left;"> Monto</th>
      					<th></th>
                </tr>
            </thead>
            <?php 
            	$hSubasta=new SubastaModel();
            	$ofActivas=new OfertasModel();
            	foreach($ofActivas->getOfertasActivas($_SESSION['idUser']) as $r): ?>
                <tr>
                	<?php $sb=$hSubasta->obtener($r->__GET('subastaID'));?>
                    <td><?php echo  "<a href='?c=subasta&a=logDetalleSubasta&idActual=".$sb->__GET('id')."'>". $sb->__GET('nombre'). "</a>"; ?></td>
                    <td><?php echo $sb->__GET('fecha_inicio'); ?></td>
                    <td><?php echo $sb->__GET('fecha_fin'); ?></td>
<!--                     <td><?php echo $r->__GET('FechaNacimiento'); ?></td> -->
                    <td><?php echo $r->__GET('fecha')?></td>
                    <td>VER</td>
                    <td> 
								<form action="?c=ofertas&a=cambiarMonto&idOF=<?php echo $r->__GET('id') ?>" method="post">
									<?php 
										$hoy=date('Y').'-'.date('m').'-'.date('d');										
									?>									
									<input type="number" width="8" name="monto" min="0" value="<?php echo $r->__GET('monto') ?>" <?php echo $sb->fecha_fin < $hoy ? 'disabled' : '' ?>>
									<input type="submit" value="Cambiar" >								
								</form>		                  	
                    </td>
                    <td><a href="?c=ofertas&a=eliminarOferta&id=<?php echo $r->id; ?>"  onclick="return confirm('¿Está seguro que desea Eliminar está Oferta?');">Eliminar</a></td> 
                </tr>
            <?php endforeach; ?>
        </table>     

    </div>
</div>
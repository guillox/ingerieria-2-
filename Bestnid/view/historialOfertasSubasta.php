<script src="view/js/utils.js"></script>
<div class="pure-g">
    <div class="pure-u-1-12">
        
        <br /><br />
<?php 
            	$hSubasta=new SubastaModel();
            	foreach($hSubasta->listarHS($_SESSION['idUser']) as $r):
            	$hOfertas=new OfertasModel(); 
            	if($oferta->ofertaXIdSubasta($r->__GET('id'))) {?>
        <table class="table table-striped tablaHOfertas">
        		<caption><?php echo $r->__GET('nombre'); ?></caption>
            <thead>
                <tr>
                    <th class="colOfertas-necesidad" style="text-align:left;">Necesidad</th>
                    <th style="text-align:left;">Fecha</th>
                    <th></th>
                </tr>
            </thead>
            	<?php 
            		foreach($hOfertas->listarIDS($r->__GET('id')) as $o):
            	?>
                <tr>
                    <td class="colOfertas-necesidad"><a href="#" onclick="MostrarOcultar('<?php echo $o->__GET('necesidad'); ?>')"data-toggle="modal" data-target="#necesidadCompleto"><?php echo substr($o->__GET('necesidad'), 0, 60)."..."; ?></a></td>
                    <div class="modal fade necesidadCompleto" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" id="necesidadCompleto">
                     <div class="modal-dialog modal-sm">
						    <div class="modal-content" id="necesidad-Completo"></h4>
						    </div>
						  </div>
						</div>
                    <td><?php echo $o->__GET('fecha'); ?></td>
                   <td>
						<?php
							$date1 = new DateTime("now");
							$date2 = new DateTime($r->__GET('fecha_fin'));
	                  if(!($date1<=$date2)) {
						?> 
                   <a href="?c=historialVenta&a=elegirGanador&idO=<?php echo $o->__GET('id'); ?>&idS=<?php echo $r->__GET('id'); ?>" class="btn btn-danger" role="button"> ELEGIR </a> 
                   <?php }else { ?>
                   <a href="#" class="btn btn-danger disabled" role="button"> ELEGIR </a> 	
							<?php } ?>                   
                   </td>
                </tr>
           	 <?php endforeach; ?>
        </table>  
        <hr />
        <hr />
        <?php } ?>   
 <?php endforeach; ?>
    </div>
</div>
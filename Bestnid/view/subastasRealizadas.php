<script src="view/js/utils.js"></script>
<div class="pure-g">
    <div class="pure-u-1-12">
        
        <br /><br />

        <table class="table table-striped">
            <thead>
                <tr>
                    <th style="text-align:left;">Nombre</th>
                    <th style="text-align:left;">Fecha Inicio</th>
                    <th style="text-align:left;">Fecha Fin</th>
		              <th style="text-align:left;">Ganador</th> 
		              <th style="text-align:left;">Monto</th> 
                </tr>
            </thead>
            <?php            	
            	$sm=new SubastaModel();
            	$ofm=new OfertasModel();
            	$hv=new HistorialVentaModel();
					$us=new UsuarioModel();
            	foreach($hv->listarIDUS($_SESSION['idUser']) as $r): ?>
                <tr>
                	
                    <td><?php 
									$sub=$sm->obtener($r->__GET('subastaID'));				                    
                    			echo 	"<a href='?c=subasta&a=detalleGeneral&idActual=".$sub->__GET('id')."'>".$sub->__GET('nombre'); ?></td>
                    <td><?php	echo $sub->__GET('fecha_inicio'); ?></td>
                    <td><?php echo $sub->__GET('fecha_fin'); ?></td>
                    <td>
                    	<?php 
                    		 $of=$ofm->obtenerOF($r->__GET('ofertaID'));    
								$usr=$us->obtenerPorID($of->__GET('usuarioID'));
								echo '<input type="hidden" id="nombre" value="'.$usr->__GET('nombreUsuario').'"/>'	;
							 ?>   
								<a href="#" onclick="MostrarOcultar2('<?php echo $usr->__GET('email'); ?>')"data-toggle="modal" data-target="#necesidadCompleto">    VER</a>            	
                    	
                    	</td>
                    	<div class="modal fade necesidadCompleto" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" id="necesidadCompleto">
                     <div class="modal-dialog modal-sm">
						    <div class="modal-content" id="necesidad-Completo"></h4>
						    </div>
						  </div>
						</div>
                    <td>
                    		<?php

                    			echo "$".$of->__GET('monto');
                        ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>     

    </div>
</div>
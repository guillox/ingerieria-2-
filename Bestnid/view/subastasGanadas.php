<script src="view/js/utils.js"></script>
<div class="pure-g">
    <div class="pure-u-1-12">
        
        <br /><br />

        <table class="table table-striped">
            <thead>
                <tr>
                    <th style="text-align:left;">Nombre</th>
                    <th style="text-align:left;">Fecha Oferta</th>
                    <th style="text-align:left;">Necesidad</th>
		              <th style="text-align:left;">Monto</th> 
		              <th style="text-align:left;">Contacto</th> 
                </tr>
            </thead>
            <?php            	
            	$sm=new SubastaModel();
            	$ofm=new OfertasModel();
            	$hv=new HistorialVentaModel();
					$us=new UsuarioModel();
            	foreach($hv->listarIDU($_SESSION['idUser']) as $r): ?>
                <tr>
                	
                    <td><?php 
									$sub=$sm->obtener($r->__GET('subastaID'));				                    
                    echo 	"<a href='?c=subasta&a=detalleGeneral&idActual=".$sub->__GET('id')."'>".$sub->__GET('nombre'); ?></td>
                    <td><?php 
									$of=$ofm->obtenerOF($r->__GET('ofertaID'));      
									$date = date_create($of->__GET('fecha'));    		
									echo date_format($date, 'd-m-Y ');  ?></td>
                    <td><?php echo $of->__GET('necesidad'); ?></td>
                    <td>
                    		<?php
                    			echo "$".$of->__GET('monto');
                        ?>
                    </td>
                    <td>
                    	<?php 
								$usr=$us->obtenerPorID($sub->__GET('usuarioID')); 
								echo '<input type="hidden" id="nombre" value="'.$usr->__GET('nombre').'_'.$usr->__GET('apellido').'"/>'	;                   	
                    	?>
							 <a href="#" onclick="MostrarOcultar3('<?php echo $usr->__GET('email'); ?> ')" data-toggle="modal" data-target="#datosContacto">VER</a></td>
                    <div class="modal fade necesidadCompleto" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" id="necesidadCompleto">
                     <div class="modal-dialog modal-sm">
						    <div class="modal-content" id="necesidad-Completo"></h4>
						    </div>
						  </div>
						</div>
						
						
                </tr>
            <?php endforeach; ?>
        </table>     

    </div>
</div>
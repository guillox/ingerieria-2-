<?php //require_once 'controller/notificaciones.controller.php';
    /*conseguir mis ofertas*/
    $not =new OfertasController();
$listadoNoGanado= $not->ofertasNogandas($_SESSION['idUser']);

//require_once 'model/subasta.model.php';
$subasta= new SubastaModel();
$ca= new CategoriaModel();
//require_once 'model/usuarios.model.php';
$pro= new UsuarioModel();?>
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
		           <!--    <th style="text-align:left;">Monto</th> 
		              <th style="text-align:left;">Contacto</th> -->
                </tr>
            </thead>
            <?php            	
            	/*$sm=new SubastaModel();
            	$ofm=new OfertasModel();
            	$hv=new HistorialVentaModel();
					$us=new UsuarioModel();
					$us=new UsuarioModel();*/
            foreach($listadoNoGanado as $r): 
             $s=$subasta->obtener($r->__GET('subastaID'));
                    if( $s->__GET('fecha_fin') <= date("Y-m-d")){   ?>   
                <tr>
                	
                    <td><?php echo "<a href='?c=subasta&a=detalleGeneral&idActual=".$r->__GET('id')."'>".$s->__GET('nombre')."</a>";
                        ?></td>
                    <td><?php       $date1 = date_create($r->__GET('fecha'));
                                    echo date_format($date1, 'd-m-Y'); ?></td>
                <td><?php echo $r->__GET('necesidad');  ?></td>
                   <!--     <td>
                    		<?php
                    			echo "$".$of->__GET('monto');
                        ?>
                    </td>
                    <td>
                    	<?php 
								$usr=$us->obtenerPorID($sub->__GET('usuarioID'));                    	
                    	?>
							 <a href="#" onclick="MostrarDatos('<?php echo $usr->__GET('nombre')." ".$usr->__GET('apellido'); ?>,<?php echo $usr->__GET('email'); ?>')"data-toggle="modal" data-target="#datosContacto">VER</a></td>
                    <div class="modal fade datosContacto" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" id="datosContacto">
                    	<div class="modal-dialog modal-sm">
						   	<div class="modal-content" id="datosContacto">
						    	</div>
						  	</div>
						</div> -->
                </tr>
            <?php } endforeach; ?>
        </table>     

    </div>
</div>
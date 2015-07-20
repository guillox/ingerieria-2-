<a href="?c=usuario&a=vistaNotificaciones" ><h4>Notificaciones</h4></a>
<?php
    //require_once 'controller/notificaciones.controller.php';
    $not= new  NotificacionesController();
    
    //require_once 'model/usuarios.model.php';
    $pro= new UsuarioModel();
    
    //require_once 'model/subasta.model.php';
    $sub= new SubastaModel();

    $listadoNotificaciones=$not->listarNotificaciones($_SESSION['idUser']);
?>
<div class="pure-g">
<div class="pure-u-1-12">
    
<?php
    if(sizeof($listadoNotificaciones) == 0){
        echo "<h4>No tiene nuevas Notificaciones </h4>";
    }else{

?>
    
 
                <table class="table table-striped">
                        <thead>
                            <tr>
                                <th style="text-align:left;">fecha</th>
                                <th style="text-align:left;">asunto</th>
                                <th style="text-align:left;">subasta</th>
                                <th style="text-align:left;">mensaje</th>

                                <th>marcar</th>
                                <th></th>
                            </tr>
                        </thead>
<?php                   foreach($listadoNotificaciones as $r): ?>
                            <tr>     
                                             
    <?php                   if($r->__GET('leido') == NULL){
    ?> 
                                <th>
                                    <?php       $date1 = date_create($r->__GET('fecha'));
                                    echo date_format($date1, 'd-m-Y'); ?>
                                </th>
                                <th><?php echo $r->__GET('asunto'); ?></th>
                                <th>
                                    <?php
                                    if($r->__GET('subastaID')==NULL){
                                        echo "none";
                                    }else{
                                        $s=$sub->obtener($r->__GET('subastaID'));
                                        if(!$sub->estaInactivo($r->__GET('subastaID'))) {   
                                        echo "<a href='?c=subasta&a=logDetalleSubasta&idActual=".$r->__GET('subastaID')."'>".$s->__GET('nombre')."</a>";
													}else {
														echo "Subasta Eliminada";
													}				                                    
                                    }?>
                                </th>
                                <th><?php echo $r->__GET('mensaje'); ?></td>
                                <th>
                                    <?php 
                                    if($r->__GET('leido') == NULL){
                                        echo "<a href='?c=notificaciones&a=marcarLeido&idNot=".$r->__GET('id')."'>leido</a>";
                                    }?>    
                                </th>
                                <th>
                                    <?php  echo "<a href='?c=notificaciones&a=eliminarNotificacion&idNot=".$r->__GET('id')."'>Eliminar</a>"; ?>
                                </th>                                
        
        
    <?php                  }else{
    ?>                       
                                <td>
                                    <?php       $date1 = date_create($r->__GET('fecha'));
                                    echo date_format($date1, 'd-m-Y'); ?>
                                </td>
                                <td><?php echo $r->__GET('asunto'); ?></td>
                                <td>
                                    <?php
                                    if($r->__GET('subastaID')==NULL){
                                        echo "none";
                                    }else{
                                        $s=$sub->obtener($r->__GET('subastaID'));  
                                        if(!$sub->estaInactivo($r->__GET('subastaID'))) {   
                                        echo "<a href='?c=subasta&a=logDetalleSubasta&idActual=".$r->__GET('subastaID')."'>".$s->__GET('nombre')."</a>";
                                    }else {
														echo "Subasta Eliminada";
													}		
                                    }?>
                                </td>
                                <td><?php echo $r->__GET('mensaje'); ?></td>
                                <td>
                                    <?php 
                                    if($r->__GET('leido') == NULL){
                                        echo "<a href='?c=notificaciones&a=marcarLeido&idNot=".$r->__GET('id')."'>leido</a>";
                                    }?>    
                                </td>
                                <td>
                                    <?php  echo "<a href='?c=notificaciones&a=eliminarNotificacion&idNot=".$r->__GET('id')."'>Eliminar</a>"; ?>
                                </td>
    <?php                  }
    ?>        
                            </tr>
            
    <?php               endforeach; ?>
            
                </table>

<?php  } ?>  

    
</div>
</div>
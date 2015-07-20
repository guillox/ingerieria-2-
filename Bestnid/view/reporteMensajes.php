<a href="?c=usuario&a=vistaMensajes" ><h4>Mensajes</h4></a>
<?php
    //require_once 'controller/notificaciones.controller.php';
    $not= new  NotificacionesController();
    
    //require_once 'model/usuarios.model.php';
    $pro= new UsuarioModel();
    
    //require_once 'model/subasta.model.php';
    $sub= new SubastaModel();

    $listadoNotificaciones=$not->listarMensajesAdmin();
?>

<div class="pure-g">
<div class="pure-u-1-12">
    
    <?php 
        if(isset($_REQUEST['mje'])){ //control carteles 
            echo " <br>el usuario o mail ingresado no son validos <br>"; 
        }
        if( isset($_REQUEST['notifi']) ){ 
           echo $_REQUEST['notifi'];
        }
    ?> 
    
    
    
    <form action="?c=notificaciones&a=insertarRespuestaAdmin" method="post">
        <input type="hidden" name="emisor" value="<?php echo $_SESSION['idUser'];?>">
        para:
        <input name="receptor" placeholder="ingrese usuario o E-mail" required=""  <?php if(isset($_REQUEST['mje'])){ echo 'value="'.$_REQUEST['receptor'].'"'; } ?> >
        <br>mensaje
       <textarea type="text" name="mesaje" placeholder="ingrese su respuesta" required=""><?php  if(isset($_REQUEST['mje'])){ echo $_REQUEST['mje'];} ?></textarea>
        <br>
        <input type="submit">
    </form>
    
<?php
    if(sizeof($listadoNotificaciones) == 0){
        echo "<h4>No tiene nuevas Mensajes </h4>";
    }else{

?>    
                <table class="table table-striped">
                        <thead>
                            <tr>
                                <th style="text-align:left;">fecha</th>
                                <th style="text-align:left;">emisor</th>
                                <th style="text-align:left;">E-mail</th>
                                <th style="text-align:left;">asunto</th>
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
                                <th>
                                    <?php $h=$pro->obtenerPorID($r->__GET('emisorID'));
                                    echo $h->__GET('nombreUsuario');     ?>
                                </th>
                                <th><?php echo $h->__GET('email');  ?> </th>
                                <th><?php echo $r->__GET('asunto'); ?></th>
                                <th><?php echo $r->__GET('mensaje'); ?></th>
                                <th>
                                    <?php 
                                    if($r->__GET('leido') == NULL){
                                        echo "<a href='?c=notificaciones&a=marcarLeidoAdmin&idNot=".$r->__GET('id')."'>leido</a>";
                                    }?>         
                                </th>
                                <th>
                                    <?php  echo "<a href='?c=notificaciones&a=eliminarNotificacionAdmin&idNot=".$r->__GET('id')."'>Eliminar</a>"; ?>
                                </th>
    <?php                   }else{
    ?>
                                 <td>
                                        <?php       $date1 = date_create($r->__GET('fecha'));
                                        echo date_format($date1, 'd-m-Y'); ?>
                                </td>
                                <td>
                                    <?php $h=$pro->obtenerPorID($r->__GET('emisorID'));
                                    echo $h->__GET('nombreUsuario');     ?>
                                </td>
                                <td><?php echo $h->__GET('email');  ?> </td>
                                <td><?php echo $r->__GET('asunto'); ?></td>
                                <td><?php echo $r->__GET('mensaje'); ?></td>
                                <td>
                                    <?php 
                                    if($r->__GET('leido') == NULL){
                                        echo "<a href='?c=notificaciones&a=marcarLeidoAdmin&idNot=".$r->__GET('id')."'>leido</a>";
                                    }?>         
                                </td>
                                <td>
                                    <?php  echo "<a href='?c=notificaciones&a=eliminarNotificacionAdmin&idNot=".$r->__GET('id')."'>Eliminar</a>"; ?>
                                </td>
                           
    <?php                  }
    ?>
                        </tr>
                    
    <?php               endforeach; ?>
                </table>

<?php  } ?>  
    
</div></div>
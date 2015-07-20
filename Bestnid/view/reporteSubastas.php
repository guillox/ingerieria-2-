<h4>Altas Subastas</h4>
<?php
//require_once 'model/subasta.model.php';
$subasta= new SubastaModel();
$ca= new CategoriaModel();
//require_once 'model/usuarios.model.php';
$pro= new UsuarioModel();
?>
<div class="pure-g">
    <div class="pure-u-1-12">
        <!-- si el controlador lla a otro accion cambia de pestaña automaticamente-->
        <form action="?c=usuario&a=rangoSubastas" method="post">
            Fecha inicio
            <input type="date" name="inicio" <?php  if(isset($control1)){ echo 'value="'.$_POST['inicio'].'"';} ?> >
            Fecha fin
            <input type="date" name="fin" <?php  if(isset($control1)){ echo 'value="'.$_POST['fin'].'"';} ?> >
            <input type="submit" >
        </form>
        
        <br /><br />
<?php   
        if(isset($control1)){ /*se iso una consulta*/
            
            if($control1 == 1){
                $date1 = date_create($_POST['inicio']);
                $date2 = date_create($_POST['fin']);
                echo "<p>Resultado para ".date_format($date1, 'd-m-Y')."  entre ".date_format($date2, 'd-m-Y')."</p>";


                $listadoSubastas=$subasta->listarReportFechas($_POST['inicio'],$_POST['fin']);
                 if(sizeof($listadoSubastas) == 0){

                    echo "<h4> nose Encontro Resultado</h4>";
                 }else{
?>            
        
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th style="text-align:left;">Nombre</th>
                                <th style="text-align:left;">propietario</th>
                                <th style="text-align:left;">fecha alta</th>
                                <th style="text-align:left;">categoria</th>

                                <th></th>
                                <th></th>
                            </tr>
                        </thead>

     <?php               foreach($listadoSubastas as $r): ?>                    
                            <tr>
                                <td><?php $s=$subasta->obtener($r->__GET('id'));   
                                    echo "<a href='?c=subasta&a=logDetalleSubasta&idActual=".$r->__GET('id')."'>".$s->__GET('nombre')."</a>";
                                ?></td>
                                <td><?php $h=$pro->obtenerPorID($r->__GET('usuarioID'));
                                    echo $h->__GET('nombreUsuario');     ?></td>
                                <td><?php       $date1 = date_create($r->__GET('fecha_inicio'));
                                    echo date_format($date1, 'd-m-Y'); ?></td>
                                <td><?php $i=$ca->obtenerPorID($r->__GET('categoriaID'));

                                    
                                    echo $i->__GET('nombre'); ?></td>
                                

                               	<td><a href="?c=subasta&a=eliminarSubastaAdmin&id=<?php echo $r->id; ?>"  onclick="return confirm('¿Está seguro que desea Eliminar está Subasta?');">Eliminar</a></td> 
                            </tr>        
    <?php               endforeach; ?>                                         

                    </table>
                
 <?php            
                }    
            }else{
                echo $control1;
            }
        }else{
            
            $listadoSubastas=$subasta->listarReport();
            
?>           
            <h4>Todas las subastas </h4>
        
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th style="text-align:left;">Nombre</th>
                            <th style="text-align:left;">propietario</th>
                            <th style="text-align:left;">fecha alta</th>
                            <th style="text-align:left;">categoria</th>

                            <th></th>
                            <th></th>
                        </tr>
                    </thead>

<?php               foreach($listadoSubastas as $r): ?>                    
                        <tr>
                            <td><?php $s=$subasta->obtener($r->__GET('id'));   
                                    echo "<a href='?c=subasta&a=logDetalleSubasta&idActual=".$r->__GET('id')."'>".$s->__GET('nombre')."</a>";
                                ?></td>

                            <td><?php $h=$pro->obtenerPorID($r->__GET('usuarioID'));
                                    echo $h->__GET('nombreUsuario');     ?></td>

                            <td><?php       $date1 = date_create($r->__GET('fecha_inicio'));
                                 echo date_format($date1, 'd-m-Y'); ?></td>

                            <td>
                             <?php $i=$ca->obtenerPorID($r->__GET('categoriaID'));

                                    
                                    echo $i->__GET('nombre');   ?></td>
                            

                               	<td><a href="?c=subasta&a=eliminarSubastaAdmin&id=<?php echo $r->id; ?>"  onclick="return confirm('¿Está seguro que desea Eliminar está Subasta?');">Eliminar</a></td> 
                        </tr>        
<?php               endforeach; ?>
                </table>

<?php        }      
?>    
    </div>
</div>
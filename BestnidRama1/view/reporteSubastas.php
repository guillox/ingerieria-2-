<h4>Altas Subastas</h4>

<div class="pure-g">
    <div class="pure-u-1-12">
        <!-- si el controlador lla a otro accion cambia de pestaña automaticamente-->
        <form action="?c=usuario&a=rangoSubastas" method="post">
            Fecha inicio
            <input type="date" name="inicio">
            Fecha fin
            <input type="date" name="fin" >
            <input type="submit" >
        </form>
        
        <br /><br />
<?php   
        if(isset($control)){ /*se iso una consulta*/
            
            if($control == 1){
                $date1 = date_create($_POST['inicio']);
                $date2 = date_create($_POST['fin']);
                echo "<p>Resultado para ".date_format($date1, 'd-m-Y')."  entre ".date_format($date2, 'd-m-Y')."</p>";
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
                    
                    
                    
                    <!-- for each-->
                    <tr>


                    </tr>        

                </table>
                
 <?php                 
            }else{
                echo $control;
            }
        }else{
            require_once 'model/subasta.model.php';
            $subasta= new SubastaModel();
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
                            <th><?php echo $r->__GET('nombre'); ?></th>
                            <th><?php echo "falta"; ?></th>
                            <th><?php echo $r->__GET('fecha_inicio'); ?></th>
                            <th><?php echo "falta"; ?></th>
                            
                            <th><?php echo "<a href='?c=subasta&a=logDetalleSubasta&idActual=".$r->__GET('id')."'>Detalle</a>"; ?></th>
                            <th><a href="#">Eliminar</a></th>
                        </tr>        
<?php               endforeach; ?>
                </table>

<?php        }      
?>    
    </div>
</div>
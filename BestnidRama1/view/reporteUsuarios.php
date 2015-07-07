<h4>Altas Usuarios</h4>

<div class="pure-g">
    <div class="pure-u-1-12">
        <!-- si el controlador lla a otro accion cambia de pestaña automaticamente-->
        <form action="?c=usuario&a=rangoUsuarios" method="post">
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
                /*llamar a la consulta y revisar que la respuesta no sea cero*/
?>              
                
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th style="text-align:left;">User</th>
                            <th style="text-align:left;">Nombre</th>
                            <th style="text-align:left;">Apellido</th>
                            <th style="text-align:left;">mail</th>
                            <th style="text-align:left;">fecha Registro</th>

                            <th></th>
                            <th></th>
                        </tr>
                    </thead>






                </table>
                
 <?php                 
            }else{
                echo $control;
            }
        }else{
            /*LLAMA A LA CONSULA MYSQL*/
            $listadoUsuarios=$this->model->listar(); 
?>
            <h4>Todos los Usuarios</h4>    
        
            <table class="table table-striped">
                    <thead>
                        <tr>
                            <th style="text-align:left;">User</th>
                            <th style="text-align:left;">Nombre</th>
                            <th style="text-align:left;">Apellido</th>
                            <th style="text-align:left;">mail</th>
                            <th style="text-align:left;">fecha Registro</th>

                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
<?php               foreach($listadoUsuarios as $r): ?>
                        <tr>
                            <th><?php echo $r->__GET('nombreUsuario') ?></th>
                            <th><?php echo $r->__GET('nombre') ?></th>
                            <th><?php echo $r->__GET('apellido')?></th>
                            <th><?php echo $r->__GET('email') ?></th>
                            <th>
                    <?php       $date1 = date_create($r->__GET('fecha_registro'));
                                 echo date_format($date1, 'd-m-Y'); ?>
                            </th>
                            <th><a href="#">Detalles</a></th>
                            <th><a href="#">Eliminar</a></th>
                        </tr>
<?php               endforeach; ?>
            </table>
      
<?php   }      
?>      
    </div>
</div>
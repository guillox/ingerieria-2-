<div class="pure-g">
    <div class="pure-u-1-12">
        
        <br /><br />

        <table class="table table-striped">
            <thead>
                <tr>
                    <th style="text-align:left;">Nombre</th>
                    <th style="text-align:left;">Fecha de Inicio</th>
                    <th style="text-align:left;">Fecha de Finalizacion</th>
<!--                     <th style="text-align:left;"></th> -->
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <?php 
            	$hSubasta=new SubastaModel();
            	foreach($hSubasta->listarHS($_SESSION['idUser']) as $r): ?>
                <tr>
                    <td><?php echo $r->__GET('nombre'); ?></td>
                    <td><?php echo $r->__GET('fecha_inicio'); ?></td>
                    <td><?php echo $r->__GET('fecha_fin'); ?></td>
<!--                     <td><?php echo $r->__GET('FechaNacimiento'); ?></td> -->
                    <td>
                        <a href="?c=subasta&a=vistaNuevaSubasta&id=<?php echo $r->id; ?>">Editar</a>
                    </td>
                    <td>
                        <a href="?c=subasta&a=eliminarSubasta&id=<?php echo $r->id; ?>"  onclick="return confirm('¿Está seguro que desea Eliminar está Subasta?');">Eliminar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>     

    </div>
</div>
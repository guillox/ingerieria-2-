
<h3> listado de comentarios</h3>


<?php
        /*recupera la lista de comentarios ----array*/
        $listado=$this->model->listar($idSubasta);
        
        if(sizeof($listado) == 0)
        {
            echo"<p>esta subasta no tiene comentarios</p>";
        }else{
            foreach($listado as $r):
            
  ?>      
      
   			<blockquote>
  				<p><?php echo $r->__GET('pregunta'); ?>  </p>
  					<small>Fecha:<cite title="Fecha_pregunta">"<?php echo $r->__GET('fechaPregunta'); ?>"</cite></small>
				</blockquote>
            
                <?php if ($r->__GET('respuesta') != ''){ ?>
                	<blockquote class="pull-right">
  						<p><?php echo  $r->__GET('respuesta'); ?></p>
  						<small>Fecha:<cite title="Fecha_repuesta">"<?php echo $r->__GET('fechaRespuesta'); ?>" </cite></small>
					</blockquote>
                <?php } ?>
                
					


                
                
                
                
                

                <div id="pregunta">
                </div> 

<?php       endforeach;
        } 
?> 
<link rel="stylesheet" type="text/css" href="view/css/comentarios.css">  
<div class="content-detalle">
    
    
    <h4><br> listado de comentarios</h4>

    <?php
            /*recupera la lista de comentarios ----array*/
            $listado=$this->model->listar($idSubasta);

            if(sizeof($listado) == 0)
            {
                echo"<p>esta subasta no tiene comentarios</p>";
            }else{
                foreach($listado as $r):

      ?>         


        <div class="ContenedorComentario">
            <div class="pregunta" > 
                <div class="fecha">
                        <?php    $date = date_create($r->__GET('fechaPregunta'));
                         echo date_format($date, 'd-m-Y   H:i:s');?> 
                </div>
                 <div class="textoPreg">      
                         <?php  echo ">> <b>".$r->__GET('pregunta'); ?> </b>
                </div>
            </div>
<?php               if(!($r->__GET('respuesta') == NULL))
                    { //si hay respuesta imprime fecha y respuesta en DIV con sus id iguales que en la pregunta
           ?>
                        <div class="respuesta">
                                <div id='texto'> <b><?php echo $r->__GET('respuesta');?> </b> </div>
                            
                                <?php    $date = date_create($r->__GET('fechaRespuesta')); ?>
                                <div class="fecha"> <?php echo date_format($date, 'd-m-Y   H:i:s');?></div> 
                        </div>

                        
    
             <?php
                  }
                ?>

        </div>      

    <?php       endforeach;
            } 
    ?> 
</div>


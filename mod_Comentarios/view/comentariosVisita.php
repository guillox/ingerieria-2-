<h3> listado de comentarios</h3>


<?php
        /*recupera la lista de comentarios ----array*/
        $listado=$this->model->listar($idSubasta);
        
        if(sizeof($listado) == 0)
        {
            echo"<p>esta subasta no tiene comentarios</p>";
        }else{
            foreach($listado as $r):
            
                echo "<br>f".$r->__GET('fechaPregunta');
                echo "<br>".$r->__GET('pregunta');
            
                if($r->__GET('respuesta') == NULL){
                    echo "<br>--sin respuesta--";
                }else{

                    echo "<br>f".$r->__GET('fechaRespuesta');
                    echo "<br>Re->".$r->__GET('respuesta');
                }
                
                
                
?>
                <div id="pregunta">
                </div> 

<?php       endforeach;
        } 
?> 
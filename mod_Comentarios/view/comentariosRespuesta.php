<h1>espacio de respuestas subasta propia</h1>

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
                echo "<br> ide del comentario".$r->__GET('id');
            
                echo "->RESPONDER;";/*aqui deberia estar el formulario para responder*/
?>
                

<?php       endforeach;
        } 
?>
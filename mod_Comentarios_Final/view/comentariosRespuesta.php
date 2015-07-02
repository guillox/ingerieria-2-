<link rel="stylesheet" type="text/css" href="view/css/comentarios.css">

<div class="content-detalle">
    <h4>Preguntas Realizadas</h4>
    
<?php
        /*---------------recupera la lista de comentarios --------------array*/
        $listado=$this->model->listar($idSubasta);
        
        if(sizeof($listado) == 0)
        {
            echo"<p>esta subasta no tiene comentarios</p>";
        }else{
            
            $idGenerador=1;
            foreach($listado as $r):    

 ?>
        <div class="ContenedorComentario">
            <div class="pregunta" >    
                <div class="fecha">
                        <?php    $date = date_create($r->__GET('fechaPregunta'));
                        echo date_format($date, 'd-m-Y   H:i:s');?>
                </div>
                <div class="textoPreg">
                        <?php  echo "<b>".$r->__GET('pregunta'); ?> </b>
                 
<?php
                /*------------------FALTA DARLE FORMA A LOS FORMULADRIOS----------------------*/
                if ($r->__GET('respuesta')  == NULL)
                {
?>          
                    <input type="button" class="button white" <?php echo 'id=mostrar'.$idGenerador; ?>   value="Responder">
                
                </div> </div> 

                    <div <?php echo "id=objetivo".$idGenerador;?>>

                        <form action="?c=comentarios&a=insertarRespuesta" method="post">  

                                <input type="hidden" name="idPregunta" value="<?php echo $r->__GET("id"); ?>">
                                <input type="hidden" name="idSubasta" value="<?php echo $idSubasta; ?>">

                                <textarea id="preg"  type="text" name="respuesta" placeholder="ingrese su respuesta" required=""></textarea>

                                <input type="submit" class="button white" value="Enviar Respuesta" id="prev" >
                        </form>
                    </div>

<?php                   
                }else{
                    echo"</div> </div> ";
  ?>
                        <div class="respuesta">
                                <div> <b> <?php echo $r->__GET('respuesta') ?> </b> </div>
                            
                                <?php    $date = date_create($r->__GET('fechaRespuesta')); ?>
                                <div class='fecha'> <?php echo date_format($date, 'd-m-Y   H:i:s');?> </div>
                        </div>
    
<?php 
              }
?>            
                </div>
<?php           
            $idGenerador=$idGenerador +1;
            endforeach;
        }

            /*------------------GENERAR LAS FUNCIONES JAVA ESCRIPT--------------------*/
            echo '<script type="text/javascript" src="/view/js/jquery-1.11.3.min.js"></script>';
            echo '
                <script type="text/javascript">
                    function inicializar(){
                        var x;
                    
            ';
                        /*esconde los divs y genera los receptores de eventos */
                        for($i=1 ; $i <= $idGenerador ; $i++){
                           
                            echo 'x=$("#objetivo'.$i.'");';
                            echo "x.hide();";

                            echo 'x=$("#mostrar'.$i.'");';
                            echo "x.click(muestrame".$i.");";


                        }

            echo "}"; /*termina la funcion inicializar*/

            /* genera las funciones idependientes para ocultar y mostrar (ejecucion de eventos)*/

                        for($k=1 ; $k <= $idGenerador ; $k++){

                                echo "function muestrame".$k."(){";
                                
                                echo"var z;";
                                echo 'z=$("#objetivo'.$k.'");';

                                echo 'z.slideToggle("slow");
                                    }';
                        }

            echo "</script>";
         
?>
</div>
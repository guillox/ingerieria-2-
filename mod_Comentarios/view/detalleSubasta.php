<div class="pure-g">
<div class="pure-u-1-12">

            <h1>    Descricion eh imagen del producto</h1>
    
            <br>
           
            <?php
                //recupera la subasta por id y imprimirlo
/*---------------detalle es un obj de clase Subasta (usar gets)-------------------*/
                $detalle=$this->model->obtener($_REQUEST['idActual']);

                echo "<br><br> <p> nombre:  ".$detalle->__GET('nombre');" </p><br><br>";
                
                echo "<br><br> <p> nombre:  ".$detalle->__GET('imagen');" </p><br><br>";
            ?>
          
    
    
    </div>
    </div>
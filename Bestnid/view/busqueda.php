<div class="pure-g">
    <div class="pure-u-1-12">
     
        <br /><br />
	<div class="info-busqueda"><p class="bg-info">Resultado de búsqueda para&nbsp <?php echo '"'.$_REQUEST['buscar'].'"'; ?><p></div>
        
<div style="clear:both;"> </div>

    
	 <?php 
		$listado=$this->model->listar($_REQUEST['buscar']); 
		if(sizeof($listado) == 0) {
			echo "<h4>'".$_REQUEST['buscar']."' no pudo ser encontrado, quizá escribiste la palabra incorrecta o estás siendo muy específico.
Intentá ampliar tu búsqueda con más palabras.</h4>";
}else {
	 foreach($listado as $r): ?>
	<article >
                <div class="contenArt">
    
                    <h2> <?php
                        if(isset($_SESSION['idUser'])) {
                            echo  "<a href='?c=subasta&a=logDetalleSubasta&idActual=".$r->__GET('id')."'>". $r->__GET('nombre'). "</a>";
                        }else{
                             echo  "<a href='?c=subasta&a=detalleSubasta&idActual=".$r->__GET('id')."'>". $r->__GET('nombre'). "</a>";
                        }
                         ?>
                    </h2>
                    
                    <?php
                        echo "<img src=".$r->__GET('imagen').">"
                    ?>
                    <p><?php echo "Finaliza el día : ".$r->__GET('fecha_fin'); ?></p>

                </div>
            </article>
     
    <?php endforeach;} ?> 
   
<div style="clear:both;"> </div> 

    </div>
</div>
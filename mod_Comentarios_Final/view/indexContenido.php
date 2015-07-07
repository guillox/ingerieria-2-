<?php 
    require_once 'controller/categoria.controller.php';
    $cat= new CategoriaController();
    $listado=$cat->listarUlt();
?>

<link rel="stylesheet" type="text/css" href="view/css/contenedorPr.css">
<section  >  
    
        <div class="pure-g">
        <div class="pure-u-1-12">
            <div class="subasta">
            <div class="lineaAbiso">    
                 <h4>ultimas subasta agregadas</h4>
                </div>    
                <div class="contenedorPrincipal"> 
                    
                    <div style="clear:both;"> </div>
                    
                    
<?php
                    if(sizeof($listado) == 0)
                    {
                        echo"<p>nose encuentran subastas</p>";
                    }else{
                        foreach($listado as $r):
?>
                              
                        <article>
                            <div  class="contenArt">
                            
                                <h2> 
                    <?php
                                    if(isset($_SESSION['idUser'])) {
                                        echo  "<a class='linkSubasta' href='?c=subasta&a=logDetalleSubasta&idActual=".$r->__GET('id')."'>". $r->__GET('nombre'). "</a>";
                                    }else{
                                        echo  "<a class='linkSubasta' href='?c=subasta&a=detalleSubasta&idActual=".$r->__GET('id')."'>". $r->__GET('nombre'). "</a>";
                                    }
                    ?>
                                </h2>

                                <?php
                                echo "<img src=".$r->__GET('imagen').">"
                                ?>
                                 <p><?php 
                                            $date = date_create($r->__GET('fecha_fin'));               
                                        echo "Finaliza el día : ".date_format($date, 'd-m-Y '); ?>
                                </p>    

                            </div>
                        </article>	
                     
                    
    <?php           endforeach;
                    } 
    ?>    
                    
                    <div style="clear:both;"> </div> 

                </div>

            </div>
            </div>
            </div>
  
	</section>
	
	
	<!-- Zona de informacion izquierda -->
	<aside>  

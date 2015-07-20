		<link rel="stylesheet" type="text/css" href="view/css/comentarios.css">
		
		<script type="text/javascript">
			function inicializar(){

				var x=$("#objetivo");
                x.hide();
                x=$("#mostrar");
				x.click(muestrame);             
			}
			function muestrame(){
				var x=$("#objetivo");
				x.slideToggle("slow");
			}

		</script>


<div class="content-detalle">
    
    <h4>Desea realizar alguna preguna!??  <input type="button" class="button white" id="mostrar" value="Preguntar"> </h4>
   
   <script src="view/js/animaciones.js"></script> 

    <div id="objetivo">    
            <form action="?c=comentarios&a=insertarComentario" method="post" >

                <input type="hidden" name="idActual" value="<?php echo $idSubasta; ?>">
                <input type="hidden" name="idUser" value="<?php echo $_SESSION['idUser']; ?>">  

                <textarea id="preg" type="text" name="comentario" value="igrese pregunta" placeholder="Ingrese su Pregunta" required=""></textarea>
               <input type="submit" class="button white" name="preguntar" value="Enviar pregunta" id="prev">
            </form>
    </div>
    
    
</div>





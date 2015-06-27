<div id="preguntar">
    <h3>formulario para hacer la pregunta</h3>
    
   <?php echo "el id de la subasta es".$idSubasta; ?>
    <?php echo "el id del usuario es".$_SESSION['idUser']; ?>
    
 <form action="?c=comentarios&a=insertarComentario" method="post">
        
        <input type="hidden" name="idActual" value="<?php echo $idSubasta; ?>">
        <input type="hidden" name="idUser" value="<?php echo $_SESSION['idUser']; ?>">  
     
        <input type="text" name="comentario" value="igrese pregunta">
        <input type="submit"  value="enviar"  >
    </form>
    
</div>
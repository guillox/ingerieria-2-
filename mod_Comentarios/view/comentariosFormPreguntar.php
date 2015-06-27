<div id="preguntar">
    <h3>formulario para hacer la pregunta</h3>
   
 <!--   <form action="?c=comentarios&a=insertarComentario&idActual=$idSubasta" method="post"> -->
    
    <form action="comentar.php&idSub=$idSubasta&idUsuario=$_SESSION['idUser']" method="post">
        <input type="text" name="comentario" value="igrese pregunta">
        <input type="submit"  value="enviar"  >
    </form>
    
</div>
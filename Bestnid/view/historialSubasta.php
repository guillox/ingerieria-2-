<div class="pure-g">
    <div class="pure-u-1-12">
        
        <br /><br />

        <?php
			
		$conexion=mysql_connect("localhost","root","root");

		if(!$conexion){
    		die("nose pudo realizar la conexion al servidor ".mysql_error());
		}

		//seleccion de base de datos
		if(!mysql_select_db("Bestnid",$conexion)){
    		echo "nose pudo realizar la seleccion de la base de datos<br>";
		}	 	

		$actualID=$_SESSION['idUser'];

		$result = mysql_query("SELECT * FROM subasta WHERE usuarioID = $actualID ");
        
      echo '<div style="clear:both;"> </div> ';
while( $fila= mysql_fetch_array($result)){
    //modelarlo como article
    echo " <article >";
    echo '<div class="contenArt">';
    
        echo"<h2>".$fila['nombre']."</h2>";
        echo "<img src=".$fila['imagen'].">";
        echo"<p>Finaliza el día : ".$fila['fecha_fin']."</p>";
        //FALTA agregarle el link a descripciones    
    echo"</div>";
    echo"</article>";
}       
	//para evitar problemas con la flotacion
echo '<div style="clear:both;"> </div> ';


//cerrar la conexion
mysql_close($conexion);
         ?>    

    </div>
</div>
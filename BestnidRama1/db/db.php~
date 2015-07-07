<?php
function conectar(){
	$pdo=null;	
			
		try
		{
			$pdo = new PDO('mysql:host=localhost;dbname=Bestnid', 'root', 'root');
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);		 
			return $pdo;       
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
}

function cerrarConexion() {
	
}
?>
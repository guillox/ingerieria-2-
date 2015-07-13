<?php

class HistorialVentaModel
{
    //variable de base de datos
	private $pdo;
    
	public function __CONSTRUCT()
	{
		try
		{
            //llama al metodo conectar del archivo de.php
            //y le retorna la coneccion
			$this->pdo=conectar();
				        
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}
	
	public function insertarOferta(HistorialVenta $data) 
	{
		try 
		{
		$sql = "INSERT INTO historial_ventas (subastaID,ofertaID) 
		        VALUES (?, ?)";

		$this->pdo->prepare($sql)
		     ->execute(
			array(
				$data->__GET('subastaID'), 
				$data->__GET('ofertaID'), 
				)
			);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
   		
}
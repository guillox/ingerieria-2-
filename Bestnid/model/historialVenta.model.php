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
	public function obtenerIDS($id) {
   	try
		{

			$stm = $this->pdo->prepare("SELECT * FROM historial_ventas 
												WHERE subastaID=$id ");
			$stm->execute();
			$r = $stm->fetch(PDO::FETCH_OBJ);
			if($r) {
				$hv = new HistorialVenta();
				$hv->__SET('id', $r->historial_ventasID);
				$hv->__SET('subastaID', $r->subastaID);
				$hv->__SET('ofertaID', $r->ofertaID);
				return $hv;
			}else {
			return false;
		}
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}		
   }
   
	public function listarIDU($id) {
   	try
		{
			$result = array();

			$stm = $this->pdo->prepare("SELECT * FROM historial_ventas 
												NATURAL JOIN ofertas as of
													WHERE of.usuarioID=$id ");
			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
			{
				$hv = new HistorialVenta();

				$hv->__SET('id', $r->historial_ventasID);
				$hv->__SET('subastaID', $r->subastaID);
				$hv->__SET('ofertaID', $r->ofertaID);

				$result[] = $hv;
			}

			return $result;
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}		
   }
   
   public function listarIDUS($id) {
   	try
		{
			$result = array();

			$stm = $this->pdo->prepare("SELECT * FROM historial_ventas AS hv
												INNER JOIN subasta as sub ON hv.subastaID=sub.subastaID
												WHERE sub.usuarioID=$id");
			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
			{
				$hv = new HistorialVenta();

				$hv->__SET('id', $r->historial_ventasID);
				$hv->__SET('subastaID', $r->subastaID);
				$hv->__SET('ofertaID', $r->ofertaID);

				$result[] = $hv;
			}

			return $result;
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}		
   }
  
   public function listarSNG($id) {
   	try
		{
			$result = array();

			$stm = $this->pdo->prepare(" SELECT * FROM historial_ventas as hv
													WHERE hv.ofertaID IN ( SELECT ofertaID FROM ofertas
																						WHERE usuarioID=$id )");
			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
			{
				$hv = new HistorialVenta();

				$hv->__SET('id', $r->historial_ventasID);
				$hv->__SET('subastaID', $r->subastaID);
				$hv->__SET('ofertaID', $r->ofertaID);

				$result[] = $hv;
			}

			return $result;
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}		
   }
}
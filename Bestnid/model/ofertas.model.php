<?php
class OfertasModel
{
	private $pdo;
	public function __CONSTRUCT()
	{
		try
		{
			$this->pdo=conectar();
			//$this->pdo = new PDO('mysql:host=localhost;dbname=Bestnid', 'root', 'root');
			//$this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);		        
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function insertarOferta(Ofertas $data) 
	{
		try 
		{
		$sql = "INSERT INTO ofertas (usuarioID,subastaID,monto,necesidad,fecha) 
		        VALUES (?, ?, ?, ?, ?)";

		$this->pdo->prepare($sql)
		     ->execute(
			array(
				$data->__GET('usuarioID'), 
				$data->__GET('subastaID'), 
				$data->__GET('monto'),
				$data->__GET('necesidad'),
				$data->__GET('fecha')
				)
			);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
	
	public function ofertaXIdSubasta($id) {
			try 
		{
			$stm = $this->pdo
			          ->prepare("SELECT * FROM ofertas WHERE subastaID = ? ");      

			$stm->execute(array($id));
			$r = $stm->fetch(PDO::FETCH_OBJ);
			if($r) {
				return true;		
			}else {
				return false;
			}
		}
		 catch (Exception $e) 
		{
			die($e->getMessage());
		}	
	}
	
	public function obtenerOF($id) {
			try 
		{
			$stm = $this->pdo
			          ->prepare("SELECT * FROM ofertas WHERE ofertaID = ? ");      

			$stm->execute(array($id));
			$r = $stm->fetch(PDO::FETCH_OBJ);
			if($r) {
				$of=new Ofertas();				
				
				$of->__SET('id',$r->ofertaID);				
				$of->__SET('usuarioID',$r->usuarioID); 
				$of->__SET('subastaID',$r->subastaID); 
				$of->__SET('monto',$r->monto);
				$of->__SET('necesidad',$r->necesidad);
				$of->__SET('fecha',$r->fecha);
				return $of ;		
			}else {
				return false;
			}
		}
		 catch (Exception $e) 
		{
			die($e->getMessage());
		}	
	}
	
	public function listarIDS($id)
	{
		try
		{
			$result = array();

			$stm = $this->pdo->prepare("SELECT * FROM ofertas WHERE subastaID=$id ");
			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
			{
				$usr = new Subasta();

				$usr->__SET('id', $r->ofertaID);
				$usr->__SET('usuarioID', $r->usuarioID);
				$usr->__SET('subastaID', $r->subastaID);
				$usr->__SET('monto',$r->monto);
				$usr->__SET('necesidad', $r->necesidad);
				$usr->__SET('fecha', $r->fecha);
				
				$result[] = $usr;
			}

			return $result;
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}	
	
	public function getMonto($id) {
		try 
		{
			$stm = $this->pdo->prepare("SELECT * FROM ofertas WHERE ofertaID = ? ");
			$stm->execute(array($id));
			$r = $stm->fetch(PDO::FETCH_OBJ);
			if($r) {
				return $r->monto;		
			}else {
				return false;
			}
		}
		 catch (Exception $e) 
		{
			die($e->getMessage());
		}	
	}	
	
	public function eliminarAll($id)
	{	
	
		try 
		{
			$sql = "UPDATE ofertas SET 
						inactivo		=?
						
				    WHERE subastaID = ?";

			$this->pdo->prepare($sql)
			     ->execute(
				array('*',$id)
				);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function eliminar($id) {
		try 
		{
			$stm = $this->pdo
			          ->prepare("DELETE FROM ofertas WHERE ofertaID = ?");			          

			$stm->execute(array($id));
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}		
	}	
	
	public function setMonto($id,$monto) {
		try 
		{
			$sql = "UPDATE ofertas SET 
						monto		=?
						
				    WHERE ofertaID = ?";

			$this->pdo->prepare($sql)
			     ->execute(
				array($monto,$id)
				);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
	public function getOfertasActivas($id) {
		try
		{
			$result = array();

			$stm = $this->pdo->prepare("SELECT * FROM ofertas AS of 
												INNER JOIN subasta AS sb ON of.subastaID=sb.subastaID
												WHERE of.usuarioID=$id AND sb.inactivo NOT LIKE '%*%' 
												ORDER BY sb.fecha_fin ASC ");
			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
			{
				$usr = new Subasta();

				$usr->__SET('id', $r->ofertaID);
				$usr->__SET('usuarioID', $r->usuarioID);
				$usr->__SET('subastaID', $r->subastaID);
				$usr->__SET('monto',$r->monto);
				$usr->__SET('necesidad', $r->necesidad);
				$usr->__SET('fecha', $r->fecha);
				
				$result[] = $usr;
			}

			return $result;
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}	
	}
	
	public function ofertasNoGanadoras($id)
	{
		try
		{
			$result = array();

			$stm = $this->pdo->prepare("SELECT ofertas.ofertaID,ofertas.usuarioID,ofertas.subastaID,ofertas.monto,ofertas.necesidad,ofertas.fecha  
                    FROM historial_ventas,ofertas 
                    WHERE NOT historial_ventas.ofertaID = ofertas.ofertaID AND ofertas.usuarioID = $id"
            );
			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
			{
				$of = new Ofertas();

				$of->__SET('id', $r->ofertaID);
				$of->__SET('usuarioID', $r->usuarioID);
				$of->__SET('subastaID', $r->subastaID);
				$of->__SET('monto',$r->monto);
				$of->__SET('necesidad', $r->necesidad);
				$of->__SET('fecha', $r->fecha);
				
				$result[] = $of;
			}

			return $result;
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}
	
	public function sePuedeOfertar($idUser,$idSubasta){
		try 
		{
			$stm = $this->pdo->prepare("SELECT * FROM ofertas WHERE subastaID = ? AND usuarioID = ? ");
			$stm->execute(array($idSubasta,$idUser));
			$r = $stm->fetch(PDO::FETCH_OBJ);
			if($r) {
				return false;		
			}else {
				return true;
			}
		}
		 catch (Exception $e) 
		{
			die($e->getMessage());
		}	
	}
    
}

/*------------TEST INSERTAR OFERTA----------------*/
/*
require_once('ofertas.entidad.php');
require_once('../db/db.php');
/*$of=new Ofertas();
$of->__SET('usuarioID',1);
$of->__SET('subastaID',1);
$of->__SET('monto',600);
$of->__SET('necesidad','porque me gusta mucho');
$of->__SET('fecha',date('Y').'-'.date('m').'-'.date('d'));

$ofModel=new OfertaModel();
$ofModel->insertarOferta($of);

FUNCIONA OK!!
*/

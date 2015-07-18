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
}

/*------------TEST INSERTAR OFERTA----------------*/
/*
require_once('ofertas.entidad.php');
require_once('../db/db.php');
$of=new Ofertas();
$of->__SET('usuarioID',1);
$of->__SET('subastaID',1);
$of->__SET('monto',600);
$of->__SET('necesidad','porque me gusta mucho');
$of->__SET('fecha',date('Y').'-'.date('m').'-'.date('d'));

$ofModel=new OfertaModel();
$ofModel->insertarOferta($of);

FUNCIONA OK!!
*/
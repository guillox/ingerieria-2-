<?php


class SubastaModel
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
	public function listar($dato)
	{
		try
		{
			$result = array();

			$stm = $this->pdo->prepare("SELECT * FROM subasta WHERE descripcion LIKE '%$dato%' OR nombre LIKE '%$dato%' ");
			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
			{
				$usr = new Subasta();

				$usr->__SET('id', $r->subastaID);
				$usr->__SET('usuarioID', $r->usuarioID);
				$usr->__SET('categoriaID', $r->categoriaID);
				$usr->__SET('nombre',$r->nombre);
				$usr->__SET('descripcion', $r->descripcion);
				$usr->__SET('imagen', $r->imagen);
				$usr->__SET('fecha_inicio',$r->fecha_inicio);
				$usr->__SET('fecha_fin',$r->fecha_fin);
				

				$result[] = $usr;
			}

			return $result;
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}
}
//-------Test Subasta----------
//$s=new SubastaModel();
//print_r($s->listar('tele'));
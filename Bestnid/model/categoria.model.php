<?php


class CategoriaModel
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
	public function listarAll()
	{
		try
		{
			$result = array();

			$stm = $this->pdo->prepare("SELECT * FROM categoria ");
			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
			{
				$cat = new Categoria();

				$cat->__SET('id', $r->categoriaID);
				$cat->__SET('nombre', $r->Nombre);
				$cat->__SET('descripcion', $r->Descripcion);
				
				$result[] = $cat;
			}

			return $result;
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}
	public function obtenerPorID($id)
	{
		try 
		{
			$stm = $this->pdo->prepare("SELECT * FROM categoria WHERE categoriaID = ? ");
			          

			$stm->execute(array($id));
			$r = $stm->fetch(PDO::FETCH_OBJ);
			if($r) {
				$cat = new Categoria();

				$cat->__SET('id', $r->categoriaID);
				$cat->__SET('nombre', $r->Nombre);
				$cat->__SET('descripcion', $r->Descripcion);
				
                return $cat;		
			}else {
				return false;
			}
		}
		 catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
	
} ?>
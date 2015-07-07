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

	public function obtener($id)
	{
		try 
		{
			$stm = $this->pdo->prepare("SELECT * FROM subasta WHERE subastaID = ? ");
			          

			$stm->execute(array($id));
			$r = $stm->fetch(PDO::FETCH_OBJ);
			if($r) {
				$sb = new Subasta();

				$sb->__SET('id', $r->subastaID);
				$sb->__SET('usuarioID', $r->usuarioID);
				$sb->__SET('categoriaID', $r->categoriaID);
				$sb->__SET('nombre',$r->nombre);
				$sb->__SET('descripcion', $r->descripcion);
				$sb->__SET('imagen', $r->imagen);
				$sb->__SET('fecha_inicio',$r->fecha_inicio);
				$sb->__SET('fecha_fin',$r->fecha_fin);
			
				return $sb;		
			}else {
				return false;
			}
		}
		 catch (Exception $e) 
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
	
	public function listarHS($id)
	{
		try
		{
			$result = array();

			$stm = $this->pdo->prepare("SELECT * FROM subasta WHERE usuarioID=$id ");
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
	
	public function altaSubasta(Subasta $data) {
		
		try 
		{
		print_r($data);
		$sql = "INSERT INTO subasta (usuarioID,categoriaID,nombre,descripcion,imagen,fecha_inicio,fecha_fin) 
		        VALUES (?, ?, ?, ?, ?, ?, ?)";

		$this->pdo->prepare($sql)
		     ->execute(
			array(
				$data->__GET('usuarioID'), 
				$data->__GET('categoriaID'), 
				$data->__GET('nombre'),
				$data->__GET('descripcion'),
				$data->__GET('imagen'),
				$data->__GET('fecha_inicio'),
				$data->__GET('fecha_fin')
				)
			);
			printf('agregado<br/>');
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}	
	}
	
	public function bajaSubasta($id) {
		try 
		{
			$stm = $this->pdo
			          ->prepare("DELETE FROM subasta WHERE subastaID = ?");			          

			$stm->execute(array($id));
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}	
	}
	public function eliminarSubasta($id) {
		
		try 
		{
			$stm = $this->pdo
			          ->prepare("DELETE FROM subasta WHERE subastaID = ?");			          

			$stm->execute(array($id));
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
	public function modificarSubasta(Subasta $data)
	{
		try 
		{
			$sql = "UPDATE subasta SET 
						usuarioID		=?,
						categoriaID		=?,
						nombre			=?,
						descripcion		=?,
						imagen			=?,
						fecha_inicio	=?,
						fecha_fin		=?
						
				    WHERE subastaID = ?";

			$this->pdo->prepare($sql)
			     ->execute(
				array(
					$data->__GET('usuarioID'), 
					$data->__GET('categoriaID'), 
					$data->__GET('nombre'),
					$data->__GET('descripcion'),
					$data->__GET('imagen'),
					$data->__GET('fecha_inicio'),
					$data->__GET('fecha_fin'),
					$data->__GET('id')
					)
				);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
  
    /*>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>AGREGADO PARA CATEGORIA CONTROLLER<<<<<<<<<<<<<<<<<<<<<<<<*/
    /*listar las ultimas subastas agregadas*/
    
    public function listarUltimasSubastas($limite)
	{
		try
		{
			$result = array();

			$stm = $this->pdo->prepare("SELECT * FROM subasta ORDER BY subastaID DESC LIMIT $limite");
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
    
    /* -------filtardo por categoria----------*/
    public function listarCategoria($idCategoria,$limite)
	{
		try
		{
           
            
			$result = array();

			$stm = $this->pdo->prepare("SELECT * FROM subasta WHERE categoriaID = $idCategoria ORDER BY subastaID DESC LIMIT $limite");
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
    
    
     public function listarReport()
	{
		try
		{
			$result = array();

			$stm = $this->pdo->prepare("SELECT * FROM subasta");
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
    
     public function propietario()
	{
        //devuelve el nombre o todo el propietario
     }
    
}

?>

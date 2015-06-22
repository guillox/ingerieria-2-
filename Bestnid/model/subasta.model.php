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
					$data->__GET('subastaID')
					)
				);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
}
//-------Test Subasta----------
//$s=new SubastaModel();
//print_r($s->listar('tele'));

//----------Test Insertar subasta nueva-----------------
/*require_once('subasta.entidad.php');
require_once('../db/db.php');
$subasta=new Subasta();

				$subasta->__SET('usuarioID',1); 
				$subasta->__SET('categoriaID',1); 
				$subasta->__SET('nombre','testNombre');
				$subasta->__SET('descripcion','testDescripcion');
				$subasta->__SET('imagen','testImg');
				$subasta->__SET('fecha_inicio','2015-03-19');
				$subasta->__SET('fecha_fin','2015-04-19');
				
$sm=new SubastaModel();
$sm->altaSubasta($subasta);
print_r($sm->listar($subasta->__GET('usuarioID')));
	FUNCIONA OK!!!
*/

//--------------Test Eliminar subasta ------------------
/*require_once('subasta.entidad.php');
require_once('../db/db.php');
$sm=new SubastaModel();
$sm->bajaSubasta(6);
$sm->listar('');
	FUNCIONA OK!!!
*/

//--------------Test Modificar subasta------------------
/*require_once('subasta.entidad.php');
require_once('../db/db.php');
$subasta=new Subasta();
				$subasta->__SET('subastaID',8);
				$subasta->__SET('usuarioID',1); 
				$subasta->__SET('categoriaID',1); 
				$subasta->__SET('nombre','testNombreM');
				$subasta->__SET('descripcion','testDescripcionM');
				$subasta->__SET('imagen','testImg');
				$subasta->__SET('fecha_inicio','2015-03-19');
				$subasta->__SET('fecha_fin','2015-04-19');
$sm=new SubastaModel();
$sm->modificarSubasta($subasta);
print_r($sm->listar($subasta->__GET('subastaID')));			
	FUNCIONA OK!!!
*/

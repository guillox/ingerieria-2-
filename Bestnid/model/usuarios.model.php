<?php

class UsuarioModel
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
	
	public function listar()
	{
		try
		{
			$result = array();

			$stm = $this->pdo->prepare("SELECT * FROM clientes WHERE inactivo NOT LIKE '%*%'");
			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
			{
				$usr = new Usuario();

				$usr->__SET('id', $r->clientesID);
				$usr->__SET('nombre', $r->nombre);
				$usr->__SET('apellido', $r->apellido);
				$usr->__SET('email',$r->email);
				$usr->__SET('fecha_registro', $r->fecha_registro);
				$usr->__SET('fecha_nac', $r->fecha_nac);
				$usr->__SET('pasw',$r->pasw);
				$usr->__SET('nombreUsuario',$r->usuario);
				$usr->__SET('nro_tarjeta',$r->nro_tarjeta);
				

				$result[] = $usr;
			}

			return $result;
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}
	
	public function obtener($usuario,$pasw)
	{
		try 
		{
			$stm = $this->pdo
			          ->prepare("SELECT * FROM clientes WHERE usuario = ? OR email = ? AND pasw = ? AND inactivo NOT LIKE '%*%'");
			          

			$stm->execute(array($usuario,$usuario,$pasw));
			$r = $stm->fetch(PDO::FETCH_OBJ);
			if($r) {
				$usr = new Usuario();

				$usr->__SET('id', $r->clientesID);
				$usr->__SET('nombre', $r->nombre);
				$usr->__SET('apellido', $r->apellido);
				$usr->__SET('email',$r->email);
				$usr->__SET('fecha_registro', $r->fecha_registro);
				$usr->__SET('fecha_nac', $r->fecha_nac);
				$usr->__SET('pasw',$r->pasw);
				$usr->__SET('nombreUsuario',$r->usuario);
				$usr->__SET('nro_tarjeta',$r->nro_tarjeta);
			
				return $usr;		
			}else {
				return false;
			}
		}
		 catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
	public function obtenerxUoE($usuario)
	{
		try 
		{
			$stm = $this->pdo
			          ->prepare("SELECT * FROM clientes WHERE usuario = ? OR email = ? ");
			          

			$stm->execute(array($usuario,$usuario));
			$r = $stm->fetch(PDO::FETCH_OBJ);
			if($r) {
				$usr = new Usuario();

				$usr->__SET('id', $r->clientesID);
				$usr->__SET('nombre', $r->nombre);
				$usr->__SET('apellido', $r->apellido);
				$usr->__SET('email',$r->email);
				$usr->__SET('fecha_registro', $r->fecha_registro);
				$usr->__SET('fecha_nac', $r->fecha_nac);
				$usr->__SET('pasw',$r->pasw);
				$usr->__SET('nombreUsuario',$r->usuario);
				$usr->__SET('nro_tarjeta',$r->nro_tarjeta);
			
				return $usr;		
			}else {
				return false;
			}
		}
		 catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}	
	public function existeUsuario($usuario)
	{
		try 
		{
			$stm = $this->pdo
			          ->prepare("SELECT * FROM clientes WHERE usuario = ? inactivo NOT LIKE '%*%'");      

			$stm->execute(array($usuario));
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
		public function obtenerPorID($id)
	{
		try 
		{
			$stm = $this->pdo
			          ->prepare("SELECT * FROM clientes WHERE clientesID = ? ");
			          

			$stm->execute(array($id));
			$r = $stm->fetch(PDO::FETCH_OBJ);
			if($r) {
				$usr = new Usuario();

				$usr->__SET('id', $r->clientesID);
				$usr->__SET('nombre', $r->nombre);
				$usr->__SET('apellido', $r->apellido);
				$usr->__SET('email',$r->email);
				$usr->__SET('fecha_registro', $r->fecha_registro);
				$usr->__SET('fecha_nac', $r->fecha_nac);
				$usr->__SET('pasw',$r->pasw);
				$usr->__SET('nombreUsuario',$r->usuario);
				$usr->__SET('nro_tarjeta',$r->nro_tarjeta);
			   $usr->__SET('admin',$r->admin);
				return $usr;		
			}else {
				return false;
			}
		}
		 catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}	
	
	public function eliminar($id,$user)
	{
		try 
		{
			$sql = "UPDATE clientes SET 
						inactivo		=?,
						usuario		=?
				    WHERE clientesID = ?";

			$this->pdo->prepare($sql)
			     ->execute(
				array('*','**'.$user.'**',$id)
				);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
	
	public function registrar(Usuario $data)
	{
		try 
		{
		print_r($data);
		$sql = "INSERT INTO clientes (nombre,apellido,email,fecha_nac,fecha_registro,nro_tarjeta,pasw,usuario) 
		        VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

		$this->pdo->prepare($sql)
		     ->execute(
			array(
				$data->__GET('nombre'), 
				$data->__GET('apellido'), 
				$data->__GET('email'),
				$data->__GET('fecha_nac'),
				$data->__GET('fecha_registro'),
				$data->__GET('nro_tarjeta'),
				$data->__GET('pasw'),
				$data->__GET('nombreUsuario')
				)
			);
			printf('agregado<br/>');
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
	
	public function modificar(Usuario $data) {
	try 
		{
			$sql = "UPDATE clientes SET 
						nombre			=?,
						apellido			=?,
						email				=?,
						fecha_nac		=?,
						nro_tarjeta		=?
						
				    WHERE clientesID = ?";

			$this->pdo->prepare($sql)
			     ->execute(
				array(
					$data->__GET('nombre'), 
					$data->__GET('apellido'), 
					$data->__GET('email'),
					$data->__GET('fecha_nac'),
					$data->__GET('nro_tarjeta'),
					$data->__GET('id')
					)
				);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}	
	}
	
	public function compararEmail($id,$email) {
		try 
		{
			$stm = $this->pdo
			          ->prepare("SELECT * FROM clientes WHERE clientesID = ? ");
			          

			$stm->execute(array($id));
			$r = $stm->fetch(PDO::FETCH_OBJ);
			if($r) {
				return $r->email==$email;		
			}
		}
		 catch (Exception $e) 
		{
			die($e->getMessage());
		}	
	}
	/*>>>>>>>>>>>>>>>>>>>>>>>>>>>>><<<recportes Admin<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<*/   
    public function listarRagoUsuarios($rango1,$rango2)
	{
		try
		{

			$result = array();

			$stm = $this->pdo->prepare("SELECT * FROM clientes WHERE fecha_registro >= ? AND fecha_registro <= ? AND inactivo NOT LIKE '%*%'");
			          

			$stm->execute(array($rango1,$rango2));

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
			{
				$usr = new Usuario();

				$usr->__SET('id', $r->clientesID);
				$usr->__SET('nombre', $r->nombre);
				$usr->__SET('apellido', $r->apellido);
				$usr->__SET('email',$r->email);
				$usr->__SET('fecha_registro', $r->fecha_registro);
				$usr->__SET('fecha_nac', $r->fecha_nac);
				$usr->__SET('pasw',$r->pasw);
				$usr->__SET('nombreUsuario',$r->usuario);
				$usr->__SET('nro_tarjeta',$r->nro_tarjeta);
				

				$result[] = $usr;
			}

			return $result;
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}
   
	public function propietario2($id)
    {
        try{

            $stm = $this->pdo->prepare("SELECT * FROM clientes WHERE clientesID = ?");

           	$stm->execute(array($id));
           	$r= $stm->fetch(PDO::FETCH_OBJ);
           	return $r->nombre;
        }
        catch(Exception $e)
        {
            die($e->getMessage());
        }

     }
		
		
	
}

//----------TEST CLASE---------------//
/*require_once('usuarios.entidad.php');
$usuario=new Usuario();

				$usuario->__SET('nombre', 'Ale');
				$usuario->__SET('apellido', 'valdez');
				$usuario->__SET('fecha_registro','19/03/1988');
				$usuario->__SET('fecha_nac', '19/03/1988');
				$usuario->__SET('pasw','hola');
				$usuario->__SET('nombreUsuario','avico');
				$usuario->__SET('nro_tarjeta',111);
$um=new UsuarioModel();
//$um->registrar($usuario);
print_r($um->listar());
printf('obtenido<br />');
$s=
print_r($um->obtener('avico','hola'));*/

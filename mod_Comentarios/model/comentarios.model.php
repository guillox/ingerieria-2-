<?php

class ComentariosModel
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
	
    /*------devuelve una lista de comentarios de un ID de subasta*/
	public function listar($idSubasta)
	{
		try
		{
            //crea un array vacio
			$result = array();
            
            //prepara la consulta
			$stm = $this->pdo->prepare("SELECT * FROM comentarios WHERE subastaID = ? ");
            //ejecuta la consulta mysql
			$stm->execute(array($idSubasta));

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
			{
                //crea un usuario de la clase entidad
				$com = new Comentarios();

				$com->__SET('id', $r->comentariosID);
				$com->__SET('usuarioID', $r->usuarioID);
				$com->__SET('subastaID', $r->subastaID);
				$com->__SET('fechaPregunta',$r->fechaPregunta);
				$com->__SET('pregunta', $r->pregunta);
				$com->__SET('fechaRespuesta', $r->fechaRespuesta);
				$com->__SET('respuesta',$r->respuesta);
				

				$result[] = $com;
			}

			return $result;
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}
	
    /*---------agrega un nuevo comentario----------*/
  	public function agregarComentario(Comentarios $data)
	{
        try 
		{  
        $sql = "INSERT INTO comentarios (usuarioID, subastaID, fechaPregunta, pregunta) 
		        VALUES ( ?, ?, ?, ?)";

		$this->pdo->prepare($sql)->execute(
			array(
                //recuperas todos los datos a reemplazar con los "?"
				$data->__GET('usuarioID'), 
				$data->__GET('subastaID'),
				$data->__GET('fechaPregunta'),
				$data->__GET('pregunta')
				/*$data->__GET('fechaRespuesta'),
				$data->__GET('respuesta'),*/
				)
			);
			printf('agregado<br/>');
            
            
    
    } catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
    
   /*agrega la respuesta al comenatrio con ID*/ 
    public function agregarRespuesta($respID,$resp)
	{
        try 
        { 
            $sql ="UPDATE comentarios SET respuesta='$resp' WHERE comentariosID = '$respID'";

            $this->pdo->prepare($sql)->execute(printf(' RESpuesta agregado<br/>'));

        }catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
                                               
    
    /*devuelve todos los comentarios de un usuario (preguntas que realiso) */                                                                       
      	public function listarComentarioUsuario($idUser)
	{
		try
		{
            //crea un array vacio
			$result = array();
            
            //prepara la consulta
			$stm = $this->pdo->prepare("SELECT * FROM comentarios WHERE subastaID = ? ");
            //ejecuta la consulta mysql
			$stm->execute($idUser);

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
			{
                //crea un usuario de la clase entidad
				$com = new Comentarios();

				$com->__SET('id', $r->comentariosID);
				$com->__SET('usuarioID', $r->usuarioID);
				$com->__SET('subastaID', $r->subastaID);
				$com->__SET('fechaPregunta',$r->fechaPregunta);
				$com->__SET('pregunta', $r->pregunta);
				$com->__SET('fechaRespuesta', $r->fechaRespuesta);
				$com->__SET('respuesta',$r->respuesta);
				

				$result[] = $com;
			}

			return $result;
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}      

    
     /*averigua si la IDsubasta pertenece a ID Usuario*/
    public function propio($idSubasta,$idUsuario)
    {
        try 
        {
            $stm = $this->pdo->prepare("SELECT * FROM subasta WHERE subastaID=? AND usuarioID = ?");

            $stm->execute(array($idSubasta,$idUsuario));

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
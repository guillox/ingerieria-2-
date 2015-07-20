<?php
class NotificacionesModel
{
	private $pdo;
	public function __CONSTRUCT()
	{
		try
		{
			$this->pdo=conectar();
			        
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}
  
    /*listar mis notificaciones por id*/

    public function listarMisNotificaciones($id)
	{
		try
		{
			$result = array();
            
            
            $stm = $this->pdo->prepare("SELECT * FROM notificaciones WHERE receptorID = ? ORDER BY fecha DESC");			          

			$stm->execute(array($id)); 
            
 			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
			{     
                
                $not = new Notificaciones();
			 
                $not->__SET('id', $r->notificacionesID);
                $not->__SET('emisorID', $r->emisorID);
				$not->__SET('receptorID', $r->receptorID);
				$not->__SET('subastaID', $r->subastaID);
				$not->__SET('asunto', $r->asunto);
				$not->__SET('mensaje', $r->mensaje);
				$not->__SET('fecha', $r->fecha);
				$not->__SET('leido', $r->leido);
                
                
				$result[] = $not;
			}
            
            
			return $result;
            
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}
    
    
     /*agregar notificacion*/
    
    public function altaNotificacion(Notificaciones $data) {
		
		try 
		{
		print_r($data);
		$sql = "INSERT INTO notificaciones (emisorID,receptorID,subastaID,asunto,mensaje,fecha,leido) 
		        VALUES (?, ?, ?, ?, ?, ?, ?)";

		$this->pdo->prepare($sql)->execute(
			array(
				$data->__GET('emisorID'), 
                
				$data->__GET('receptorID'), 
                
				$data->__GET('subastaID'),
                
				$data->__GET('asunto'),
                
				$data->__GET('mensaje'),
                
				$data->__GET('fecha'),
                
				$data->__GET('leido')
				)
			);
			printf('agregado<br/>');
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}	
	}
    
    /*actualizar leido*/
      /*agrega la respuesta al comenatrio con ID*/ 
    public function marcarLeido($notID)
	{
        try 
        {   
            $resp=1;
            $sql ="UPDATE notificaciones SET leido='$resp' WHERE notificacionesID = '$notID'";

            $this->pdo->prepare($sql)->execute();

        }catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
    
    /*eliminar notificacion*/
    	public function eliminar($id) {
		
		try 
		{
			$stm = $this->pdo->prepare("DELETE FROM notificaciones WHERE notificacionesID = ?");			          

			$stm->execute(array($id));
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
    
    
    
}
?>
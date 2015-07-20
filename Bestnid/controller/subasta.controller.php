<?php
require_once 'model/subasta.entidad.php';
require_once 'model/subasta.model.php';
require_once 'notificaciones.controller.php';
class SubastaController
{
	private $model;
    
    public function __CONSTRUCT(){
        $this->model = new SubastaModel();
    }
	
	public function vistaBusqueda() {
			require_once 'view/header.php';
			require_once 'view/busqueda.php';
    		require_once 'view/footer.php';   
    	}
    
    public function testDetalle() {
    	require_once 'view/header.php';
			require_once 'view/detalleSubasta.php';
    		require_once 'view/footer.php';
    }	
    
    public function vistaLBusqueda() {
			require_once 'view/headerLogueado.php';
			require_once 'view/busqueda.php';
    		require_once 'view/footer.php';     
    }
	 
	 public function vistaNuevaSubasta(){
			$sub = new Subasta();
        
        if(isset($_REQUEST['id'])){
            $sub = $this->model->obtener($_REQUEST['id']);
        }
	 	
			require_once 'view/headerLogueado.php';
			require_once 'view/formularioAltaSubasta.php';
    		require_once 'view/footer.php';      
	 }
	
	public function vistaHSubasta() {
		
		
			require_once 'view/headerLogueado.php';
			require_once 'view/historialSubastaUsuario.php';
    		require_once 'view/footer.php';  
	} 	
 	/*---------------------------agregado--------------------------------*/
    public function detalleSubasta(){           
				require_once 'view/header.php';            
				require_once 'view/detalleSubasta.php';
				require_once 'view/comentariosCompleto.php';    
				require_once 'view/footer.php';
    
    }
    
    public function detalleGeneral() {
		   	require_once 'view/headerLogueado.php';            
				require_once 'view/detalleGeneral.php';
				require_once 'view/footer.php';
    }
    
    
      public function logDetalleSubasta(){
				require_once 'view/headerLogueado.php';   
				require_once 'view/detalleSubasta.php';
				 /*si puedo ver el ide de usuario*/
				require_once 'view/comentariosCompleto.php';    
				require_once 'view/footer.php';
    
    }
 	public function insertarSubasta() {
	    $sub=new Subasta();
	    
	    $fecha = new DateTime(date('Y').'-'.date('m').'-'.date('d'));
		 $fecha->add(new DateInterval('P'.$_REQUEST['duracion'].'D'));
	    
	    $sub->__SET('nombre',$_REQUEST['nombre']);
	    $sub->__SET('usuarioID',$_REQUEST['usuarioID']);
	    $sub->__SET('categoriaID',$_REQUEST['categoria']);
	    $sub->__SET('descripcion',$_REQUEST['descripcion']);
	    $sub->__SET('fecha_inicio',date('Y').'-'.date('m').'-'.date('d'));
	    $sub->__SET('fecha_fin',$fecha->format('Y-m-d'));
	    $sub->__SET('imagen',$this->guardarImagen());
	    
	    $this->model->altaSubasta($sub);
	    header('Location: index.php?c=usuario&a=vistaHSub');
    }
    
   public function modificarSubasta() {
		 $sub=new Subasta();
	    
	    $fecha = new DateTime(date('Y').'-'.date('m').'-'.date('d'));
		 $fecha->add(new DateInterval('P'.$_REQUEST['duracion'].'D'));
	    
	    $sub->__SET('id',$_REQUEST['id']);
	    $sub->__SET('nombre',$_REQUEST['nombre']);
	    $sub->__SET('usuarioID',$_REQUEST['usuarioID']);
	    $sub->__SET('categoriaID',$_REQUEST['categoria']);
	    $sub->__SET('descripcion',$_REQUEST['descripcion']);
	    $sub->__SET('fecha_inicio',date('Y').'-'.date('m').'-'.date('d'));
	    $sub->__SET('fecha_fin',$fecha->format('Y-m-d'));
	    $sub->__SET('imagen',$this->guardarImagen());   
	    
	     $this->model->modificarSubasta($sub);
        header('Location: index.php?c=usuario&a=vistaHSubasta'); //llevar a la pagina de detalle de subasta
   }
    
 	
	private function guardarImagen() {
		$ruta="/var/www/html/Bestnid/view/img/imgProducto/";//ruta carpeta donde queremos copiar las imágenes 
		$ruta2="view/img/imgProducto/";	
		$uploadfile_temporal=$_FILES['imagen']['tmp_name']; 
		$uploadfile_nombre=$ruta.$_FILES['imagen']['name']; 
		$stringRetorno=$ruta2.$_FILES['imagen']['name'];
		echo $uploadfile_temporal;

		if (is_uploaded_file($uploadfile_temporal)) 
		{ 
    		move_uploaded_file($uploadfile_temporal,$uploadfile_nombre); 
    		return $stringRetorno; 
		} 
		else 
		{ 
			return $ruta.'default-error.jpg'; 
		}  
	
	} 	
 	public function eliminarSubasta(){
        $this->model->eliminarSubasta($_REQUEST['id']);
        header('Location: index.php?c=usuario&a=listarSubasta');
    }
    
    public function eliminarSubastaAdmin() {
			$asunto="Subasta Eliminada";			
			$mensaje="La subasta ha sido eliminada por no cumplir con las reglas establecidad";
			$notM=new NotificacionesController();
			$notM->insertarNotificacion($_SESSION['idUser'],$_REQUEST['id'],$asunto,$mensaje);		  
		  
		  $this->model->eliminarSubasta($_REQUEST['id']);		  
		  
    		header("location: index.php?c=usuario&a=vistaHSubasta");        
         
    }
    
 	public function listarSubasta(){
				header("location: index.php?c=usuario&a=vistaHSubasta");        
 	}
 	
 	public function sumar() {
		$puntos=(int) $_REQUEST['puntos']+1;
		$this->model->actualizarPuntaje($_REQUEST['id'],$puntos); 	
		header("location: index.php?c=subasta&a=logDetalleSubasta&idActual=".$_REQUEST['id']);
 	}
 	
 	public function restar() {
 		$puntos=$_REQUEST['puntos'];
		$this->model->actualizarPuntaje($_REQUEST['id'],$puntos-1); 	
		header("location: index.php?c=subasta&a=logDetalleSubasta&idActual=".$_REQUEST['id']);
 	}
}
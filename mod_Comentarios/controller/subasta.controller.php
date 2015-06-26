<?php
require_once 'model/subasta.entidad.php';
require_once 'model/subasta.model.php';

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
    public function vistaLBusqueda() {
			require_once 'view/headerLogueado.php';
			require_once 'view/busqueda.php';
    		require_once 'view/footer.php';     
    }
	 	
 	
 	public function listarSubasta(){
				header("location: index.php?c=usuario&a=vistaHSubasta");        
 	}
    
    
    
    /*---------------------------agregado--------------------------------*/
    public function detalleSubasta(){
        
            
                   
            require_once 'view/header.php';            
           
        
			require_once 'view/detalleSubasta.php';
        
            require_once 'view/comentariosCompleto.php';    
        
    		require_once 'view/footer.php';
    
    }
    
    
      public function logDetalleSubasta(){
           
            require_once 'view/headerLogueado.php';   

			require_once 'view/detalleSubasta.php';
          
          /*si puedo ver el ide de usuario*/
           
          
            require_once 'view/comentariosCompleto.php';    
        
          
    		require_once 'view/footer.php';
    
    }
}
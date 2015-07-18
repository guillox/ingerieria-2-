<?php
require_once 'model/ofertas.entidad.php';
require_once 'model/ofertas.model.php';

class OfertasController
{
	private $model;
    
    public function __CONSTRUCT(){
        $this->model = new OfertasModel();
    }
    
	public function vistaOfertaExito() {
		require_once 'view/headerLogueado.php';
			require_once 'view/ofertaConcreta.php';
    		require_once 'view/footer.php'; 
	}    
    
    public function insertarOferta() {
		  $of=new Ofertas();
		  
		  $of->__SET('usuarioID',$_REQUEST['usuarioID']);
		  $of->__SET('subastaID',$_REQUEST['idSubasta']);
		  $of->__SET('monto',$_REQUEST['precio']);
		  $of->__SET('necesidad',$_REQUEST['necesidad']);
		  $of->__SET('fecha',date('Y').'-'.date('m').'-'.date('d'));
		  
		  $this->model->insertarOferta($of);
		  header('Location: index.php?c=ofertas&a=vistaOfertaExito');
    }
}
?>
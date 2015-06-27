<?php
require_once 'model/subasta.entidad.php';
require_once 'model/subasta.model.php';

class SubastaController
{
	private $model;
    
    public function __CONSTRUCT(){
        $this->model = new SubastaModel();
    }
    
    public function insertarOferta() {
		    
    }
}
?>
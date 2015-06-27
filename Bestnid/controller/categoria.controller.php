<?php
require_once 'model/categoria.entidad.php';
require_once 'model/categoria.model.php';

class CategoriaController
{
	private $model;
    
    public function __CONSTRUCT(){
        $this->model = new CategoriaModel();
    }
    
    
}
<?php
require_once 'model/categoria.entidad.php';
require_once 'model/categoria.model.php';
require_once 'model/subasta.model.php';

class CategoriaController
{
	private $model;
    
    /*creacion del constructor*/
    public function __CONSTRUCT(){
        $this->model = new CategoriaModel();
    }
    
    /*muestra las categorias*/
    public function verCategoria(){
          return $this->model->listarAll();
    }
    
    /*lista las ultimas subastas agregados*/
    public function listarUlt(){
        $subasta= new SubastaModel();
        $limite=20;
        $lista=$subasta->listarUltimasSubastas($limite);
        return $lista;
    }
    
    /*listar por categorias*/
    public function listarCategoria($idCategoria){
        $subasta= new SubastaModel();
        $limite=20;
        return $subasta->listarCategoria($idCategoria,$limite);
    }
    
    
    /* listar subasta categoria logueado */
    public function listarSubastasCategoriaLog(){
        require_once 'view/headerLogueado.php';
        $id=$_REQUEST['idActual'];
        $limite=20;
        $listado=$this->listarCategoria($id, $limite);
        require_once 'view/categoriaBusqueda.php';
        require_once 'view/footer.php';
    
    }

    
    /*listar subasta categoria sin logear*/
    public function listarSubastasCategoria(){
        require_once 'view/header.php';
        $id=$_REQUEST['idActual'];
        $limite=20;
        $listado=$this->listarCategoria($id, $limite);
        require_once 'view/categoriaBusqueda.php';
        require_once 'view/footer.php';
    }
    
    
}
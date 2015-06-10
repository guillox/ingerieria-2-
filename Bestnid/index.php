<?php
require_once('db/db.php');
require_once 'controller/usuario.controller.php';
require_once 'controller/subasta.controller.php';

// Todo esta lógica hara el papel de un FrontController
if(!isset($_REQUEST['c'])){
	    
    $controller = new UsuarioController();
		if(isset($_SESSION['idUser'])) {    
    		$controller->vistaLogueado();
    	}else {
    		$controller->index();
    	} 
} else {
    
    // Obtenemos el controlador que queremos cargar
    $controller = $_REQUEST['c'] . 'Controller';
    if(isset($_REQUEST['s'])) { 
    	 $accion     = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'vistaLogueado';
 	}else {
    if(isset($_SESSION['idUser'])) {    
    		    $accion     = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'vistaLogueado';
    	}else {
    		    $accion     = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'index';
    	} 
   // $accion     = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'Index';
    }
    
    // Instanciamos el controlador
    $controller = new $controller();
    
    // Llama la accion
    call_user_func( array( $controller, $accion ) );
}
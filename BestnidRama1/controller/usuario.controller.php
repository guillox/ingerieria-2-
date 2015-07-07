<?php
require_once 'model/usuarios.entidad.php';
require_once 'model/usuarios.model.php';

class UsuarioController
{
	private $model;
    
    public function __CONSTRUCT(){
        $this->model = new UsuarioModel();
    }
	
	public function index() {
			require_once 'view/header.php';
			require_once 'view/indexContenido.php';
    		require_once 'view/footer.php';   
    	}
	
	public function vistaEnConstruccion() {    
      require_once 'view/pagConstruccion.html';   
 }
    public function registroVista() {
		require_once 'view/header.php';
      require_once 'view/formularioAlta.php';
      require_once 'view/footer.php';    
    }
    public function vistaLogueado() {
    		require_once 'view/headerLogueado.php';
    		require_once 'view/indexContenido.php';
    		require_once 'view/footer.php';    
    }
    
    
    
    
	public function vistaHSubasta() {
        require_once 'view/headerLogueado.php';
        require_once 'view/historialUsuario.php';
        require_once 'view/footer.php';   
	}    
    
    
    
    
    
    public function insertar() {
	    $usr=new Usuario();
	    
	    $usr->__SET('nombre',$_REQUEST['nombre']);
	    $usr->__SET('apellido',$_REQUEST['apellido']);
	    $usr->__SET('email',$_REQUEST['email']);
	    $usr->__SET('fecha_nac',$_REQUEST['fechaNac']);
	    $usr->__SET('fecha_registro',date('Y').'-'.date('m').'-'.date('d'));
	    $usr->__SET('nro_tarjeta',$_REQUEST['nroTarjeta']);
	    $usr->__SET('nombreUsuario',$_REQUEST['usuario']);
	    $usr->__SET('pasw',$_REQUEST['pass']);
	    
		if($this->model->obtenerxUoE($_REQUEST['usuario'])) {	    
	   	header('Location: index.php?c=usuario&a=registroVista&errorRegistro='.$_REQUEST['usuario']);
	 	}elseif($this->model->obtenerxUoE($_REQUEST['email'])) {
	 		header('Location: index.php?c=usuario&a=registroVista&errorRegistro='.$_REQUEST['email']);
	 	}else {
	    $this->model->registrar($usr);
	    header('Location: index.php');
	 	}
    }
    
    public function loguear() {
    	
    	$nUsr= $_REQUEST['usuario'];
    	$pass= $_REQUEST['pass'];
    	$usuario=$this->model->obtener($nUsr,$pass);
		if($usuario){
			try {
				session_start();
				$_SESSION['username']=$usuario->__GET('nombre')	;	
				$_SESSION['idUser']=$usuario->__GET('id');
				header('Location: index.php?c=usuario&a=vistaLogueado');	
			}catch (Exception $e) {
				$mensaje=$e->getMessage();	
				$anterior=$_SERVER['HTTP_REFERER'];
			if($anterior!='') {			
				header('Location: '.$anterior.'&msj='.$mensaje.'');
			}	else {
				header('Location: index.php');	
			}
		}
		
    }else {
    				header('Location: index.php?errorLogin=true');	
    		}
 	}
    
 	public function logout() {
 		print "entre en logout";
 		$_SESSION = array();
 		//Destruir Sesión
 		session_destroy();
 		echo "cerro la sesion";
 		//Redireccionar a index.php
 		header("location: index.php");
 	}
 	
 	public function listarSubasta(){
        
				header("location: index.php?c=usuario&a=vistaHSubasta");        
 	}
    
/*>>>>>>>>>>>>>>>>>>>>>>>>>>>>agregados admin<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<*/
    public function esAdmin(){
        $yo=$this->model->obtenerPorID($_SESSION['idUser']);
        
        if( $yo->__GET('admin')==NULL ){
            return false;
        }else{
            return true;
        }
        
    }
    
    public function rangoSubastas(){
        //control de parametros
        $control=1;
        if($_POST['inicio'] == NULL || $_POST['inicio'] == NULL){
            $control= "debe elegir dos fechas";
        }
       if($_POST['inicio'] > $_POST['fin']){
            $control= 'fecha "fin" debe ser mayor a fecha "inicio"';
        }
        
        
        /*controlar si la lista viene vacia asignarle a control mensaje de lista vacia*/
        
        require_once 'view/headerLogueado.php';
        require_once 'view/reporteSubastaResult.php';
        require_once 'view/footer.php';           
                 
 	}
    
        public function rangoUsuarios(){
        //control de parametros
            $control=1;
            if($_POST['inicio'] == NULL || $_POST['inicio'] == NULL){
                $control= "debe elegir dos fechas";
            }
           if($_POST['inicio'] > $_POST['fin']){
                $control= 'fecha "fin" debe ser mayor a fecha "inicio"';
            }

            
            require_once 'view/headerLogueado.php';
            require_once 'view/reporteUsuariosResult.php';
            require_once 'view/footer.php';           

 	}
        
}
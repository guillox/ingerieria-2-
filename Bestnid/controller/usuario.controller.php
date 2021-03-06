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
		$usr = new Usuario();
		if(isset($_REQUEST['errorRegistro'])) {
			$usr->__SET('nombre',$_REQUEST['nb']);	
			$usr->__SET('apellido',$_REQUEST['ap']);		
			$usr->__SET('nombreUsuario',$_REQUEST['us']);		
			$usr->__SET('email',$_REQUEST['em']);		
			$usr->__SET('fecha_nac',$_REQUEST['fn']);	
			$usr->__SET('nro_tarjeta',$_REQUEST['nt']);			
		}
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
	
	public function vistaAyudaL() {
		require_once 'view/headerLogueado.php';
      require_once 'view/ayuda.php';
      require_once 'view/footer.php';  
	}
	
	public function vistaAyuda() {
		require_once 'view/header.php';
      require_once 'view/ayuda.php';
      require_once 'view/footer.php';  
	}
	
	public function vistaContactob() {
		require_once 'view/header.php';
      require_once 'view/contacto.php';
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
	   	header('Location: index.php?c=usuario&a=registroVista&errorRegistro='.$_REQUEST['usuario']."&nb=".$_REQUEST['nombre']."&ap=".$_REQUEST['apellido'].
	   	"&us=".$_REQUEST['usuario']."&em=".$_REQUEST['email']."&fn=".$_REQUEST['fechaNac']."&nt=".$_REQUEST['nroTarjeta']);
	 	}elseif($this->model->obtenerxUoE($_REQUEST['email'])) {
	 		header('Location: index.php?c=usuario&a=registroVista&errorRegistro='.$_REQUEST['email']."&nb=".$_REQUEST['nombre']."&ap=".$_REQUEST['apellido'].
	   	"&us=".$_REQUEST['usuario']."&em=".$_REQUEST['email']."&fn=".$_REQUEST['fechaNac']."&nt=".$_REQUEST['nroTarjeta']);
	 	}else {
	    $this->model->registrar($usr);
	    header('Location: index.php?exito=1');
	 	}
    }
    
	public function actualizar() {
		$usr=new Usuario();
	    
	    $usr->__SET('id',$_REQUEST['usuarioID']);
	    $usr->__SET('nombre',$_REQUEST['nombre']);
	    $usr->__SET('apellido',$_REQUEST['apellido']);
	    $usr->__SET('email',$_REQUEST['email']);
	    $usr->__SET('fecha_nac',$_REQUEST['fechaNac']);
	    $usr->__SET('nro_tarjeta',$_REQUEST['nroTarjeta']);
	    
	    if($this->model->compararEmail($_REQUEST['usuarioID'],$_REQUEST['email'])) {
	    	$this->model->modificar($usr);
	    	header('Location: index.php?c=usuario&a=vistaPerfil&exito=1');
	 	}else {
	    	if($this->model->obtenerxUoE($_REQUEST['email'])) {
	 			header('Location: index.php?c=usuario&a=vistaPerfil&errorRegistro='.$_REQUEST['email']);
	 		}else {
	    		$this->model->modificar($usr);
	    		header('Location: index.php?c=usuario&a=vistaPerfil&exito=1');
	 		}
		}    
    }
    
	public function darDeBaja() {
		$ofActivas=new OfertasModel();		
		if(count($ofActivas->getOfertasActivas($_REQUEST['id'])) > 0 ) {		
				header('Location: index.php?c=usuario&a=vistaPerfil&errorBaja='.count($ofActivas->getOfertasActivas($_REQUEST['id'])));
		}else {
			$subActivas=new SubastaModel();
			if(count($subActivas->listarHS($_REQUEST['id'])) > 0) {
					header('Location: index.php?c=usuario&a=vistaPerfil&errorBaja2='.count($subActivas->listarHS($_REQUEST['id'])));	
			}else {
				$usr=$this->model->obtenerPorID($_REQUEST['id']);
				$this->model->eliminar($_REQUEST['id'],$usr->__GET('nombreUsuario'));
				$this->logout();
			}	
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
 	//----------------Agregado 14-07-------------------//
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
			$menu=1;        
        $control1=1;
        if(isset($_POST['inicio']) && isset($_POST['fin']) ) {
        if($_POST['inicio'] == NULL || $_POST['fin'] == NULL){
            $control1= "debe elegir dos fechas";
        }
       if($_POST['inicio'] > $_POST['fin']){
            $control1= 'fecha "fin" debe ser mayor a fecha "inicio"';
        }
     }        
        /*controlar si la lista viene vacia asignarle a control mensaje de lista vacia*/
        
        require_once 'view/headerLogueado.php';
        require_once 'view/historialUsuario.php';
        require_once 'view/footer.php';           
                 
 	}
    
        public function rangoUsuarios(){
        //control de parametros
				$menu=2;            
            $control=1;
            if($_POST['inicio'] == NULL || $_POST['inicio'] == NULL){
                $control= "debe elegir dos fechas";
            }
           if($_POST['inicio'] > $_POST['fin']){
                $control= 'fecha "fin" debe ser mayor a fecha "inicio"';
            }

            require_once 'view/headerLogueado.php';
            require_once 'view/historialUsuario.php';
            require_once 'view/footer.php';           

 	}
 	
	public function ofertasActivas() {
			$menu=5;
			 require_once 'view/headerLogueado.php';
          require_once 'view/historialUsuario.php';
          require_once 'view/footer.php'; 
	} 	
 	
    public function vistaNotificaciones(){
    			$menu=3;
            require_once 'view/headerLogueado.php';
            require_once 'view/historialUsuario.php';
            require_once 'view/footer.php';           

 	}
   public function vistaPerfil() {
		   	$menu=6;
		   	if(isset($_REQUEST['errorRegistro'])) {
		   		$error=$_REQUEST['errorRegistro'];
		   	}
		   	if(isset($_REQUEST['exito'])) {
		   		$exito="Los datos han sido Actualizado correctamente";
		   	}
		   	if(isset($_REQUEST['errorBaja'])) {
		   		$error1="ERROR: ustede tiene ofertas activas pendientes, 
		   					por favor dese de baja en dichas ofertas y vuelva para intentarlo";
		   	}
		   	if(isset($_REQUEST['errorBaja2'])) {
		   		$error1="ERROR: ustede tiene subastas activas pendientes, 
		   					por favor dese de baja en dichas subastas y vuelva para intentarlo";
		   	}
            require_once 'view/headerLogueado.php';
            require_once 'view/historialUsuario.php';
            require_once 'view/footer.php';    
   }
   
    public function vistaMensajes(){
    			$menu=4;
            require_once 'view/headerLogueado.php';
            require_once 'view/historialUsuario.php';
            require_once 'view/footer.php';           

 	}
    public function vistaMensajesError(){
            $menu=4;
            require_once 'view/headerLogueado.php';
            require_once 'view/historialUsuario.php';
            require_once 'view/footer.php';           

 	}
 	
 	public function vistaHSub(){
            $menu=7;
            require_once 'view/headerLogueado.php';
            require_once 'view/historialUsuario.php';
            require_once 'view/footer.php';           

 	}
 	
    
    public function vistaContacto(){
            require_once 'view/headerLogueado.php';
            require_once 'view/contacto.php';
            require_once 'view/footer.php';           

 	}
 	/*>>>>>>>>>>>>>>nuevo agregado 17/07/2015 <<<<<<<<<<<<<<*/ 
    public function resetearPasw(){

        $h=$this->model->obtenerxUoE($_POST['user']);
        if( $h == false ){/*el user o pasw No son correctos*/
            header('Location: index.php?errorLogin=true');
        }else{
            $pasw=$h->__GET('pasw');
            $idReceptor=$h->__GET('id');
            /*genera nuevo pasw aleatorio*/
            //$nuevoPasw=$this->RandomString();
            
/*>>>>>>>>>>>>>>>>>>enviar pasword por mail y escribir el pasw nuevo en bd<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<*/
            
            /*agregar notificacion de pas*/
            $not= new NotificacionesController();
            $not->notificacionRecuperarPasw($idReceptor,"recuperar contraseña","se ah recuperado su contraseña->".$pasw);
            
            /*volver a index y poner un cartel de que se recupero contraseña*/
             header('Location: index.php?recuLogin=true');
        }
 	}
    
    /*lenght largo de string---uc caracteres en mayuscula y minuscula---n numericos--- sc caracteres especiales*/
    function RandomString($length=10,$uc=TRUE,$n=TRUE,$sc=FALSE)
    {
        $source = 'abcdefghijklmnopqrstuvwxyz';
        if($uc==1) $source .= 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        if($n==1) $source .= '1234567890';
        if($sc==1) $source .= '|@#~$%()=^*+[]{}-_';
        if($length>0){
            $rstr = "";
            $source = str_split($source,1);
            for($i=1; $i<=$length; $i++){
                mt_srand((double)microtime() * 1000000);
                $num = mt_rand(1,count($source));
                $rstr .= $source[$num-1];
            }
        }
        return $rstr;
    }
}
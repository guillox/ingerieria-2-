<?php
    require_once 'model/notificaciones.entidad.php';
    require_once 'model/notificaciones.model.php';
    require_once 'model/usuarios.model.php';
    require_once 'model/subasta.model.php';

    class NotificacionesController
    {
        private $model;
    
        public function __CONSTRUCT()
        {
            $this->model = new NotificacionesModel();
        }
        
         public function listarNotificaciones($id)
        {
            return $this->model->listarMisNotificaciones($id);
        }
        
        public function listarMensajesAdmin()
        {
            $id=0;
            return $this->model->listarMisNotificaciones($id);
        }
        
        public function marcarLeido()
        {
            $this->model->marcarLeido($_REQUEST["idNot"]);
              
            header('Location: index.php?c=usuario&a=vistaNotificaciones');
        }
        
        public function eliminarNotificacion()
        {
            $this->model->eliminar($_REQUEST["idNot"]);
              
            header('Location: index.php?c=usuario&a=vistaNotificaciones');
        }
        
        /*admin*/
         public function eliminarNotificacionAdmin()
        {
            $this->model->eliminar($_REQUEST["idNot"]);
              
            header('Location: index.php?c=usuario&a=vistaMensajes');
        }
        
        public function marcarLeidoAdmin()
        {
            $this->model->marcarLeido($_REQUEST["idNot"]);
              
            header('Location: index.php?c=usuario&a=vistaMensajes');
        }
        
        
        public function insertarRespuestaAdmin()
        {
            /*optener el id del receptor*/
            $receptor= new UsuarioModel();
            $rec=$receptor->obtenerxUoE($_POST['receptor']);
            if($rec == false){ /*error al ingresar receptor*/
                $mje=$_POST['mesaje'];
                $receptor=$_POST['receptor'];
                header("Location: index.php?c=usuario&a=vistaMensajesError&receptor=$receptor&mje=$mje");   
            }else{  
           
            $idReceptor=$rec->__GET('id');
            $not = new Notificaciones();
            
                $not->__SET('emisorID', $_POST['emisor']);
				$not->__SET('receptorID',  $idReceptor);
				$not->__SET('asunto',"Mensaje Admin");
				$not->__SET('mensaje', $_POST['mesaje']);
				$not->__SET('fecha', date("Y-m-d"));
    
            $this->model->altaNotificacion($not);
            $notifi="<h4>Mensaje Enviado </h4>";    
            header("Location: index.php?c=usuario&a=vistaMensajes&notifi=$notifi");
            }
        }
        
        public function insertarPreguntaAdmin()
        {
            $idReceptor=0;
            $not = new Notificaciones();
            
                $not->__SET('emisorID', $_POST['emisor']);
				$not->__SET('receptorID',  $idReceptor);
				$not->__SET('asunto',"pregunta contacto");
				$not->__SET('mensaje', $_POST['pregunta']);
				$not->__SET('fecha', date("Y-m-d"));
    
            $this->model->altaNotificacion($not);
                
            $contact="<h4>Mensaje Enviado </h4>";    
            header("Location: index.php?c=usuario&a=vistaContacto&contact=$contact");
            
        }
        
        
        /*id emisor quien manda el mje ($_SESION[idUser])
            idSubasta  es el id de la subasta actual
            asunto y asunto de la notificacion*/
        
        public function insertarNotificacion($idEmisor,$idSubasta,$asunto,$mje)
        {
            /*optener el id del dueño de la subasta (receptor)*/
            $sub= new SubastaModel();
            /*se presupone que la subasta existe porque se le realiza una oferta o comentario*/
            $h=$sub->obtener($idSubasta);
            /*recupera el id del dueño de la subasta*/
            $idReceptor=$h->__GET('usuarioID');
            
            $not = new Notificaciones();
            
                $not->__SET('emisorID', $idEmisor);
				$not->__SET('receptorID',  $idReceptor);
				$not->__SET('subastaID',  $idSubasta);
				$not->__SET('asunto',$asunto);
				$not->__SET('mensaje', $mje);
				$not->__SET('fecha', date("Y-m-d"));
    
            $this->model->altaNotificacion($not);        
        }
        
        
        /*se debe ingresar incluso receptor*/
        public function insertarNotificacionRespuesta($idReceptor,$idSubasta,$asunto,$mje)
        {
            $sub= new SubastaModel();
            $h=$sub->obtener($idSubasta);
            /*el emisor de la respuesta es el dueño de la subasta*/
            $not = new Notificaciones();
            $idEmisor=$h->__GET('usuarioID');
            
                $not->__SET('emisorID', $idEmisor);
				$not->__SET('receptorID',  $idReceptor);
				$not->__SET('subastaID',  $idSubasta);
				$not->__SET('asunto',$asunto);
				$not->__SET('mensaje', $mje);
				$not->__SET('fecha', date("Y-m-d"));
    
            $this->model->altaNotificacion($not);        
        }
         
         public function notificacionRecuperarPasw($idReceptor,$asunto,$mje)
        {
            
            /*el emisor de la respuesta es el dueño de la subasta*/
            $not = new Notificaciones();
            
                $not->__SET('emisorID', $idReceptor);
				$not->__SET('receptorID',  $idReceptor);
				$not->__SET('subastaID', NULL);
				$not->__SET('asunto',$asunto);
				$not->__SET('mensaje', $mje);
				$not->__SET('fecha', date("Y-m-d"));
    
            $this->model->altaNotificacion($not);        
        }    
    }
?>
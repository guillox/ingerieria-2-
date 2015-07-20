<?php
     require_once 'model/comentarios.entidad.php';
    require_once 'model/comentarios.model.php';
    require_once 'controller/notificaciones.controller.php';
    

    class ComentariosController
    {
        private $model;
    
        public function __CONSTRUCT()
        {
            $this->model = new ComentariosModel();
        }
        
        
/*---------usuario logueado desea ver comentarios------------*/
        public function logVerComentarios($idSubasta,$idUsuario)
        {
            /*averiguar si es su subasta*/         
            $iguales=$this->model->propio($idSubasta,$idUsuario);
            
            
            if($iguales){//es el dueño de la subasta
                /*mostrar los comentarios  con la opcion de respuesta*/
                require_once 'view/comentariosRespuesta.php';
            }else{
                /*mostrar los comentarios con la -------OPCION----- de pregunta*/
                require_once 'view/comentariosFormPreguntar.php';   
                require_once 'view/comentariosVisita.php';
            }
        
        } 
        
     
        
        /*usuario No logueado dese ver comentarios */
        public function verComentarios($idSubasta)
        {
            
            require_once 'view/comentariosVisita.php';
            
        }
        
        
        
        
/*-------------insertar pregunta-------------*/
        public function insertarComentario()
        {
            $nro=$_REQUEST['idActual'];
            
                $com=new Comentarios();
                /*id del que hace la pregunta*/
                $com->__SET('usuarioID',$_REQUEST['idUser']);
                /*id de la subasta actual*/
                $com->__SET('subastaID',$_REQUEST['idActual']);
                /*agrega fecha actual*/
                $com->__SET('fechaPregunta',date("Y-m-d H:i:s"));

                $com->__SET('pregunta',$_REQUEST['comentario']);

                //metodo registrar en usuario.model.php
                $this->model->agregarComentario($com);
                 
                
                /*agregar notificacion*/
                $not= new NotificacionesController();
                $not->insertarNotificacion($_REQUEST['idUser'],$_REQUEST['idActual'],"comentario","recibio una pregunta en la subasta");
            
             header("location: index.php?c=subasta&a=logDetalleSubasta&idActual=$nro");
            
        }
        
        
        public function insertarRespuesta()
        { 
            $this->model->agregarRespuesta($_REQUEST['idPregunta'],$_REQUEST['respuesta'],date("Y-m-d H:i:s"));
            
             $nro=$_REQUEST['idSubasta'];
            
/*>>>>>>>>>>>>>>>>agregar notificacion<<<<<<<<<<<<<<<<<<*/
            $not= new NotificacionesController();
            /*recuperar comentario por id y sacar sus datos*/
            $com= $this->model->obtener($_REQUEST['idPregunta']);
                    
            
            $mje="su pregunta fue respondida en la subasta";
            $not->insertarNotificacionRespuesta($com->__GET('usuarioID'),$_REQUEST['idSubasta'],"respuesta comentario",$mje);
            
            header("location: index.php?c=subasta&a=logDetalleSubasta&idActual=$nro"); 
        }
        
        
        public function prueba()
        {
            
            echo" <h2><br>funciona <br> </h2>";
            
        }
    
    
    }

?>

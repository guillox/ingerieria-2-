<?php
    require_once 'model/comentarios.entidad.php';
    require_once 'model/comentarios.model.php';

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
            echo"subasta ID ".$idSubasta;
            echo "usuario ID ".$idUsuario;  
            
            $iguales=$this->model->propio($idSubasta,$idUsuario);
            
            
            if($iguales){
                echo "es el dueño";
                /*mostrar los comentarios  con la opcion de respuesta*/
                require_once 'view/comentariosRespuesta.php';
                
            }else{
                echo "no es el dueño";
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
        
        /*insertar pregunta*/
        public function insertarComentario()
        {
            $com=new Comentarios();

            /*id del que hace la pregunta*/
            $com->__SET('usuarioID',$_SESSION['idUser']);
            
            /*id de la subasta actual*/
            $com->__SET('subastaID',$_REQUEST['idActual']);
            
            
            /*agrega fecha actual*/
            $com->__SET('fechaPregunta',date("Y-m-d H:i:s"));
            
            $com->__SET('pregunta',$_REQUEST['comentario']);
            
            $com->__SET('fechaRespuesta',NULL);
            $com->__SET('respuesta',NULL);
            
            
            //metodo registrar en usuario.model.php
            $this->model->agregarComentario($com);
            
        }
        
        
        public function insertarRespuesta()
        {
            
        }
        
        
        public function prueba()
        {
            
            echo" <h2><br>funciona <br> </h2>";
            
        }
    
    
    }

?>
<?php
    require_once 'model/comentarios.entidad.php';
    require_once 'model/comentarios.model.php';

    class ComentariosController
    {
        private $model;
    
        public function __CONSTRUCT(){
            $this->model = new ComentariosModel();
        }
        
        /*usuario logueado desea ver comentarios*/
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
                /*mostrar los comentarios con la opcion de pregunta*/
                
                echo"<h3>formulario para hacer la pregunta</h3>";
                
                require_once 'view/comentariosVisita.php';
                
            }
        
        }    
        
        /*usuario No logueado dese ver comentarios */
        public function verComentarios()
        {
            
            require_once 'view/comentariosVisita.php';
        }
        
    
    
    
    }

?>
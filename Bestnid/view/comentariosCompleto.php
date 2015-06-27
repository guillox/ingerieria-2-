<div class="pure-g">
<div class="pure-u-1-12">     
    <?php
        //echo "el ide sigue siendo".$_REQUEST['idActual'];
        
        require_once 'controller/comentarios.controller.php';
        
        /*genera el controlador de comentarios*/
        $com= new ComentariosController();
        // echo"---------------------------------usuario ID".$_SESSION['idUser'];
        if(isset($_SESSION['idUser'])) /*revisa si hay usuario logueado*/
        {
            echo"USUARIO LOGUEADO";
            
            /*importa las vista para un usuario logueado Dueño o visitante*/
            $com->logVerComentarios($_REQUEST['idActual'], $_SESSION['idUser']);
            
        }else{
            echo"usuario NO LOGUEADO";
            
            $com->verComentarios(); 
        }    
    

    ?>
    
    
</div></div>
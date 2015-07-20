<?php
require_once 'model/historialVenta.entidad.php';
require_once 'model/historialVenta.model.php';
require_once 'model/ofertas.model.php';
require_once 'model/subasta.model.php';

class HistorialVentaController
{
	private $model;
    
    public function __CONSTRUCT(){
        $this->model = new HistorialVentaModel();
    }
      
    public function elegirGanador() {
		  
		  $hv=new HistorialVenta();
		  
		  $hv->__SET('subastaID',$_REQUEST['idS']);
		  $hv->__SET('ofertaID',$_REQUEST['idO']);
		  
		  $of=new OfertasModel();
		  $of->eliminarAll($_REQUEST['idS']);
		  
		  $sb=new SubastaModel();
		  $sb->eliminarSubasta($_REQUEST['idS']);		  
		  
		  $this->model->insertarOferta($hv);
		  header('Location: index.php?c=ofertas&a=vistaGanadorElegido');
    }
    
    private function enviarEmail($destino) {
		$email_to=$destino;
		$email_subject="Felicitaciones!! Has Ganado!";
		$email_message="Usted ha ganado la subasta!! (PRUEBA)";
		
		$headers=  'From: '.$email_from."\r\n".'Reply-To: '.$email_from."\r\n" .'X-Mailer: PHP/' . phpversion();
		@mail($email_to, $email_subject, $email_message, $headers);
		
    }
    
}
?>
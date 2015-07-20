<?php
class Notificaciones
{
	private $id;
	private $emisorID;
	private $receptorID;
	private $subastaID;
    private $asunto;
    private $mensaje;
    private $fecha;
    private $leido;
   
	
	public function __GET($k){ return $this->$k; }
	public function __SET($k, $v){ return $this->$k = $v; }

}
<?php
class Ofertas
{
	private $id;
	private $usuarioID;
	private $subastaID;
	private $monto;
	private $necesidad;
	private $fecha;
	
	public function __GET($k){ return $this->$k; }
	public function __SET($k, $v){ return $this->$k = $v; }
}
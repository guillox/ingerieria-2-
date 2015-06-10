<?php

class HistorialVenta
{
	private $id;
	private $subastaID;
	private $ofertaID;
	private $comision;
	private $nombre;
	private $descripcion;
	
	public function __GET($k){ return $this->$k; }
	public function __SET($k, $v){ return $this->$k = $v; }

}
<?php
class Subasta{
	private $id;
	private $usuarioID;
	private $categoriaID;
	private $nombre;
	private $descripcion;
	private $imagen;
	private $fecha_inicio;
	private $fecha_fin;
	
	public function __GET($k){ return $this->$k; }
	public function __SET($k, $v){ return $this->$k = $v; }
	
}
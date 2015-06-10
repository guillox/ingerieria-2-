<?php

class Comentarios
{
	private $id;
	private $usuarioID;
	private $subastaID;
	private $pregunta;
	private $respuesta;
	
	public function __GET($k){ return $this->$k; }
	public function __SET($k, $v){ return $this->$k = $v; }
}
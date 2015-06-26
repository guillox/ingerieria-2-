<?php

class Comentarios
{
	private $id;
	private $usuarioID;
	private $subastaID;
    private $fechaPregunta;
	private $pregunta;
    private $fechaRespuesta;
	private $respuesta;
	
	public function __GET($k){ return $this->$k; }
	public function __SET($k, $v){ return $this->$k = $v; }
}
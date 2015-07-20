<?php
class Usuario
{
	private $id;
	private $nombre;
	private $apellido;
	private $email;
	private $fecha_nac;
	private $fecha_registro;
	private $nro_tarjeta;
	private $nombreUsuario;
	private $pasw;
   private $admin;
	
	public function __GET($k){ return $this->$k; }
	public function __SET($k, $v){ return $this->$k = $v; }
}
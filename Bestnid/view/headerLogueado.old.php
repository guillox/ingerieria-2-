<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Subastas Bestnid</title>
	<link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" type="text/css" href="view/css/menu.css">
	
	<link rel="stylesheet" type="text/css" href="view/css/estilos.css">
	<!-- <script src="javascript/jquery-1.11.3.min.js"></script>-->
	<!--<script src="javascript/menu.js"></script>-->
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">
	
	

</head>
<body>
	<!-- Encabezado de pagina-->
	<header class="cabecera col-xs-12 col-sm-6 col-md-8 col-lg-12">
		<div class="contenedorlogo">
			<div class="imagenlogo"> 
				<img src="view/img/logo.png">
			</div>
			<div class="sombralogo"> </div>
		</div>
			

		<h1 class="titulo">Subasta Bestnid</h1>
			
			
	
		</div>
			<a href="#" class="ayuda"> Ayuda </a>
			
			<a href="?c=usuario&a=listarSubasta" class="logueado">Bienvenido <?php echo $_SESSION['username']?></a>
			<a href="?c=usuario&a=logout" class="cerrarSesion">Cerrar Sesion</a>
			
			
			
		<nav> 
			<ul class="nav nav-pills">
					<li role="menuinicio" class="active"><a href="#">Inicio</a></li>
					<li role="menucategoria"><a href="?c=usuario&a=vistaEnConstruccion">Categoria</a></li>
					<li role="menuayuda"><a href="?c=usuario&a=vistaEnConstruccion">Ayuda</a></li>
					<li role="menucontacto"><a href="?c=usuario&a=vistaEnConstruccion">Contacto</a></li>
			</ul>
		</nav>

		<!--buscador-->
		<div class="row buscar">
  			<div class="col-lg-6">
	    		<div class="input-group">
	      			<input type="text" class="form-control" placeholder="Buscar">
	      			<span class="input-group-btn">
	        			<button class="btn btn-default" type="button">Buscar</button>
	      			</span>
	    		</div><!-- /input-group -->
	  		</div><!-- /.col-lg-6 -->
		</div><!-- /.row -->
		
	</header>
	<!-- menu de navegacion -->
	

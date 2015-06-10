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
			
			<div class="container">
				<button type="button" href class="btn btn-default botoni" data-toggle="modal" data-target="#miventana">
					Iniciar sesion
				</button>
				
				

				<div class="modal fade" id="miventana">
					<div class="modal-dialog modal-lg">
						<div class="modal-content">
							<div class="modal-header">
								<button class="salirx" type="button" close="close" data-dismiss="modal">&times;</button>
								<h4 class="modal-title tituloi">Iniciar Sesion</h4>
								
								<form class="form-horizontal" role="form" action="?c=usuario&a=loguear" method="post">
  									<div class="form-group">
    									<label for="usuario" class="col-lg-2 control-label">Usuario</label>
    									<div class="col-lg-10">
      										<input type="text" class="form-control" id="usuario" name="usuario" placeholder="">
    									</div>

      
  									</div>
  									<div class="form-group">
    									<label for="pass" class="col-lg-2 control-label">Contraseña</label>
    									<div class="col-lg-10">
      										<input type="password" class="form-control" id="pass" name="pass" placeholder="Contraseña">
    									</div>
  									</div>
  									<!-- <div class="form-group">
    									<div class="col-lg-offset-2 col-lg-10">
      										<div class="checkbox">
        										<label>
          											<input type="checkbox"> No cerrar sesión 
        										</label>
      										</div>
    									</div>
  									</div> -->
  									<div class="form-group">
    									<div class="col-lg-offset-2 col-lg-10">
      										<button type="submit" class="btn btn-default">Entrar</button>
    									</div>
  									</div>
								</form>
							</div>
						<!--	<div class="modal-body"></div>
							 <div class="modal-footer">
								<a class="btn btn-block btn-social btn-facebook">
    								<i class="fa fa-facebook"></i> Ingrese con facebook
  								</a>
								<button type="button" class="btn btn-primary" data-dismiss="modal">cerrar</button>
							</div> -->
						</div>
					</div>	
				</div>
			</div>
			

			<!-- <a href="#" class="iniciarSesion">Iniciar sesion</a> -->
			
			<!-- Indica una acción exitosa o positiva -->
			<!--<button type="button" class="btn btn-success botonr" onclick="">Registrarse</button>-->
			<!-- <a href="#" class="registrase">registrarse</a>-->
			<a href="?c=usuario&a=registroVista" class="btn btn-success botonr">Registrarse</a>
		</div>
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
		
		<!-- 
		<div class="menu_bar">
			<a href="#" class="bt-menu"><span class="icon-list2"></span>Menú</a>
		</div>
 
		<nav>
			<ul>
				<li><a href="#"><span class="icon-house"></span>Inicio</a></li>
				<li><a href="#"><span class="icon-suitcase"></span>Trabajos</a></li>
				<li class="submenu">
					<a href="#"><span class="icon-rocket"></span>Proyectos<span class="caret icon-arrow-down6"></span></a>
					<ul class="children">
						<li><a href="#">SubElemento #1 <span class="icon-dot"></span></a></li>
						<li><a href="#">SubElemento #2 <span class="icon-dot"></span></a></li>
						<li><a href="#">SubElemento #3 <span class="icon-dot"></span></a></li>
					</ul>
				</li>
				<li><a href="#"><span class="icon-earth"></span>Servicios</a></li>
				<li><a href="#"><span class="icon-mail"></span>Contacto</a></li>
			</ul>
		</nav>
		-->

	</header>
	<!-- menu de navegacion -->
	

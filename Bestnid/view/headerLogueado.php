<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Subastas Bestnid</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<!-- <link rel="stylesheet" type="text/css" href="view/css/menu.css"> -->
	
	<link rel="stylesheet" type="text/css" href="view/css/estilos.css">
	
	<link rel="stylesheet" href="view/css/bootstrap.min.css">

</head>

<body>
	<!-- Encabezado de pagina-->
	<header class="cabecera col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<div class="contenedorlogo">
			<div class="imagenlogo"> 
				<img src="view/img/logo.png" class="img-responsive">
			</div>
			<div class="sombralogo"> </div>
		</div>
		<div class="page-header">
    		<h1 class="titulo col-xs-6 col-sm-6">Subasta Bestnid</h1>
		</div>
		

		<a href="?c=usuario&a=listarSubasta" class="logueado"><img src="view/img/icono-usuario.png" class="img-login">&nbspBienvenido <?php echo $_SESSION['username']?></a><br />
		<a href="?c=usuario&a=logout" class="cerrarSesion">Cerrar Sesion</a>

<!-- 	Menu de Navegacion -->

		<nav class="navbar navbar-default">
  			<div class="container-fluid">
    		<!-- Brand and toggle get grouped for better mobile display -->
    			<div class="navbar-header">
      				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        				<span class="sr-only">Boton navegacion</span>
        				<span class="icon-bar"></span>
        				<span class="icon-bar"></span>
        				<span class="icon-bar"></span>
      				</button>
                    
                    
                    <!---------------- primer boton---------------->
                    <a class="navbar-brand" href="index.php?c=usuario&s=true">Bestnid</a>
    			
                
                </div>

    			<!-- Collect the nav links, forms, and other content for toggling -->
    			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      				<ul class="nav navbar-nav">
        				<li class="dropdown">
          					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Categoria<span class="caret"></span></a>
		      				<ul class="dropdown-menu" role="menu">
                                
                                                              
<?php  /*>>>>>>>>>>>>>>>>>>>>>>>>>>>>> AGREGADO <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<*/
                                require_once 'controller/categoria.controller.php';
                                $categoria= new CategoriaController();
                                $listado=$categoria->verCategoria();
                                /*asumo que siempre va a ver alguna categoria*/
                                foreach($listado as $r):
?>
                                    <li><a <?php echo 'href="?c=categoria&a=listarSubastasCategoriaLog&nombre='.$r->__GET('nombre').'&idActual='.$r->__GET('id').'">'.$r->__GET('nombre'); ?></a></li>
                                
                                                              
<?php
                                endforeach;
?>

		            	<!--		<li><a href="#">subastas con mejor puntaje</a></li>   -->
                               
                                
		      				</ul>
        				</li>
        				<li><a href="ayuda.html">Ayuda</a></li>
        				<li><a href="contacto.html">Contacto</a></li>
                        
        				<li><a href="?c=subasta&a=vistaNuevaSubasta">Subastar</a></li>
      				</ul>
      				<form class="navbar-form navbar-left" role="search" action="?c=subasta&a=vistaLBusqueda" method="post">
        					<div class="form-group formBusqueda">
          					<input type="text" class="form-control" name="buscar" placeholder="Buscar">
        						<input type="submit" class="btn btn-default" value="Buscar">
        					</div>
      				</form>
      			</div><!-- /.navbar-collapse -->
  			</div><!-- /.container-fluid -->
		</nav>

	</header> 

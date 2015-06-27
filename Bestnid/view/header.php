<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Subastas Bestnid <?php if(isset($_REQUEST['titulo'])){
		echo - $_REQUEST['titulo'];} ?></title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<!-- <link rel="stylesheet" type="text/css" href="view/css/menu.css"> -->
	
	<link rel="stylesheet" type="text/css" href="view/css/estilos.css">
	
	<link rel="stylesheet" href="view/css/bootstrap.min.css">
		<script src="view/js/jquery-1.11.3.min.js"></script>
		<script type="text/javascript">
$(document).ready(function(){
                         
      var consulta;
             
      //hacemos focus
      $("#usuario").focus();
                                                 
      //comprobamos si se pulsa una tecla
      $("#usuario").keyup(function(e){
             //obtenemos el texto introducido en el campo
             consulta = $("#usuario").val();
                                      
             //hace la búsqueda
             $("#resultado").delay(1000).queue(function(n) {      
                                           
                  $("#resultado").html('<img src="ajax-loader.gif" />');
                                           
                        $.ajax({
                              type: "POST",
                              url: "/db/validarUsuarioDB.php",
                              data: "b="+consulta,
                              dataType: "html",
                              error: function(){
                                    alert("error petición ajax");
                              },
                              success: function(data){                                                      
                                    $("#resultado").html(data);
                                    n();
                              }
                  });
                                           
             });
                                
      });
                          
});
</script>
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
							<div class="form-horizontal" role="form">
  								<div class="form-group">
    								<div class="row omb_row-sm-offset-3">
										<div class="col-xs-12 col-sm-6">	
			    							<form class="omb_loginForm" action="?c=usuario&a=loguear" autocomplete="off" method="POST">
												<div class="input-group">
													<span class="input-group-addon glyphicon glyphicon-user"><i class="fa fa-user"></i></span>
													<input type="text" class="form-control" id="usuario" name="usuario" placeholder="Correo ó Usuario" required="">
												</div>
												<span class="help-block"></span>
												<div class="input-group">
													<span class="input-group-addon glyphicon glyphicon-asterisk"><i class="fa fa-lock"></i></span>
													<input  type="password" class="form-control" id="pass" name="pass" placeholder="Contraseña" required="">
												</div>
                    							<!--<span class="help-block">Password erroneo</span>-->
												<button class="btn btn-lg btn-primary btn-block" type="submit">Entrar</button>
											</form>
										</div>
    								</div>
								<!--<div class="row omb_row-sm-offset-3">
									<div class="col-xs-12 col-sm-3">
										<label class="checkbox">
										<input type="checkbox" value="remember-me">Recordar
										</label>
									</div>
									<div class="col-xs-12 col-sm-3">
										<p class="omb_forgotPwd">
											<a href="#">Se olvido la contraseña?</a>
										</p>
									</div>
								</div>	-->    	
							</div>
							</div>
						<div class="modal-body"></div>
						<!--<div class="modal-footer">
							<div class="omb_login">
    							<div class="row omb_row-sm-offset-3 omb_loginOr">
									<div class="col-xs-12 col-sm-6">
										<hr class="omb_hrOr">
										<span class="omb_spanOr">o</span>
									</div>
								</div>
    							<h3 class="omb_authTitle">Iniciar Sesion ,si no estas registrado? <a href="?c=usuario&a=registroVista">Registrate</a></h3>
								<div class="row omb_row-sm-offset-3 omb_socialButtons">
    	    						<div class="col-xs-4 col-sm-2">
		        						<a href="#" class="btn btn-lg btn-block omb_btn-facebook">
			        						<i class="fa fa-facebook visible-xs"></i>
			        						<span class="hidden-xs">Facebook</span>
		        						</a>
	       	 						</div>
        							<div class="col-xs-4 col-sm-2">
		        						<a href="#" class="btn btn-lg btn-block omb_btn-twitter">
			        						<i class="fa fa-twitter visible-xs"></i>
			        						<span class="hidden-xs">Twitter</span>
		        						</a>
	        						</div>	
        							<div class="col-xs-4 col-sm-2">
		        						<a href="#" class="btn btn-lg btn-block omb_btn-google">
			        						<i class="fa fa-google-plus visible-xs"></i>
			        						<span class="hidden-xs">Google+</span>
		        						</a>
	        						</div>	
								</div>
							</div>
						</div>-->
					</div>	
				</div>
			</div>
		</div>
		<a href="?c=usuario&a=registroVista" class="btn btn-success botonr">Registrarse</a>
		
			<?php
				if(isset($_REQUEST['errorLogin'])) {
					echo '<p class="errorLogin text-center bg-danger">';
					echo "Error en el inicio de sesion </p>";				
				}
			?>		

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
      				<a class="navbar-brand" href="index.php">Bestnid</a>
    			</div>

    			<!-- Collect the nav links, forms, and other content for toggling -->
    			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      				<ul class="nav navbar-nav">
        				<li class="dropdown">
          					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Categoria<span class="caret"></span></a>
		      				<ul class="dropdown-menu" role="menu">
		            			<li><a href="#">Accesorio Auto</a></li>
		            			<li><a href="#">Computacion</a></li>
		            			<li><a href="#">Ropa</a></li>
		            			<li class="divider"></li>
		            			<li><a href="#">Deporte</a></li>
		            			<li class="divider"></li>
		            			<li><a href="#">Revistas</a></li>
		      				</ul>
        				</li>
        				<li><a href="ayuda.html">Ayuda</a></li>
        				<li><a href="contacto.html">Contacto</a></li>
      				</ul>
      				<form class="navbar-form navbar-left" role="search" action="?c=subasta&a=vistaBusqueda" method="post">
        					<div class="form-group">
          					<input type="text" class="form-control" name="buscar" placeholder="Buscar" >
        						<input type="submit" class="btn btn-default" value="Buscar">
        					</div>
      				</form>
      			</div><!-- /.navbar-collapse -->
  			</div><!-- /.container-fluid -->
		</nav>
	<!--	<div class="row">
      <div class="col-1-2">
        <h2>1/2</h2>
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid cum quasi nulla molestias accusamus aspernatur reiciendis qui optio tenetur modi repellendus distinctio dolore nesciunt. Repellat provident explicabo accusamus autem perspiciatis.
      </div>
      <div class="col-1-2">
        <h2>1/2</h2>
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid cum quasi nulla molestias accusamus aspernatur reiciendis qui optio tenetur modi repellendus distinctio dolore nesciunt. Repellat provident explicabo accusamus autem perspiciatis.
      </div>
    </div><
    
    <div class="row">
      <div class="col-2-3">
        <h2>2/3</h2>
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid cum quasi nulla molestias accusamus aspernatur reiciendis qui optio tenetur modi repellendus distinctio dolore nesciunt. Repellat provident explicabo accusamus autem perspiciatis.
      </div>
      <div class="col-1-3">
        <h2>1/3</h2>
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid cum quasi nulla molestias accusamus aspernatur reiciendis qui optio tenetur modi repellendus distinctio dolore nesciunt. Repellat provident explicabo accusamus autem perspiciatis.
      </div>
    </div>
    
    <div class="row">
      <div class="col-1-4">
        <h2>1/4</h2>
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid cum quasi nulla molestias accusamus aspernatur reiciendis qui optio tenetur modi repellendus distinctio dolore nesciunt. Repellat provident explicabo accusamus autem perspiciatis.
      </div>
      <div class="col-1-4">
        <h2>1/4</h2>
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid cum quasi nulla molestias accusamus aspernatur reiciendis qui optio tenetur modi repellendus distinctio dolore nesciunt. Repellat provident explicabo accusamus autem perspiciatis.
      </div>
      <div class="col-1-4">
        <h2>1/4</h2>
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid cum quasi nulla molestias accusamus aspernatur reiciendis qui optio tenetur modi repellendus distinctio dolore nesciunt. Repellat provident explicabo accusamus autem perspiciatis.
      </div>
      <div class="col-1-4">
        <h2>1/4</h2>
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid cum quasi nulla molestias accusamus aspernatur reiciendis qui optio tenetur modi repellendus distinctio dolore nesciunt. Repellat provident explicabo accusamus autem perspiciatis.
      </div>
    </div>
    
    <div class="row">
      <div class="col-1-8">
        <h2>1/8</h2>
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid cum quasi nulla molestias accusamus aspernatur reiciendis qui optio tenetur modi repellendus distinctio dolore nesciunt. Repellat provident explicabo accusamus autem perspiciatis.
      </div>
      <div class="col-1-8">
        <h2>1/8</h2>
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid cum quasi nulla molestias accusamus aspernatur reiciendis qui optio tenetur modi repellendus distinctio dolore nesciunt. Repellat provident explicabo accusamus autem perspiciatis.
      </div>
      <div class="col-1-8">
        <h2>1/8</h2>
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid cum quasi nulla molestias accusamus aspernatur reiciendis qui optio tenetur modi repellendus distinctio dolore nesciunt. Repellat provident explicabo accusamus autem perspiciatis.
      </div>
      <div class="col-1-8">
        <h2>1/8</h2>
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid cum quasi nulla molestias accusamus aspernatur reiciendis qui optio tenetur modi repellendus distinctio dolore nesciunt. Repellat provident explicabo accusamus autem perspiciatis.
      </div>
      <div class="col-1-8">
        <h2>1/8</h2>
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid cum quasi nulla molestias accusamus aspernatur reiciendis qui optio tenetur modi repellendus distinctio dolore nesciunt. Repellat provident explicabo accusamus autem perspiciatis.
      </div>
      <div class="col-1-8">
        <h2>1/8</h2>
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid cum quasi nulla molestias accusamus aspernatur reiciendis qui optio tenetur modi repellendus distinctio dolore nesciunt. Repellat provident explicabo accusamus autem perspiciatis.
      </div>
      <div class="col-1-8">
        <h2>1/8</h2>
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid cum quasi nulla molestias accusamus aspernatur reiciendis qui optio tenetur modi repellendus distinctio dolore nesciunt. Repellat provident explicabo accusamus autem perspiciatis.
      </div>
      <div class="col-1-8">
        <h2>1/8</h2>
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid cum quasi nulla molestias accusamus aspernatur reiciendis qui optio tenetur modi repellendus distinctio dolore nesciunt. Repellat provident explicabo accusamus autem perspiciatis.
      </div>
    </div>
  </div>-->
	</header> 


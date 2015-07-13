<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Subastas Bestnid 
    <?php if(isset($_REQUEST['titulo'])){
		        echo - $_REQUEST['titulo'];} ?>
  </title>
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
	<?php 
      require_once 'header.php';
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
          <!-- -------------primer boton----------------->
      		<a class="navbar-brand" href="index.php">Bestnid</a>
    	
                
                </div>

    			<!-- Collect the nav links, forms, and other content for toggling -->
    			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      				<ul class="nav navbar-nav">
        				<li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Categoria<span class="caret"></span></a>
		      				  <ul class="dropdown-menu" role="menu">
                      <!--			<li><a href="#">subastas con mejor puntaje</a></li>   -->
		      				  </ul>
                </li>
        				<li><a href="view/contacto.php">Contacto</a></li>
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
	
	</header> 
</body>

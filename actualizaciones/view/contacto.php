
<address>
  <strong>Desarrollado</strong><br>
  Grupo 45<br>
  Facultad de informatica<br>
  <abbr title="Celular">Cel:</abbr> (2901)610565
</address>

<address>
  <strong>Comunicarse con los administradores:</strong><br>
  <a href="mailto:#">Administrador@Gmail.com</a><br>
  <strong>Datos Completos:</strong><br>
  <a href="mailto:#">Guillox22@Gmail.com</a>
</address>

<?php 
if(isset($_SESSION['idUser'])) { ?>

    <h4>realizar una pregunta a un Admin</h4>

    <?php if( isset($_REQUEST['contact']) ){ echo $_REQUEST['contact'];}   ?>

    <form action="?c=notificaciones&a=insertarPreguntaAdmin" method="post" >
        <input type="hidden" name="emisor" value="<?php echo $_SESSION['idUser'];?>">

        <textarea name="pregunta" placeholder="ingrese su pregunta" required=""></textarea>
        <input type="submit">
    </form>

<br><br>


<?php
}
?>
    <style>
      #map-container { height: 300px }
    </style>

    <div id="map-container" class="col-md-6"></div>
 
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.1.1/js/bootstrap.min.js"></script>
    <script src="http://maps.google.com/maps/api/js?sensor=false"></script>
    <script>	
 
      function init_map() {
		var var_location = new google.maps.LatLng(-34.902862,-57.93771);
 
        var var_mapoptions = {
          center: var_location,
          zoom: 14
        };
 
		var var_marker = new google.maps.Marker({
			position: var_location,
			map: var_map,
			title:"Grupo45"});
 
        var var_map = new google.maps.Map(document.getElementById("map-container"),
            var_mapoptions);
 
		var_marker.setMap(var_map);	
 
      }
 
      google.maps.event.addDomListener(window, 'load', init_map);
 
    </script>

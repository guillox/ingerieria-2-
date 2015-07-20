<?php
$user = $_POST['b'];
       
      if(!empty($user)) {
            comprobar($user);
      }
       
      function comprobar($b) {
            $con = mysql_connect('localhost','root', 'root');
            mysql_select_db('masajes', $con);
       
            $sql = mysql_query("SELECT * FROM clientes WHERE usuario = '".$b."'",$con);
             
            $contar = mysql_num_rows($sql);
             
            if($contar == 0){
                  echo "<span style='font-weight:bold;color:green;'>Disponible.</span>";
            }else{
                  echo "<span style='font-weight:bold;color:red;'>El nombre de usuario ya existe.</span>";
            }
      } 
?>
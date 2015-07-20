<div>

  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
      <li role="presentation" class=""><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Historial Subasta</a></li>
        <li role="presentation" class=""><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Perfil</a></li>
        <li role="presentation" class=""><a href="#Notificaciones" aria-controls="Notificaciones" role="tab" data-toggle="tab">Notificaciones</a></li>
      
      <?php /*controlar si es administrador*/
        if($this->esAdmin() ){
    ?>
        <li role="presentation" class=""><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">Mensajes</a></li>
        <li role="presentation" class=""><a href="#Usuarios" aria-controls="Usuarios" role="tab" data-toggle="tab">Usuarios</a></li>
        <li role="presentation" class="active"><a href="#Subastas" aria-controls="Subastas" role="tab" data-toggle="tab">Subastas</a></li>
            
 <?php    }
?>
  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
      <div role="tabpanel" class="tab-pane " id="home"><?php require_once 'view/historialSubastaUsuario.php'; ?></div>
        <div role="tabpanel" class="tab-pane" id="profile">...</div>
        <div role="tabpanel" class="tab-pane" id="Notificaciones">...</div>
      
          
      
        <div role="tabpanel" class="tab-pane" id="messages">...</div>
        <div role="tabpanel" class="tab-pane" id="Usuarios"><?php require_once 'view/reporteUsuarios.php'; ?></div>
      <div role="tabpanel" class="tab-pane active" id="Subastas"><?php require_once 'view/reporteSubastas.php'; ?></div>
      
  </div>

    
</div>
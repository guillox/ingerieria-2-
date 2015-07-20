<div>

  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation" <?php if(isset($menu)){ echo $menu==7 ? 'class="active"' : 'class=""';} ?>><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Subastas Activas</a></li>
    <li role="presentation" <?php if(isset($menu)){ echo $menu==5 ? 'class="active"' : 'class=""';} ?>><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Perfil</a></li>
	 <li role="presentation" <?php if(isset($menu)){ echo $menu==3 ? 'class="active"' : 'class=""';} ?>><a href="#Notificaciones" aria-controls="Notificaciones" role="tab" data-toggle="tab">Notificaciones</a></li>    
    <li role="presentation"><a href="#ofSubasta" aria-controls="ofSubasta" role="tab" data-toggle="tab">Ofertas de Subastas Propias</a></li>
	 <li role="presentation"><a href="#sbGanadas" aria-controls="sbGanadas" role="tab" data-toggle="tab">Subastas Ganadas</a></li>  
	 <li role="presentation"><a href="#sbRealizadas" aria-controls="sbRealizadas" role="tab" data-toggle="tab">Subastas Realizadas</a></li> 
	 <li role="presentation"><a href="#sbNoGanadas" aria-controls="sbNoGanadas" role="tab" data-toggle="tab">Subastas No Ganadas</a></li> 
	 <li role="presentation" <?php if(isset($menu)){ echo $menu==5 ? 'class="active"' : 'class=""';} ?>><a href="#ofActivas" aria-controls="ofActivas" role="tab" data-toggle="tab">Ofertas Activas</a></li> 	 
	  <?php /*controlar si es administrador*/
        if($this->esAdmin() ){
    ?>
        <li role="presentation" <?php if(isset($menu)){ echo $menu==4 ? 'class="active"' : 'class=""';} ?>><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">Mensajes</a></li>
        <li role="presentation" <?php if(isset($menu)){ echo $menu==2 ? 'class="active"' : 'class=""';} ?>><a href="#Usuarios" aria-controls="Usuarios" role="tab" data-toggle="tab">Usuarios</a></li>
        <li role="presentation" <?php if(isset($menu)){ echo $menu==1 ? 'class="active"' : 'class=""';} ?>><a href="#Subastas" aria-controls="Subastas" role="tab" data-toggle="tab">Subastas</a></li>
            
 	<?php }
	?> 
  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
    <div role="tabpanel" class="tab-pane <?php if(isset($menu)){ echo $menu==7 ? 'active' : '';} ?>" id="home"><?php require_once 'view/historialSubastaUsuario.php'; ?></div>
    <div role="tabpanel" class="tab-pane <?php if(isset($menu)){ echo $menu==6 ? 'active' : '';} ?>" id="profile"><?php require_once 'view/perfil.php'; ?></div>
    <div role="tabpanel" class="tab-pane <?php if(isset($menu)){ echo $menu==3 ? 'active' : '';} ?>" id="Notificaciones"><?php require_once 'view/reporteNotificaciones.php'; ?></div>
    <div role="tabpanel" class="tab-pane <?php if(isset($menu)){ echo $menu==4 ? 'active' : '';} ?>" id="messages"><?php require_once 'view/reporteMensajes.php'; ?></div>
    <div role="tabpanel" class="tab-pane" id="ofSubasta"><?php require_once 'view/historialOfertasSubasta.php'; ?></div>
    <div role="tabpanel" class="tab-pane" id="sbGanadas"><?php require_once 'view/subastasGanadas.php'; ?></div>
    <div role="tabpanel" class="tab-pane" id="sbRealizadas"><?php require_once 'view/subastasRealizadas.php'; ?></div>
    <div role="tabpanel" class="tab-pane" id="sbNoGanadas"><?php require_once 'view/subastasNoGanadas.php'; ?></div>
    <div role="tabpanel" class="tab-pane <?php if(isset($menu)){ echo $menu==5 ? 'active' : '';} ?>" id="ofActivas"><?php require_once 'view/ofertasActivas.php'; ?></div>
    <div role="tabpanel" class="tab-pane <?php if(isset($menu)){ echo $menu==2 ? 'active' : '';} ?>" id="Usuarios"><?php require_once 'view/reporteUsuarios.php'; ?></div>
    <div role="tabpanel" class="tab-pane <?php if(isset($menu)){ echo $menu==1 ? 'active' : '';} ?>" id="Subastas"><?php require_once 'view/reporteSubastas.php'; ?></div>
  </div>

</div>
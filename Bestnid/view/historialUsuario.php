<div>

  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Historial Subasta</a></li>
    <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Perfil</a></li>
    <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">Mensajes</a></li>
    <li role="presentation"><a href="#settings" aria-controls="settings" role="tab" data-toggle="tab">Opciones</a></li>
    <li role="presentation"><a href="#ofSubasta" aria-controls="ofSubasta" role="tab" data-toggle="tab">Ofertas de Subastas Propias</a></li>
  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="home"><?php require_once 'view/historialSubastaUsuario.php'; ?></div>
    <div role="tabpanel" class="tab-pane" id="profile">...</div>
    <div role="tabpanel" class="tab-pane" id="messages">...</div>
    <div role="tabpanel" class="tab-pane" id="settings">...</div>
    <div role="tabpanel" class="tab-pane" id="ofSubasta"><?php require_once 'view/historialOfertasSubasta.php'; ?></div>
  </div>

</div>
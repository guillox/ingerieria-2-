<div class="pure-g">
    <div class="pure-u-1-12">
        
        <br /><br />

        
<div style="clear:both;"> </div>

    
	 <?php foreach($this->model->listar($_REQUEST['buscar']) as $r): ?>
	 <article >
    <div class="contenArt">
    
       <h2><?php echo $r->__GET('nombre'); ?></h2>
       <?php
       echo "<img src=".$r->__GET('imagen').">"
       ?>
       <p><?php echo $r->__GET('descripcion'); ?></p>

    </div>
     </article>
     
    <?php endforeach; ?> 
   
<div style="clear:both;"> </div> 

    </div>
</div>
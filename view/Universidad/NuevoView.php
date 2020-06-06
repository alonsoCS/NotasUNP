<br>
<fieldset>
	<legend>Nueva Universidad</legend>
    <form method="POST" action="<?php echo URL;?>Universidad/Guardar" data-form="create" class="formulario" autocomplete="off">  
      <br>
      <div class="row">
          <div class="col-lg-8">
            <div class="input-group">
              <span class="input-group-addon" >Nombre</span>
              <input type="text"  name="nombre" class="form-control" id="nombre" autofocus required >
            </div>
          </div>
      </div>
      <br>
      <div class="row">
          <div class="col-lg-8">
            <div class="input-group">
              <span class="input-group-addon" >Ciudad :</span>
              <input type="text" class="form-control" name="ciudad" id="ciudad" required>
            </div>
          </div>
      </div>
      <br>
      <div class="row">
          <div class="col-lg-8">
            <div class="input-group">
              <span class="input-group-addon" >Rector :</span>
              <input type="text" class="form-control"  name="rector" id="rector" required >
            </div>
          </div>
      </div>
      <br>
      <div>
        <input type="submit" class="btn btn-success   icon-folder" name="crear" id="crear" value="AGREGAR">
      </div>
      
  </form>
</fieldset>



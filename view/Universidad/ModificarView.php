<fieldset>
  <legend>Modificar Universidad</legend>
    <form method="POST" action="<?php echo URL;?>Universidad/Actualizar" data-form="create" class="formulario" autocomplete="off">  
      <br>
      <div class="row">
          <div class="col-lg-8">
            <div class="input-group">
              <span class="input-group-addon" >Codigo:</span>
              <input type="text"  name="codigo" class="form-control" id="codigo" value="<?php echo $datos['CodUniversidad']; ?>" readonly >
            </div>
          </div>
      </div>
      <br>
      <div class="row">
          <div class="col-lg-8">
            <div class="input-group">
              <span class="input-group-addon" >Nombre</span>
              <input type="text"  name="nombre" class="form-control" id="nombre" value="<?php echo $datos['Nombre']; ?>" autofocus required >
            </div>
          </div>
      </div>
      <br>
      <div class="row">
          <div class="col-lg-8">
            <div class="input-group">
              <span class="input-group-addon" >Ciudad :</span>
              <input type="text" class="form-control" name="ciudad" id="ciudad" value="<?php echo $datos['Ciudad']; ?>" required>
            </div>
          </div>
      </div>
      <br>
      <div class="row">
          <div class="col-lg-8">
            <div class="input-group">
              <span class="input-group-addon" >Rector :</span>
              <input type="text" class="form-control"  name="rector" id="rector" value="<?php echo $datos['Rector']; ?>" required >
            </div>
          </div>
      </div>
      <br>
      <div>
        <input type="submit" class="btn btn-success icon-folder" name="crear" id="crear" value="ACTUALIZAR">
      </div>
      
  </form>
</fieldset>



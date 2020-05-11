<!-- Modal agregar -->
<div class="modal fade " id="ModalAgregar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Agregar Nota</h4>
      </div>
      <form method="post" action="<?php echo $helper->url("NotaCurso","Agregar"); ?>" onsubmit="return Verificar();" >
        <div class="modal-body">
          <div class="row">
            <div class="col-lg-3">
              <div class="input-group">
                <label for="codigo">Codigo :    </label>
                <input type="text" name="codigo" id="codigo"  class="form-control" readonly>
              </div>
            </div>
            <div class="col-lg-3">
              <label for="ciclo">Ciclo :    </label>
              <input type="text" name="ciclo" id="ciclo"  class="form-control " readonly>
            </div>
            <div class="col-lg-3">
              <label for="tipo">Tipo :    </label>
              <input type="text" name="tipo" id="tipo"  class="form-control" readonly>
            </div>
            <div class="col-lg-3">
              <label for="creditos">Creditos :    </label>
              <input type="text" name="creditos" id="creditos"  class="form-control " readonly>
            </div>
          </div>
          <br>
          <div class="form-group">
            <label for="nombre">NOMBRE :    </label>
            <input type="text" name="nombre" id="nombre"  class="form-control input-sm" readonly>
          </div>
          <div class="form-group">
            <label for="nota">Nota :    </label>
              <input type="number" name="nota" id="nota" placeholder="nota" max="20" min="0" maxlength="2" class="form-control input-sm" required>
          </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-warning"  id="Agregar" >Agregar</button>
      </div>
    </form>
    </div>
  </div>
</div>

<script type="text/javascript">
  function Verificar()
  {
    if(comprobar()){
      $('#ModalAgregar').modal('hide');
      return true;
    }else{
      return false;
    }
  }
  function comprobar(){
    if($('#nota').val() == ""){
      alert("Ingrese el nombre la nota");
      return false;
    }
    if($('#nota').val() > 20){
      alert("Ingrese otra nota");
      return false;
    }
    else{
      return true;
    }
  }
  function CierraPopupA() {
      //ocultamos el  modal
    $('#nota').val("");
  }
</script>
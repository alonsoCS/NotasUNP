<div>
      <h4 >Agregar Nota</h4>
      <form method="post" action="" autocomplete="off">

        <div class="row">
          <div class="col-lg-3">
              <label for="codigo">Codigo :    </label>
              <input type="text" name="codigo" id="codigo"  class="form-control" readonly>
            
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
     
        <button type="submit" class="btn btn-warning"  id="Agregar" >Agregar</button>
 
    </form>
</div>


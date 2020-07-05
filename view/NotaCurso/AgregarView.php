<div class="consulta-formulario">
    <h4 >Agregar Nota</h4>
      <form method="post" action="" autocomplete="off">
          <div class="col-3">
              <label for="codigo">Codigo :    </label>
              <input type="text" name="codigo" id="codigo"  class="campo" readonly>
          </div>
            <div class="col-3">
              <label for="ciclo">Ciclo :    </label>
              <input type="text" name="ciclo" id="ciclo"  class="campo" readonly>
            </div>
            <div class="col-3">
              <label for="tipo">Tipo :    </label>
              <input type="text" name="tipo" id="tipo"  class="form-control" readonly>
            </div>
            <div class="col-3">
              <label for="creditos">Creditos :    </label>
              <input type="text" name="creditos" id="creditos"  class="campo" readonly>
            </div>
          </div>
          <div class="col-6">
            <label for="nombre">NOMBRE :    </label>
            <input type="text" name="nombre" id="nombre"  class="campo" readonly>
          </div>
          <div class="col-3">
            <label for="nota">Nota :    </label>
              <input type="number" name="nota" id="nota" placeholder="nota" max="20" min="0" maxlength="2" class="campo" required>
          </div>
      </div>
     
        <button type="submit" class="button"  id="Agregar" >Agregar</button>
 
    </form>
</div>


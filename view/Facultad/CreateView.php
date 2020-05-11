	<br>
	<br>
<fieldset>
	<legend>Nueva Facultad</legend>
<form method="post" action="<?php echo $helper->url("Facultad","Create"); ?>" onsubmit="return Verificar();" >
		<div class="row">
			<div class="col-lg-6">
				<div class="input-group">
					<span class="input-group-addon" >Universidad :</span>
					<select id="universidades" class="form-control" name="universidades" autofocus>
						<option id="0">SELECCIONAR</option>
						<?php 
							if(isset($_POST['unis']))
							{
								$arr=$_POST['unis'];
								foreach ( $arr as $key => $value) {
						?>
						<option id="<?php echo $key; ?>">
							<?php echo $value; ?>
						</option>
						<?php
							}
						}
				 		?>
					</select>
				</div>
			</div>
		</div>
		<br>
		<div class="row">
  			<div class="col-lg-8">
  				<div class="input-group">
  					<span class="input-group-addon" >Nombre</span>
  					<input type="text"  name="nombre" class="form-control" id="nombre" autofocus>
  				</div>
  			</div>
		</div>
		<br>
		<div>
			<input type="submit" class="btn btn-success icon-folder" name="crear" id="crear" value="NUEVO">
		</div>
</form>
</fieldset>
<script type="text/javascript">
	function Verificar(){
		var name=document.getElementById("nombre").value;
		var uni=document.getElementById("universidades").value;
		if(name=="UNIVERSIDAD" || name==""){
			alert("Complete todos los campos")
			return false;
		}else{
			return true;
		}
		return false;
	}
	
</script>
<script type="text/javascript">
	/*function mensaje(){
		var city=document.getElementById("universidades").value;
		
		if(city!="SELECCIONAR")
		{
			alert("bien");
		}
	}
	document.getElementById("universidades").onclick=mensaje;*/
</script>

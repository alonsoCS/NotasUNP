
	<fieldset>
		<legend>Nueva Universidad</legend>
<form method="post" action="<?php echo $helper->url("Universidad","Create"); ?>" onsubmit="return Verificar();" >
		
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
		<div class="row">
  			<div class="col-lg-8">
  				<div class="input-group">
  					<span class="input-group-addon" >Ciudad :</span>
  					<input type="text" class="form-control" name="ciudad" id="ciudad">
  				</div>
  			</div>
		</div>
		<br>
		<div class="row">
  			<div class="col-lg-8">
  				<div class="input-group">
  					<span class="input-group-addon" >Rector :</span>
  					<input type="text" class="form-control"  name="rector" id="rector" >
  				</div>
  			</div>
		</div>
		<br>
		<div>
			<input type="submit" class="btn btn-success   icon-folder" name="crear" id="crear" value="AGREGAR">
		</div>
</form>
</fieldset>

<script type="text/javascript">
	function Verificar(){
		var name=document.getElementById("nombre").value;
		var city=document.getElementById("ciudad").value;
		var rector=document.getElementById("rector").value;

		if(name=="" || city=="" || rector==""){
			alert("Complete todos los campos")
			return false;
		}else{
			return true;
		}
	}
</script>

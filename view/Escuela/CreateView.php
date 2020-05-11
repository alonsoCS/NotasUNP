
<fieldset>
	<legend>Nueva Escuela</legend>
	<form method="post" action="<?php echo $helper->url("Escuela","Create"); ?>" onsubmit="return Verificar();" >
		<br>
		<div class="row">
  			<div class="col-lg-8">
  				<div class="input-group">
  					<span class="input-group-addon">Universidad:</span>
					<select id="universidades" name="universidades" class="form-control" autofocus>
						<option value="0">SELECCIONAR</option>
						<?php 
							if(isset($_POST['unis']))
							{
								$arr=$_POST['unis'];
								foreach ( $arr as $key => $value) 
								{
						?>
						<option value="<?php echo $key; ?>">
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
  					<span class="input-group-addon">Facultades:</span>
					<select id="facultades" name="facultades" class="form-control">
						<option value="0">SELECCIONAR</option>
					</select>
				</div>
			</div>
		</div>
		<br>
		<div class="row">
  			<div class="col-lg-8">
  				<div class="input-group">
  					<span class="input-group-addon" >Nombre</span>
  					<input type="text"  name="nombre" class="form-control" id="nombre" >
  				</div>
  			</div>
		</div>
		<br>
		<div class="row">
  			<div class="col-lg-4">
  				<div class="input-group">
  					<span class="input-group-addon">Creditos Obligatorios :</span>
					<input type="number" class="form-control" name="creO" id="creO" min="0" max="999" maxlength="3">
				</div>
			</div>
			<div class="col-lg-4">
  				<div class="input-group">
  					<span class="input-group-addon" >Creditos Electivos :</span>
					<input type="number" class="form-control" name="creE" id="creE" min="0" max="99" maxlength="2">
				</div>
			</div>
  			<div class="col-lg-4">
  				<div class="input-group">
  					<span class="input-group-addon">Codigo de Escuela :</span>	
					<input type="number" name="codigo" class="form-control" id="codigo"  min="0" max="999" maxlength="3">
					
				</div>
			</div>
		</div>
		<br>
		<div  >
			<input type="submit" class="btn btn-success " name="crear" id="crear" value="AGREGAR">
		</div>
	</form>
</fieldset>
<script type="text/javascript">
	function Verificar(){
		var name=document.getElementById("nombre").value;
		var CreO=document.getElementById("creO").value;
		var CreE=document.getElementById("creE").value;
		var escuela=document.getElementById("codigo").value;
		var uni=document.getElementById("universidades");
		var facu=document.getElementById("facultades");
		if(uni.options[uni.selectedIndex].value=='0'){
			alert("Seleccione una Universidad")
			return false;
		}else if(facu.options[facu.selectedIndex].value=='0'){
			alert("Seleccione una Facultasd")
			return false;
		}else if(name=="" && escuela=="")
		{
			alert("Ingrese el nombre o codigo de escuela");
			return false;
		}else if(CreE=="" && CreO=="")
		{
			alert("Ingrese la cantidad de creditos electivos u obligatorios");
			return false;
		}
		else{
			return true;
		}
	}
</script>
<script type="text/javascript">
	function mensaje(){
		var city=document.getElementById("universidades");
		var texto=city.options[city.selectedIndex].value;

		var SeFac=document.getElementById("facultades");
		while(SeFac.length>1)
		{
			SeFac.remove(1);
		}
		if(texto=='0'){
			

		}else{
			uniGeneral=texto;
			CargarDato(texto);
		}
		
	}
	document.getElementById("universidades").onclick=mensaje;
	function CargarDato(CodUni)
	{
		
		arreglo="<?php echo conectar();?>";
		var srrs=arreglo.split(',');
		srrs.shift();//elimina el primero
		for (var i =0; i<srrs.length; i++) {
			var facs=srrs[i].split('-');
			if(facs[1]==CodUni)
			{
				var SeFac=document.getElementById("facultades");
				var opt=document.createElement('option');
				opt.setAttribute("value",facs[2]);
				opt.innerHTML=facs[0];
				SeFac.add(opt);
			}

		}
		
	}

</script>
<?php
	function conectar(){
		if(isset($_POST['facus']))
		{
			$fac=$_POST['facus'];
			foreach ( $fac as $facu) 
			{
				$variable= $variable.",".$facu->Nombre."-".$facu->CodUniversidad."-".$facu->CodFacultad; 
			}
		}
		return $variable;
	}
	
?>
<script type="text/javascript">
	/*document.getElementById("facultades").onclick=facultad;
	function facultad()
	{
		var facu=document.getElementById("facultades");
		var valor=facu.options[facu.selectedIndex].value;
		if(valor!=0)
		{
			alert(valor);
		}
	}*/

</script>

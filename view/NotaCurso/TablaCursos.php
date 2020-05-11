
<form method="post" action="<?php echo $helper->url("Curso","Create"); ?>" onsubmit="return Verificar();" >
		Nuevo
		<br>
		<br>
		<div>
			Universidad:
			<select id="universidades" name="universidades" style="width: 250px;">
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
		<br>
		<div>
			Facultades:
			<select id="facultades" name="facultades" style="width: 250px;">
				<option value="0">SELECCIONAR</option>
				
			</select>
		</div>
		<br>
		<div>
			Escuelas:
			<select id="escuelas" name="escuelas" style="width: 250px;">
				<option value="0">SELECCIONAR</option>
				
			</select>
		</div>
		<br>
		<div>
			Ciclo:
			<select id="ciclos" name="ciclos" style="width: 130px;">
				<option value="0">SELECCIONAR</option>
				
			</select>
		</div>
		<br>
		<div>
			Nombre :
			<input type="text" name="nombre" id="nombre" maxlength="50">
			
		</div>
		<br>
		<div>
			Tipo:
			<select id="tipo" name="tipo">
				<option value="0">SELECCIONAR</option>
				<option value="O">OBLIGATORIO</option>
				<option value="E">ELECTIVO</option>
			</select>
			<label>          </label>
			Creditos:
			<input type="text" name="creditos" id="creditos" style="width: 20px;" maxlength="2">

		</div>
		
		<br>
		<div>
			<input type="submit" name="crear" id="crear" value="NUEVO">
		</div>
</form>
<script type="text/javascript">
	function Verificar(){
		var name=document.getElementById("nombre").value;
		var uni=document.getElementById("universidades");
		var facu=document.getElementById("facultades");
		var esc=document.getElementById("escuelas");
		var ciclos=document.getElementById("ciclos");
		var tipo=document.getElementById("tipo");
		var credito=document.getElementById("creditos").value;
		if(uni.options[uni.selectedIndex].value=='0'){
			alert("Seleccione una Universidad");
			return false;
		}else if(facu.options[facu.selectedIndex].value=='0'){
			alert("Seleccione una Facultad");
			return false;
		}else if(esc.options[esc.selectedIndex].value=='0'){
			alert("Seleccione una Escuela");
			return false;
		}
		else if(ciclos.options[ciclos.selectedIndex].value=='0'){
			alert("Seleccione un tipo");
			return false;
		}
		else if(tipo.options[tipo.selectedIndex].value=='0'){
			alert("Seleccione un tipo");
			return false;
		}
		else if(name=="" || credito=="")
		{
			alert("Ingrese el nombreo o los creditos del curso");
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
		var SeEsc=document.getElementById("escuelas");
		while(SeEsc.length>1)
		{
			SeEsc.remove(1);
		}
		if(texto=='0'){
			

		}else{
			
			CargarDato(texto);
		}
		
	}
	document.getElementById("universidades").onclick=mensaje;
	function CargarDato(CodUni)
	{
		
		arreglo="<?php echo TFacultades();?>";
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
<script type="text/javascript">
	function mensajeFac(){
		var city=document.getElementById("facultades");
		var texto=city.options[city.selectedIndex].value;

		var SeFac=document.getElementById("escuelas");
		while(SeFac.length>1)
		{
			SeFac.remove(1);
		}
		if(texto=='0'){
			

		}else{
			
			CargarEscuela(texto);
		}
		
	}
	document.getElementById("facultades").onclick=mensajeFac;
	function CargarEscuela(CodFacultad)
	{
		
		arreglo="<?php echo TEscuelas();?>";
		var srrs=arreglo.split(',');
		srrs.shift();//elimina el primero
		for (var i =0; i<srrs.length; i++) {
			var escs=srrs[i].split('-');
			if(escs[1]==CodFacultad)
			{
				var SeEsc=document.getElementById("escuelas");
				var opt=document.createElement('option');
				opt.setAttribute("value",escs[2]);
				opt.innerHTML=escs[0];
				SeEsc.add(opt);
			}

		}
		
	}

</script>
<script type="text/javascript">
	function mensajeEsc(){
		var city=document.getElementById("escuelas");
		var texto=city.options[city.selectedIndex].value;

		var SeCic=document.getElementById("ciclos");
		while(SeCic.length>1)
		{
			SeCic.remove(1);
		}
		if(texto=='0'){
			

		}else{
			
			CargarCiclos(texto);
		}
		
	}
	document.getElementById("escuelas").onclick=mensajeEsc;
	function CargarCiclos(CodEscuela)
	{
		
		arreglo="<?php echo TCiclos();?>";
		var srrs=arreglo.split(',');
		srrs.shift();//elimina el primero
		for (var i =0; i<srrs.length; i++) {
			var escs=srrs[i].split('-');
			if(escs[1]==CodEscuela)
			{
				var SeCic=document.getElementById("ciclos");
				var opt=document.createElement('option');
				opt.setAttribute("value",escs[2]);
				opt.innerHTML=escs[0];
				SeCic.add(opt);
			}

		}
		
	}

</script>
<?php
	function TFacultades(){
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
	function TEscuelas(){
		if(isset($_POST['escus']))
		{
			$esc=$_POST['escus'];
			foreach ( $esc as $escuela) 
			{
				$variable= $variable.",".$escuela->Nombre."-".$escuela->CodFacultad."-".$escuela->CodEscuela; 
			}
		}
		return $variable;
	}
	function TCiclos(){
		if(isset($_POST['ciclos']))
		{
			$cic=$_POST['ciclos'];
			foreach ( $cic as $ciclo) 
			{
				$variable= $variable.",".$ciclo->Numero."-".$ciclo->CodEscuela."-".$ciclo->CodCiclo; 
			}
		}
		return $variable;
	}
?>
<script type="text/javascript">
	/*document.getElementById("escuelas").onclick=facultad;
	function facultad()
	{
		var facu=document.getElementById("escuelas");
		var valor=facu.options[facu.selectedIndex].value;
		if(valor!=0)
		{
			alert(valor);
		}
	}*/

</script>

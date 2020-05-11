
<div align="center">
	<h2>CURSO</h2>
	<div align="left">
		<?php
		include "CreateView.php";
		if(isset($_POST['mensaje'])){echo $_POST['mensaje'];}
	 ?>
	 </div>
	<br><br>
	<div>
		<?php
		include "TablaView.php"; 
		?>

	</div>
</div>

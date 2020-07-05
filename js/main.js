$(function() {
	  "use strict";

	//para aparecer y desaparecer el nav
	 if (document.getElementById('menu')) 
	 {
	 	$('.icon-menu').on( 'click', function() {
	 	if($(this).is(':checked') ) {
	 		$('.menu').css({
            	'display': 'block'
        	});
	 	}else{
	 		$('.menu').css({
            	'display': 'none'
        	});
	 	}
	 	});
	}

	//registrar Notas
	$('.registrarNota').on('click',function(evento){
		evento.preventDefault();
		var envio=$(this).attr('href');
		var arr=envio.split('/');
		let estudiante=arr[0];
		let codCurso=arr[1];

		var fila=$('table tbody #'+codCurso).find("td");

		var tipoCurso=fila[1].innerHTML;
		var nombreCurso=fila[2].innerHTML;
		var creditosCurso=fila[3].innerHTML;
		
		$("#codigoAlumno").val(estudiante);
		$('#codigoCurso').val(codCurso);
		$('#tipoCurso').val(tipoCurso);
		$('#creditosCurso').val(creditosCurso);
		$('#nombreCurso').val(nombreCurso);
		
		//mostrar el modal

		$('#informacion').modal();
	});

});
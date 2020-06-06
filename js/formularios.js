$(document).ready(function () {

    $("select[id=universidades]").change(function () {
        $("[name=facultades]").empty().append('<option value="0">SELECCIONAR</option>');
        $("[name=escuelas]").empty().append('<option value="0">SELECCIONAR</option>');
        $("[name=ciclos]").empty().append('<option value="0">SELECCIONAR</option>');
        var universidad = $(this).val();
        var data = {
            "codUniversidad": universidad
        };
        $.ajax({
            type: "POST",
            url: "../ajax/FacultadAjax.php",
            data: data,
            success: function (msg) {
                if (msg == "") {

                } else if (msg == "0") {
                    alert("Seleccion Incorrecta");
                } else {
                    var data = msg.split('/');
                    data.shift(); //elimina el primero
                    for (var i = 0; i < data.length; i++) {
                        var facs = data[i].split('-');
                        $("[name=facultades]").append("<option value=" + facs[1] + ">" + facs[0] + "</option>");
                    }
                }
            },
            error: function (msjError) {

                alert(msjError);
            }
        });
    });
    $("select[id=facultad]").change(function () {
        $("[name=escuelas]").empty().append('<option value="0">SELECCIONAR</option>');
        $("[name=ciclos]").empty().append('<option value="0">SELECCIONAR</option>');
        var facultad = $(this).val();
        var data = {
            "codFacultad": facultad
        };
        $.ajax({
            type: "POST",
            url: "../ajax/EscuelaAjax.php",
            data: data,
            success: function (msg) {
                if (msg == "") {

                } else if (msg == "0") {
                    alert("Seleccion Incorrecta");
                } else {
                    var data = msg.split('/');
                    data.shift(); //elimina el primero
                    for (var i = 0; i < data.length; i++) {
                        var Escus = data[i].split('-');
                        $("[name=escuelas]").append("<option value=" + Escus[1] + ">" + Escus[0] + "</option>");
                    }
                }
            },
            error: function (msjError) {

                alert(msjError);
            }
        });
    });
    $("select[id=escuela]").change(function () {
        $("[name=ciclos]").empty().append('<option value="0">SELECCIONAR</option>');
        var escuela = $(this).val();
        var data = {
            "codEscuela": escuela
        };
        $.ajax({
            type: "POST",
            url: "../ajax/EscuelaAjax.php",
            data: data,
            success: function (msg) {
                if (msg == "") {

                } else if (msg == "0") {
                    alert("Seleccion Incorrecta");
                } else {

                    for (var i = 1; i <= msg; i++) {
                        $("[name=ciclos]").append("<option value=" + i + ">" + i + "</option>");
                    }
                }
            },
            error: function (msjError) {

                alert(msjError);
            }
        });
    });
    $("select[id=escuelaE]").change(function () {
        $("[name=estudiantes]").empty().append('<option value="0">SELECCIONAR</option>');
        var escuela = $(this).val();
        var data = {
            "codEscuela": escuela
        };
        $.ajax({
            type: "POST",
            url: "../ajax/EstudiantesAjax.php",
            data: data,
            success: function (msg) {
                if (msg == "") {

                } else if (msg == "0") {
                    alert("Seleccion Incorrecta");
                } else {
                    var data = msg.split('/');
                    data.shift();
                    for (var i = 0; i < data.length; i++) {
                        var arr=data[i];
                        var Escus = arr.split('-');
                        $("[name=estudiantes]").append("<option value=" + Escus[1] + ">" + Escus[0] + "</option>");
                    }
                }
            },
            error: function (msjError) {
                alert(msjError);
            }
        });
    });
    $("[id=btn-Notas]").click(function () {
        if ($("[name=estudiantes]").val() == "0") {
            alert("SELECCIONE UN ESTUDIANTE");
        } else {
            var codigo=$("[name=estudiantes]").val();
           $("[name=tabla]").empty();
            
            var data = {
                "codEstudiante": escuela
            };
            $.ajax({
                type: "POST",
                url: "../ajax/EstudiantesAjax.php",
                data: data,
                success: function (msg) {
                    if (msg == "") {

                    } else if (msg == "0") {
                        alert("Seleccion Incorrecta");
                    } else {
                        var data = msg.split('/');
                        data.shift();
                        for (var i = 0; i <= data.length; i++) {
                            var Escus = data[i].split('-');
                            $("[name=estudiantes]").append("<option value=" + Escus[1] + ">" + Escus[0] + "</option>");
                        }
                    }
                },
                error: function (msjError) {
                    alert(msjError);
                }
            });*/
        }
    });
});
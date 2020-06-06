<?php
class AdministradorController extends MainController{

    public function __construct()
    {
        MainController::__construct();
    }
    
    public function Index(){
        //Cargamos la vista index y le pasamos valores
        if(isset($_SESSION['user'])){

            $this->view("Administrador","Index");
        }else{
            $this->view("Login","Index");
        }
    }
    

    public function Nav(){

    	if( isset($_POST['Universidades']))
    	{
    		$variable='Universidad';
    	}
    	else if (isset($_POST['Facultades']))
    	{
    		$variable='Facultad';
    	}
    	else if (isset($_POST['Escuelas']))
    	{
    		$variable='Escuela';
    	}
    	else if (isset($_POST['Ciclos']))
    	{
    		$variable='Ciclo';
    	}
    	else if (isset($_POST['Cursos']))
    	{
    		$variable='Curso';
    	}
    	else if (isset($_POST['Estudiantes']))
    	{ 
    		$variable='Estudiante';
    	}
    	else if (isset($_POST['NotaCurso']))
    	{
    		$variable='NotaCurso';
    	}else{

            if(isset($_SESSION['nav']))
            {

                $variable=$_SESSION['nav'];
                
            }else
            {
                echo $_SESSION['nav'];
                $variable="Administrador";
                
            }
        }

    	$controllerObj=cargarControlador($variable);
        lanzarAccion($controllerObj,"Index");
        
        
    }
    

}
?>
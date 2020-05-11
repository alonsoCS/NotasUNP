<?php  
class LoginController extends ControladorBase{
	
    public function __construct() {
        parent::__construct();
        
    }
    
    public function Index(){
        //Cargamos la vista index y le pasamos valores
        if(isset($_SESSION['user'])){
                session_destroy();
        }
        $this->view("Login","Index");
    }

    public function Registrar(){
        $est= new EstudianteModelo();
        $datos=$est->ConsultarEstudiantes();
        $facus=$this->CargarFacultades();
        $unis=$this->CargarUniversidades();
        $escus=$this->CargarEscuelas();
        
        $_POST['facus']=$facus;
        $_POST['unis']=$unis;
        $_POST['escus']=$escus;
        $this->view("Login","Registrar",$datos);
    }

    public function Verificar(){
        $datos=array();
      
        if(isset($_POST['user'])&&$_POST['password'])
        {
       
            $datos[0]=$_POST['user'];
            $datos[1]=$_POST['password'];

            if($datos[0]=="7683807807" && $datos[1]=="alonso")
            {
                echo "admin";
                
                $_SESSION['user']="Administrador";
                $this->redirect("Administrador","Index");
            }else
            {
                $user=new EstudianteModelo();
                $user->setCodigo($datos[0]);
                $resultado=$user->BuscarEstudiante();
                if($resultado=="0")
                {

                    $_POST['mensaje']="Usuario no registrado";

                    $this->view("Login","Index");
                }else
                {
                    //$_POST['user']=$datos[0];
                    if($resultado->contraseña==$datos[1])
                    {
                       
                        $_SESSION['user']=$resultado;
                        
                    $this->redirect("Usuario","Index");
                    }else
                    {
                        $_POST['mensaje']="Contraseña incorrecta";
                        
                        $this->view("Login","Index");
                    }

                    
                }
            }  
        }
        else
        {
            $_POST['mensaje']="Ingrese datos validos";
            $this->view("Login","Index");
        }   
    }

    private function CargarUniversidades()
    {
        $uni= new UniversidadModelo();
        $datos=$uni->ConsultarUniversidades();
        $arr=array();
        foreach ($datos as $obj) 
        {
            if($obj->Estado=='1')
            {
                $arr[$obj->CodUniversidad]=$obj->Nombre;
            }
        } 
        return $arr;

    }
    private function CargarFacultades()
    {
        $fac= new FacultadModelo();
        $datosF=$fac->ConsultarFacultades();

        return $datosF;
    }
    private function CargarEscuelas()
    {
        $fac= new EscuelaModelo();
        $datosF=$fac->ConsultarEscuelas();

        return $datosF;
    }
    public function Guardar()
    {
        if(isset($_POST['email'])){
            $esc=$_POST['escuelas'];//codescuela
            $sexo=$_POST['sexo'];//tipo
            $nombre=$_POST['nombres'];
            $apellido=$_POST['apellidos'];
            $dni=$_POST['dni'];
            $direccion=$_POST['direccion'];
            $email=$_POST['email'];
            $contraseña=$_POST['contraseña'];
            $codigo=$_POST['codigo'];
            $this->EnviarEmail();
        }else{
            $this->EnviarEmail();
        }
        

    }
    private function EnviarEmail(){
        $destino = "notasr.2020@gmail.com";
        $asunto = "Asunto del email";
        $contenido = "Este es mi primer envio de email con PHP";
        $header="From: alonsodelcordova@gamil.
        com"."r\n";
        $header.="X-Mailer: PHP/".phpversion();
        $enviado=@mail($destino, $asunto, $contenido,$header);
      
        if ($enviado){
          echo 'Email enviado correctamente ffal '.$destino;
        }
        else{
          echo 'Error en el envío del email y53252';
        }
    }
}
?>

<?php  

    class LoginController extends MainController{
        private $EstudianteModelo;
        public function __construct()
        {
            MainController::__construct();
            $this->EstudianteModelo=new EstudianteModelo();

        }
        public function Index()
        {

            if(isset($_SESSION['user'])){
                session_destroy();
            }
            $this->view("Login","Index");
        }
                            
        public function Ingresar(){
            $user=MainModel::limpiar_cadena($_POST['user']);
            $password=MainModel::limpiar_cadena($_POST['password']);
            if($user=="7683807807" && $password=="alonso")
            {   
                $_SESSION['user']="Administrador";
                 header("Location:".URL."Administrador/Index");
                 exit;
            }else
            {
                $estudiante=$this->EstudianteModelo->BuscarEstudiante($user);
                if($estudiante!='0')
                {
                    if($estudiante!='1')
                    {
                        if($estudiante['contraseña']==$password)
                        {
                            $_SESSION['user']=$estudiante;
                             header("Location: ".URL."Usuario/Index");
                             exit;
                        }else{
                            $_SESSION['user']=$user;
                            $_POST['mensaje']="contraseña incorrecta";
                            $this->Index();
                        }
                    }else
                    {
                        $_POST['mensaje']="usuario no existe";
                        $this->Index();
                    }   
                }else{
                    $_POST['mensaje']="Error en la conexion";
                    $this->Index(); 
                }
            }    
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

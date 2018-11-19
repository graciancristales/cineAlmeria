<?php
//Incluimos la vista de seguridad
    include_once('Seguridad.php');
    //extendemos todas las funciones de seguridad
    class usuarios extends Seguridad {
        public function __construct() {

            parent::__construct();
            $this->load->model("peliculasModel");
            $this->load->model("usuariosModel");
        }

        //cargamos vista

        public function index() {
            $this->load->view("formLogin");
        }

        public function processFormLogin() {
            
            $nombre = $this->input->get_post("nombre");
            $pass = $this->input->get_post("password");
            //vamos a usuarios model para mirar que este el id
            $resultado = $this->usuariosModel->checkLogin($nombre,$pass);
            
            if ($resultado == 0) { // Error: usuario o contraseña no existen
                $this->load->view("formLogin");
                //echo "Error de logueo";


            } else {    // Login OK
            //crearLogin(); esta en seguridad , al entrar le creamos una 
            //sesion de control 
                $this->crearLogin();
                //echo "Usario identificado";
                //llamamos funcion de abajo
                $this->main();
            }
        

     }
     public function main() {

        //Comprobamos que entre , y le pasamos la vista main menu
        if($this->security_check()){

            $data["listaPeliculas"] = $this->peliculasModel->getAll();
            $this->load->view("mainMenu", $data);

            }


     }

     public function comprobarUsuario($ruta){

        $resultado = $this->usuariosModel->comprobarNombre($ruta);
        echo $resultado;


     } 


    }



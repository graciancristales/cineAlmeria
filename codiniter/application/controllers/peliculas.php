<?php
  //incluimos peliculas
  include_once('Seguridad.php');
  //extendemos de seguridad
    class Peliculas extends Seguridad {

        public function __construct() {
            parent::__construct();
           $this->load->model("peliculasModel");

       }

         public function insertPeliculasVista() {
             if($this->security_check()){
            $this->load->view("insertPeliculas");
        }
    }

        
 

        public function insertPeliculas() {
             if($this->security_check()){

                //$id = $this->input->get_post("id");
                $titulo = $this->input->get_post("titulo");
                $ano = $this->input->get_post("ano");
                $pais = $this->input->get_post("pais");

                $resultado_subida = $this->peliculasModel->subirImagenPelicula();
                if ($resultado_subida["codigo"] == 1) {
                    // Éxito
                    $img_name=$resultado_subida["mensaje"];
                    //var_dump($img_name);
                    $cartel = "./imgs/users/".$img_name;
                    $resultado = $this->peliculasModel->insertarPeliculas($titulo,$ano,$pais,$cartel);
                    if ($resultado == 0) {
                        $data["mensaje"] = "Error al insertar la película en la base de datos";
                       // $this->peliculasModel->borrarImagenPelicula($img_name);
                    } else {
                        $data["mensaje"] = "Película insertada con éxito";
                    }

                } else {
                    // Fallo
                    $data["mensaje"] = "Error al subir la imagen de la película";
 

                }
                
                $data["listaPeliculas"] = $this->peliculasModel->getAll();
                $this->load->view("mainMenu", $data);

         }
     }



               

                 
           
               
           
        public function eliminarPeliculas($id) {
            //$id = $this->input->get_post("id");
            $resultado = $this->peliculasModel->BorrarPeliculas($id);
           
               
            if ($resultado == 0) { // Error: usuario o contraseña no existen
                $this->load->view("mainMenu");
            } else {
                $this->load->model("peliculasModel");
                $data["listaPeliculas"] = $this->peliculasModel->getAll();
                $this->load->view("mainMenu", $data);
            }
        }

         public function modificarPeliculas() {
             $id = $this->input->get_post("id");
            $titulo = $this->input->get_post("titulo");
            $ano = $this->input->get_post("ano");
            $pais = $this->input->get_post("pais");
            //$cartel = $this->input->get_post("cartel");
            $resultado = $this->peliculasModel->modificarPeliculas($id,$titulo,$ano,$pais);
           
               
            if ($resultado == 0) { // Error: usuario o contraseña no existen

                 $data["error"]="No se pudo modificar";
                 $data["listaPeliculas"] = $this->peliculasModel->getAll();
               $this->load->view("mainMenu", $data);

             
               

            } else {


                 $data["mensaje"]=" modificado con exito";

                $this->load->model("peliculasModel");
                $data["listaPeliculas"] = $this->peliculasModel->getAll();
                $this->load->view("mainMenu", $data);
            }
        }

        
    }
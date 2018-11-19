<?php
	class Lugares extends CI_Controller {
        public function __construct() {
            parent::__construct();
            $this->load->model("lugaresModel");
        }

		 public function insertPeliculasVista () {
            $this->load->view("InsertPeliculas");
        }
		public function insertPeliculas() {
            $id = $this->input->get_post("id");
            $titulo = $this->input->get_post("titulo");
            $ano = $this->input->get_post("ano");
            $pais = $this->input->get_post("pais");
            $cartel = $this->input->get_post("cartel");
            $resultado = $this->peliculasModel->insertarPeliculas($id,$titulo,$ano,$pais,$cartel);
           
               
            if ($resultado == 0) { // Error: usuario o contraseña no existen
                $this->load->view("mainMenu");
            } else {
                $this->load->model("peliculasModel");
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
            $cartel = $this->input->get_post("cartel");
            $resultado = $this->peliculasModel->modificarPeliculas($id,$titulo,$ano,$pais,$cartel);
           
               
            if ($resultado == 0) { // Error: usuario o contraseña no existen
                $this->load->view("mainMenu");
            } else {

                $this->load->model("peliculasModel");
                $data["listaPeliculas"] = $this->peliculasModel->getAll();
                $this->load->view("mainMenu", $data);
            }
        }

        
	}
<?php
     //include_once('Seguridad.php');
    
    class peliculasModel extends CI_Model{ 

       public function __construct() {
            parent::__construct();
            $this->load->library("session");
        }
         public function getAll() {
           
            
            $r = $this->db->query("SELECT * FROM peliculas"); 
            
            $peliculas = array();
           foreach ($r -> result()as $pel) {
           	$peliculas[]=$pel;
          
           }
            
            
            return $peliculas;
        }




             function insertarPeliculas($titulo,$ano,$pais,$cartel) {
                
                $this->db->query("INSERT INTO peliculas(titulo,ano,pais,cartel)
                VALUES ('$titulo','$ano','$pais','$cartel')");
                return $this->db->affected_rows();
            
        }
              function borrarPeliculas($id) {
                $this->db->query("DELETE FROM peliculas where id='$id'");
                return $this->db->affected_rows();
            }

             function modificarPeliculas($id,$titulo,$ano,$pais) {
                $this->db->query("UPDATE peliculas SET titulo='$titulo', ano='$ano', pais='$pais' WHERE id='$id' ");
                return $this->db->affected_rows();
            }

            function subirImagenPelicula() {
                $config['upload_path'] = './imgs/users';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['max_size']             = 100000;
                $config['max_width']            = 10240;
                $config['max_height']           = 7680;

                $this->load->library('upload', $config);

                if ( ! $this->upload->do_upload('cartel'))
                {   // La subida ha fallado: devolvemos el mensaje de error
                    $resultado["codigo"] = 0; //Código de error
                    $resultado["mensaje"] = $this->upload->display_errors();
                }
                else {
                    // La subida ha sido un éxito. Devolvemos el nombre del fichero subido
                    $resultado["codigo"] = 1; //Código de éxito
                    $resultado["mensaje"] = $this->upload->data("file_name");
                }
                return $resultado;
                       
            }

                   
           
     }
    

   
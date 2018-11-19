<?php
    class lugaresModel extends CI_Model {
         public function getAll() {
           
            
            $r = $this->db->query("SELECT * FROM lugares"); 
            
            $lugares = array();
           foreach ($r -> result()as $lug) {
           	$lugares[]=$lug;
          
           }
            
            
            return $lugares;
        }




             function insertarLugares($id,$titulo,$ano,$pais,$cartel) {
                $this->db->query("INSERT INTO peliculas(id,titulo,ano,pais,cartel)
                VALUES ($id,'$titulo','$ano','$pais','$cartel')");
                return $this->db->affected_rows();
            }
              function borrarLugares($id) {
                $this->db->query("DELETE FROM peliculas where id='$id'");
                return $this->db->affected_rows();
            }

             function modificarLugares($id,$titulo,$ano,$pais,$cartel) {
                $this->db->query("UPDATE peliculas SET titulo='$titulo', ano='$ano', pais='$pais',cartel='$cartel' WHERE id='$id' ");
                return $this->db->affected_rows();
            }


     
    }
    
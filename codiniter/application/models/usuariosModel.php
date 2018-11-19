<?php
class usuariosModel extends CI_Model{

// ------- COMPRUEBO EL LOGIN CON LOS PARAMETROS DEL CONTROLADOR -------------------- //
    public function checkLogin($nombre, $pass){
        $query = $this->db->query("SELECT id FROM usuarios WHERE nombre='$nombre' AND password='$pass'");

            
        return $query->num_rows();
    }

//funcion de ayax para comprobar si el nombre existe o no
 public function comprobarNombre($ruta){

 	$query = $this->db->query("SELECT nombre FROM usuarios WHERE nombre='$ruta'");
 	return $query->num_rows();



 }


}

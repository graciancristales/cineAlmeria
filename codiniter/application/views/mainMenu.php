<?php

        if (isset($error)) echo "<div style='color:red'>$error</div>";
         if (isset($mensaje)) echo "<div style='color:green'>$mensaje</div>";
            # code...
        

     

     
           ?>
           <link rel="stylesheet" href="<?php echo base_url('css/estilos2.css');?>">

    <div>

        
          
   <?php
   //echo "<a href='index.php/usuarios/do=showInsert'> Insertar Usuario</a><br>";
   // echo "<a href='".site_url('peliculas/insertPeliculasVista')."'> Insertar Película</a><br>";
        
         echo anchor("peliculas/insertPeliculasVista", "Insertar Película", "");
         echo "<br>";
            echo "<br>";
    ?> 

   </div> 

<?php       
         
         echo " 
                <span>TITULO</span>
                <span>AÑO</span>
                <span>PAIS</span>
                <span>CARTEL</span>  
                 ";

          echo "<br>";   
          echo "<br>";   
            

            for ($i = 0; $i < count($listaPeliculas); $i++) {
                $peliculas = $listaPeliculas[$i];

                echo form_open("peliculas/modificarPeliculas");
                echo "
                <div class='info'>
                <input type='hidden' name='id' value='$peliculas->id'>
                <input type='text' name='titulo' value='$peliculas->titulo'>
                <input type='text' name='ano'value='$peliculas->ano'>
                <input type='text' name='pais'value='$peliculas->pais'>
                <input type='hidden' name='cartel'value='$peliculas->cartel'>
                <input type='hidden' name='do' value='modificarPeliculas' />" ;
                
                 echo "<img src='".base_url($peliculas->cartel)."' width='100px'>";
                echo"<input type='Submit' name='Modificar' value='modificar'/> ";
                //echo"<button>" anchor("peliculas/eliminarPeliculas/".$peliculas->id, "Borrar Película", "")"</button>";
    echo "<button><a href='".site_url('peliculas/eliminarPeliculas/'.$peliculas->id)."'>Eliminar</button>
    </div>";


               

                //<button type='submit' name='Enviar'/>Modificar</button>;
                //echo anchor("peliculas/eliminarPeliculas/".$peliculas->id, "Borrar Película", "");
                echo" ";
               // echo anchor("peliculas/modificarPeliculas/".$peliculas->id, "modificar Película", "");
              
                 //<input type="hidden" name="do" value="insertPeliculas" />
                 //<input type="Submit" name="Enviar"/>    
               echo" </form>";    
                  

               
             }
   
            echo "<div>
                
            <a href='".site_url("usuarios/cerrar_sesion")."'>Cerrar sesión</a>

            </div>";
              
            
           

   
?>
       

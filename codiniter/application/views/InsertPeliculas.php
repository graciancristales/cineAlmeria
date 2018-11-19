<?php
        echo "

            <h1>Insertar una película</h1>";
        
        echo form_open_multipart("peliculas/insertPeliculas");
        //echo form_open("peliculas/insertPeliculas");
        //id : <input type='text' name='id'/><br/>

        echo "
            <fieldset>
                
                Titulo : <input type='text' name='titulo'/><br/>
                Año: <input type='text' name='ano'/><br/>
                Pais: <input type='text' name='pais'/><br/>
                cartel: <input type='file' name='cartel' /><br/>  ";
              
            echo "<br/>
                </fieldset>
            ";

       

        echo"       
                <input type='hidden' name='do' value='insertPelicula'/>
                <input  type='submit' name='Enviar' value='Insertar'/>
                </form>
        ";

         ?>     
            
               
        

         




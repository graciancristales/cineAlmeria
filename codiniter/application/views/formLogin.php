<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>formulario_verano</title>
    <link rel="stylesheet" href="<?php echo base_url('css/estilos.css');?>">
    

</head>
<body>






<script>

    window.onload=function(){
        document.getElementById('nombre').addEventListener("blur",function(){
            nombre=document.getElementById('nombre').value;
            ajax(nombre);
        });
    }

    function ajax(usuario){
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("mensaje").innerHTML = this.responseText;

                if(this.responseText==0){
                    document.getElementById("mensaje").innerHTML=" Error usuario no encontrado";

                }else{
                    document.getElementById("mensaje").innerHTML=" Usuario encontrado";

                }
            }
        };
        cadena="<?php echo site_url("usuarios/comprobarUsuario"); ?>/"+usuario;
        xhttp.open("GET", cadena , true);
        xhttp.send(null);
    }
    

</script>
<?php
            //session_destroy();
            if (isset($data["msj"])) echo "<h2 style='color:red'>".$data["msj"]."</h2>";

    ?>
       

        <div class="contenedor-form">
        
        
        <div class="formulario">
            <h2>Iniciar Sesión</h2>
            <?php
            echo form_open("usuarios/processFormLogin");
        ?>

            
                Usuario: <input type="text" name="nombre" id="nombre"/><span id="mensaje"></span><br/>
            Contraseña: <input type="text" name="password"/><br/>
            <input type="hidden" name="do" value="processFormLogin"/>
            <input type="submit" value="Entrar"/>
        </div>
        
     
        
    </div>

</body>
</html>


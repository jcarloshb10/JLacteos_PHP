<?php

    function conectar_registro(){

        $bd_2 = mysqli_connect("localhost","id19471830_localhost2","~(m47P!{R5@YLKUo","id19471830_registro_propuestas");
        if (!$bd_2){
            echo "<h3>Error de conexión</h3>Base de datos registro no diponible";
            return NULL;
        }
        else{
            return $bd_2;
        }
    }
?>
<?php

    function conectar(){

        $bd = mysqli_connect("localhost","id19471830_localhost","nrSd9|/<o4}xfl8e","id19471830_registro");
        if (!$bd){
            echo "<h3>Error de conexión</h3>Base de datos registro no diponible";
            return NULL;
        }
        else{
            return $bd;
        }
    }
?>
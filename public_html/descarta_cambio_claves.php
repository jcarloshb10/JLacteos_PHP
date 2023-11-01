<?php

    $user = $_GET['user1'];
    include("conecta.php");
    $bd_1 = conectar();
    $sqlCorreo_1 = "delete from claves_aux where nombres like '$user'";
    $rres_correo_1 = mysqli_query($bd_1, $sqlCorreo_1);
    
    mysqli_close($bd_1);

    echo "<script language='JavaScript'>";                     
    echo "location = 'index.php'";
    echo "</script>";

?>

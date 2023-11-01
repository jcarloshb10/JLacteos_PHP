<?php 
    $bd_aux = mysqli_connect("localhost","id19471830_localhost","nrSd9|/<o4}xfl8e","id19471830_registro"); 
    
    $user = $_GET['user1'];

    $con_res2 = "delete from persona_aux where nombres like '$user'";
    $ress3 = mysqli_query($bd_aux,$con_res2);
    mysqli_close($bd_aux); 
    
    echo "<script language='JavaScript'>";
    echo "location = 'index.php'";
    echo "</script>";
?>
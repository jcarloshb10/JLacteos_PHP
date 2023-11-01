<?php
    
    $correo_recu = $_POST["txtcorreo2"];

    echo "<script language='JavaScript'>";                     
    echo "location = 'olvidada.php?user1=$correo_recu'";
    echo "</script>";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width" />
    <title>Buscando correo</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css"
        integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <script language="JavaScript" type="text/javascript" src="ajax.js"></script>
</head>

<body>
    <div class="container" >
        
        <?php 
            include('conecta.php');
            $bd = conectar();
        
            $con_ress2 = "SELECT nombres,claves from persona where nombres like '$correo_recu'";
            $resss3 = mysqli_query($bd,$con_ress2);
            $ressulta3 = mysqli_fetch_array($resss3);  
            $clav = $ressulta3['claves'];

            $con_ress2_2 = "SELECT nombres,claves from persona_comprador where nombres like '$correo_recu'";
            $resss3_2 = mysqli_query($bd,$con_ress2_2);
            $ressulta3_2 = mysqli_fetch_array($resss3_2);  
            $clav_2 = $ressulta3_2['claves'];

            if($ressulta3!=NULL){

                $bd_aux = mysqli_connect("localhost","id19471830_localhost","nrSd9|/<o4}xfl8e","id19471830_registro"); 
                $sql3 = "insert into claves_aux values ('$correo_recu','$clav')";
                $res_f3 = mysqli_query($bd_aux,$sql3);

            }
            elseif($ressulta3_2!=NULL){
                
                $bd_aux = mysqli_connect("localhost","id19471830_localhost","nrSd9|/<o4}xfl8e","id19471830_registro"); 
                $sql3 = "insert into claves_aux values ('$correo_recu','$clav_2')";
                $res_f3 = mysqli_query($bd_aux,$sql3);

            }
            
            mysqli_close($bd);
            mysqli_close($bd_aux);
        ?>
    </div>
    
    <script language="JavaScript" type="text/javascript" src="ajax.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>

<html></html>
<?php
    header("Location: /registrarse_comprador.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrando comprador</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <?php 
        ?>
            <?php
                include("conecta.php");
                $bd_2 = conectar();
                
                $pais = $_POST["txtPais"];
                $departamento = $_POST["txtDepartamento"];
                $ciudad = $_POST["txtCiudad"];
                $direccion = $_POST["txtDireccion"];
                $tel = $_POST["txtTel"];
                $correo = $_POST["txtEmail"];

                $sqlCorreo = "select nombres from persona_comprador where nombres like '$correo'";
                $rres_correo = mysqli_query($bd_2, $sqlCorreo);
                $rresult_correo = mysqli_fetch_array($rres_correo);

                if($rresult_correo==NULL){
                    echo "<script>";
                    echo "console.log('Aun no existe')";
                    echo "</script>";
                        
                    $key = "";
                    $pattern = "1234567890abcdefghijklmnopqrstuvwxyz.-_/@";
                    $max = strlen($pattern)-1;
                    for($i = 0; $i < 10; $i++){
                        $key .= substr($pattern, mt_rand(0,$max), 1);
                    }
                    
                    $sql2 = "insert into persona_comprador (nombres, claves, pais, departamento, ciudad, direccion, telefono) values ('$correo','$key','$pais','$departamento','$ciudad','$direccion','$tel')";
                    $res_f = mysqli_query($bd_2,$sql2);
                    
                    if($res_f){
                        echo "<script>";
                        echo "console.log('insertado')";
                        echo "</script>";
                    }else{
                        echo "<script>";
                        echo "console.log('no insertado')";
                        echo "</script>";
                    }

                    $con_res = "SELECT nombres, claves from persona_comprador where nombres like '$correo' and claves like '$key'";
                    $res2 = mysqli_query($bd_2,$con_res);
                    $result3 = mysqli_fetch_array($res2);

                    if($result3!=NULL){
                        
                        echo "<script>";
                        echo "console.log('Creado')";
                        echo "</script>";
                        
                        echo "<div class='alert alert-success' role='alert'><b>Usuario Creado</b><br>Se creó Usuario y Contraseña de acceso.</div>";
                        
                        $bd_aux = mysqli_connect("localhost","id19471830_localhost","nrSd9|/<o4}xfl8e","id19471830_registro"); 
                        $sql3 = "insert into comprador_aux values ('$correo','$key')";
                        $res_f3 = mysqli_query($bd_aux,$sql3);

                        $con_res2 = "SELECT nombres, claves from comprador_aux";
                        $ress3 = mysqli_query($bd_aux,$con_res2);
                        $resulta3 = mysqli_fetch_array($ress3);
                        mysqli_close($bd_aux);

                    }
                    else{
                        
                        echo "<script>";
                        echo "console.log('No creado')";
                        echo "</script>";
                    
                        echo "<div class='alert alert-danger' role='alert'><b>Error</b><br>No se creó Usuario y Constraseña.<br>" . mysqli_error($bd_2) . "</div>";
                    }     
                    
                    //mysqli_close($bd_2);
                    
                
                }else{
                    
                    echo "<script>";
                    echo "console.log('Ya Existe')";
                    echo "</script>";
                    
                    $bd_aux = mysqli_connect("localhost","id19471830_localhost","nrSd9|/<o4}xfl8e","id19471830_registro");
                    $sql3 = "insert into comprador_aux values ('2','2')";
                    $res_f3 = mysqli_query($bd_aux,$sql3);
                    echo "<div class='alert alert-danger' role='alert'><b>Error</b><br>Ya te registraste con ese correo.<br>" . mysqli_error($bd_aux) . "</div>";
                    
                }

                mysqli_close($bd_2);
                                
            ?>

    </div>
    
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>

</html>


<?php
    header("Location: /registrarse.php");
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrando propuesta</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <?php  
        ?>
            <?php
                include("conecta_registro.php");
                $bd_2 = conectar_registro();
                
                $empresa = $_POST["txtEmpresa"];
                $correo = $_POST["txtEmail"];
                $tel = $_POST["txtTel"];
                $direccion = $_POST["txtDireccion"];

                $producto = $_POST["opc_producto"];
                $cantidad = $_POST["txtCantidad"];
                $precio = $_POST["txtPrecio"];
               
                $ssql = "select correo, producto, cantidad, precio from propuestas where producto like '$producto' and cantidad like '$cantidad' and precio like '$precio' and correo like '$correo'";      
                $rres = mysqli_query($bd_2,$ssql);
                $rresult3 = mysqli_fetch_array($rres);

                $sqlCorreo = "select empresa, correo from propuestas where correo like '$correo'";
                $rres_correo = mysqli_query($bd_2, $sqlCorreo);
                $rresult_correo = mysqli_fetch_array($rres_correo);

                include("conecta.php");
                $bd_1 = conectar();
                $sqlCorreo_1 = "select nombres from persona where nombres like '$correo'";
                $rres_correo_1 = mysqli_query($bd_1, $sqlCorreo_1);
                $rresult_correo_1 = mysqli_fetch_array($rres_correo_1);
                mysqli_close($bd_1);

                if($rresult3==NULL){
                    
                    echo "<script>";
                    echo "console.log('Nueva propuesta')";
                    echo "</script>";
                    
                    $sql = "insert into propuestas (empresa,correo,telefono,direccion,producto,cantidad,precio) values ('$empresa','$correo','$tel','$direccion','$producto','$cantidad','$precio')";      
                    $res = mysqli_query($bd_2,$sql);
                    
                    if(!$res){
                        echo "<script>";
                        echo "console.log('No insertada en propuestas')";
                        echo "</script>";
                    
                        echo "<div class='alert alert-danger' role='alert'><b>Error</b><br>Propuesta no adicionada!!<br></div>";                     
                    }
                    else {
                        echo "<script>";
                        echo "console.log('Insertada a propuestas')";
                        echo "</script>";
                    
                        echo "<div class='alert alert-success' role='alert'><b>Información</b><br>Propuesta Adicionada con éxito!!</div>";
                        
                        if($rresult_correo==NULL && $rresult_correo_1==NULL){

                            
                            $key = "";
                            $pattern = "1234567890abcdefghijklmnopqrstuvwxyz.-_/@";
                            $max = strlen($pattern)-1;
                            for($i = 0; $i < 10; $i++){
                                $key .= substr($pattern, mt_rand(0,$max), 1);
                            }
                            
                            $bd = conectar();
                            $sql2 = "insert into persona (nombres, claves) values ('$correo','$key')";
                            $res_f = mysqli_query($bd,$sql2);
        
                            $con_res = "SELECT nombres, claves from persona where nombres like '$correo' and claves like '$key'";
                            $res2 = mysqli_query($bd,$con_res);
                            $result3 = mysqli_fetch_array($res2);
        
                            if($result3!=NULL){
                                
                                echo "<script>";
                                echo "console.log('Proveedor creado')";
                                echo "</script>";
                                
                                echo "<div class='alert alert-success' role='alert'><b>Usuario Creado</b><br>Se creó Usuario y Contraseña de acceso.</div>";
                                
                                $sql3 = "insert into proveedor_aux values ('$correo','$key')";
                                $res_f3 = mysqli_query($bd,$sql3);
        
                                $con_res2 = "SELECT nombres, claves from proveedor_aux";
                                $ress3 = mysqli_query($bd,$con_res2);
                                $resulta3 = mysqli_fetch_array($ress3);
        
                            }
                            else{
                                echo "<script>";
                                echo "console.log('No se pudo crear proveedor')";
                                echo "</script>";
                                
                                echo "<div class='alert alert-danger' role='alert'><b>Error</b><br>No se creó Usuario y Constraseña.<br></div>";
                            }
                        }
                        else{
                            echo "<script>";
                            echo "console.log('Ya existia el proveedor, propuesta insertada')";
                            echo "</script>";
                    
                            $bd = mysqli_connect("localhost","id19471830_localhost","nrSd9|/<o4}xfl8e","id19471830_registro");
                            $sql3 = "insert into proveedor_aux values ('1','1')";
                            $res_f3 = mysqli_query($bd,$sql3);
                            echo "<div class='alert alert-success' role='alert'><b>Ya tiene usuario y clave, ingrese!</b><br>Ingrese con el correo y contraseña dado al registrarse.<br></div>";
                            mysqli_close($bd);
                        }

                        
                    }
                    
                    //mysqli_close($bd_aux);
                
                }else{
                    echo "<script>";
                    echo "console.log('Ya Existía la misma propuesta')";
                    echo "</script>";
                    
                    $bd = mysqli_connect("localhost","id19471830_localhost","nrSd9|/<o4}xfl8e","id19471830_registro");
                    $sql3 = "insert into proveedor_aux values ('2','2')";
                    $res_f3 = mysqli_query($bd,$sql3);
                    echo "<div class='alert alert-danger' role='alert'><b>Error</b><br>Ya realizaste ésta propuesta.<br></div>";
                    mysqli_close($bd);
                }
                
                mysqli_close($bd_2);
                     
            ?>
    </div>

    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>

</html>


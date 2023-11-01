

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciando sesión</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <?php 
        
        include("index.php"); 
            
                include("conecta.php");
                $bd = conectar();

                $correo = $_POST["txtcorreo"];
                $clave = "".$_POST["txtclave"];
                $rol = $_POST["opc_rol"];

                if($rol=="1"){
                    $consulta = "SELECT nombres from persona where nombres like '$correo'";
                    $resultado = mysqli_query($bd, $consulta);

                    $result = mysqli_fetch_array($resultado);
                    if($result==NULL){
                    
                        echo "<div class='alert alert-danger' role='alert'><b>Error!</b><br>Credenciales no válidas.<br>" . mysqli_error($bd) . "</div>";
                    }
                    else {
                        $consulta2 = "SELECT nombres, claves from persona where nombres like '$correo' and claves like '$clave'";
                        $resultado2 = mysqli_query($bd, $consulta2);
                        $result2 = mysqli_fetch_array($resultado2);

                        if($result2==NULL){
                            echo "<div class='alert alert-danger' role='alert'><b>Acceso inválido!</b><br>Contraseña incorrecta.</div>";
                            echo "<script language='JavaScript'>";
                            echo "location = 'index.php'";
                            echo "</script>";
                        }
                        else{
    
                            echo "<div class='alert alert-success' role='alert'><b>Acceso válido!</b><br>Acceso con éxito!!</div>";
                            //NUEVO AUX PARA INICIO DE SESIÓN
                            
                            $bd_aux = mysqli_connect("localhost","id19471830_localhost","nrSd9|/<o4}xfl8e","id19471830_registro"); 
                            $sqlll = "insert into persona_aux values ('$correo','$clave')";      
                            $res = mysqli_query($bd_aux,$sqlll);   
                            mysqli_close($bd_aux);  


                            echo "<script language='JavaScript'>";
                            echo "location = 'web_proveedor.php?user1=$correo'";
                            echo "</script>";
                            
                        }                  
                    }
                    mysqli_close($bd);

                }elseif ($rol=="2") {
                    
                    $consulta = "SELECT nombres from persona_comprador where nombres like '$correo'";
                    $resultado = mysqli_query($bd, $consulta);

                    $result = mysqli_fetch_array($resultado);
                    if($result==NULL){
                    
                        echo "<div class='alert alert-danger' role='alert'><b>Error!</b><br>Credenciales no válidas.<br>" . mysqli_error($bd) . "</div>";
                    }
                    else {
                        $consulta2 = "SELECT nombres, claves from persona_comprador where nombres like '$correo' and claves like '$clave'";
                        $resultado2 = mysqli_query($bd, $consulta2);
                        $result2 = mysqli_fetch_array($resultado2);

                        if($result2==NULL){
                            echo "<div class='alert alert-danger' role='alert'><b>Acceso inválido!</b><br>Contraseña incorrecta.</div>";
                            echo "<script language='JavaScript'>";
                            echo "location = 'index.php'";
                            echo "</script>";
                        }
                        else{
                            
                            echo "<div class='alert alert-success' role='alert'><b>Acceso válido!</b><br>Acceso con éxito!!</div>";
                            //NUEVO AUX PARA INICIO DE SESIÓN
                            $bd_aux = mysqli_connect("localhost","id19471830_localhost","nrSd9|/<o4}xfl8e","id19471830_registro"); 
                            $sqlll = "insert into persona_aux values ('$correo','$clave')";      
                            $res = mysqli_query($bd_aux,$sqlll);   
                            mysqli_close($bd_aux);  

                            
                            echo "<script language='JavaScript'>";
                            echo "location = 'web_comprador.php?user1=$correo'";
                            echo "</script>";
                            
                        }                  
                    }
                    mysqli_close($bd);
                }
                elseif($rol=="3"){
              
                    $result = "admin@jlacteos";
                    $result2 = "admin@";
                    if($correo==NULL || $correo!=$result){
                    
                        echo "<div class='alert alert-danger' role='alert'><b>Error!</b><br>Credenciales no válidas.<br>" . mysqli_error($bd) . "</div>";
                    }
                    else {

                        if($result2!=$clave){
                            echo "<div class='alert alert-danger' role='alert'><b>Acceso inválido!</b><br>Contraseña incorrecta.</div>";
                            echo "<script language='JavaScript'>";
                            echo "location = 'index.php'";
                            echo "</script>";
                        }
                        else{
                            
                            echo "<div class='alert alert-success' role='alert'><b>Acceso válido!</b><br>Acceso con éxito!!</div>";
                            
                            echo "<script language='JavaScript'>";
                            echo "location = 'web_administrador.php?user1=$result'";
                            echo "</script>";
               
                        }                  
                    }
                    mysqli_close($bd);
                }
 
            ?>

    </div>
    
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>

</html>
<?php
    $user = $_GET['user1'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width" />
    <title>Cambio de clave</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css"
        integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <script language="JavaScript" type="text/javascript" src="ajax.js"></script>
</head>

<body>
<div class="container" style="background-color: rgb(12, 13, 97);">
        <div class="row align-items-center ng-scope" ng-controller=" loginController">


            <div class="col-7" style="padding-top:30px; padding-bottom: 10px;">
                <img alt="Image html" width="80%" src="img/colacteos.jpeg"/>
            </div>
            <div class="col-4" style="padding-left: 50px;">
                <div class="container" style="background-color: rgb(59, 77, 138);">

                    <div class="col">
                        
                            <form action="busqueda_co.php" id="form-index" class="form" method="post" enctype="multipart/form-data">
                                <div class="row justify-content-center" style="padding-top:10px;">
                                    <label class="row justify-content-center"
                                        style="padding-top:10px; padding-bottom:5px; color: aliceblue;"><b>Recuperación de acceso.</b></label>
                                </div>
                                <div class="row justify-content-center"
                                    style="border-color: yellow; border-style: solid; border-radius: 10px;">
                                    <input type="email" maxlength="100" name="txtcorreo2" id="txtcorreo2"
                                        class="form-control" placeholder="E-mail" required>
                                        
                                </div>
                                
                                <br>
                                <div class="row justify-content-center" style="box-shadow: 4px 4px rgb(12, 13, 97);">
                                    <button class="button" type="submit" style='cursor: pointer;' onClick="muestra_btn('clave_rest')"><b>Enviar</b></button>
                                </div>
                                      
                            </form>

                            <?php
                                $bd_aux = mysqli_connect("localhost","id19471830_localhost","nrSd9|/<o4}xfl8e","id19471830_registro"); 
                                $sqll = "SELECT * from claves_aux where nombres like '$user'";
                                $resultt = mysqli_query($bd_aux, $sqll);            
                                $mostrar=mysqli_fetch_array($resultt);                                
                            ?>

                            <div id="clave_rest" class='alert alert-success' role='alert' style="display:block;">
                                <?php                                     
                                    if($mostrar!=NULL){
                                        echo "Correo encontrado: <br/>";
                                        echo "Correo: ".$mostrar['nombres']."<br/>"; //
                                        ?>
                                        <br>
                                        <button id="btn2" onclick="<?php echo "location = 'resetPassword.php?user1=$user'"; ?>" style="box-shadow: 3px 3px rgb(12, 13, 97); cursor: pointer;"><b>Restaurar contraseña</b>    
                                        </button>
                                        
                                        <?php    
                                        
                                    }
                                    else{
                                        echo "<div class='alert alert-danger' role='alert'><br>Sin coincidencias aún.<br>" . mysqli_error($bd_aux) . "</div>";
                                        $con_res2 = "delete from claves_aux where nombres like '$user'";
                                        $ress3 = mysqli_query($bd_aux,$con_res2);
                                    }
                                    
                                    mysqli_close($bd_aux); 

                                ?>
                                
                            </div>
                                 
                            <div class="row justify-content-center" style="box-shadow: 4px 4px rgb(12, 13, 97);">
                                <button class="button" onclick="<?php echo "location = 'descarta_cambio_claves.php?user1=$user'"; ?>" style='cursor: pointer;'><b>Iniciar sesión</b></button>                
                            </div>
                            <br>
                    </div>


                </div>
            </div>
            
        </div>
        <br>
    </div>
<br>

    <script language="JavaScript" type="text/javascript" src="ajax.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>

</html>


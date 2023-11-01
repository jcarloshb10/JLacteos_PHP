<?php
    $user = $_GET['user1'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width" />
    <title>Cambio de Clave</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css"
        integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <script language="JavaScript" type="text/javascript" src="ajax.js"></script>
    <script language="JavaScript" type="text/javascript" src="ajax.js"></script>
</head>

<body>

<div class="container" style="background-color: rgb(12, 13, 97);">
        <div class="row align-items-center ng-scope" ng-controller=" loginController">

            <div class="col-7" style="padding-top:30px; padding-bottom: 10px;">
                <img alt="Image html" width="95%" src="img/colacteos.jpeg" />
            </div>
            <div class="col-4" style="padding-left: 45px;">
                <div class="container" style="background-color: rgb(59, 77, 138);">

                    <div class="col">
                        
                            <form action="reinicio_contra.php" id="form-index" name="form-index" class="form" method="post">
                                <div class="row justify-content-center" style="padding-top:10px;">
                                    <label class="row justify-content-center"
                                        style="padding-top:10px; padding-bottom:5px; color: aliceblue;"><b>Cambio de clave</b></label>
                                </div>
                                <div class="row justify-content-center"
                                    style="border-color: yellow; border-style: solid; border-radius: 10px;">
                                    <input type="password" pattern=".{6,}" pattern="[!@#$%^&/*][a-z][A-Z][0-9]" title="6 caracteres como mínimo" name="password" id="password"
                                        class="form-control" placeholder="Contraseña Nueva" required>
                                        
                                </div>
                                <br>
                                <div class="row justify-content-center"
                                    style="border-color: yellow; border-style: solid; border-radius: 10px;">
                                    <input type="password" pattern=".{6,}" title="Las contraseñas deben coincidir" name="confirm_password" id="confirm_password"
                                        class="form-control" placeholder="Confirmar contraseña" required>
                                        
                                </div>
                                <input style="display:none" name="correo_fl" id="correo_fl" value="<?php echo $user; ?>">
                                <br>
                                <div class="row justify-content-center" style="box-shadow: 4px 4px rgb(12, 13, 97);">
                                    <button class="button" id="resetSubmit" name="resetSubmit" type="submit" style='cursor: pointer;'><b>Enviar</b></button>
                                </div>
                                
                            </form>
                            
                            <br>
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

    <script language="JavaScript" type="text/javascript" src="ajax.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>

</html>



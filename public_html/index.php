<?php
    //sleep(5);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width" initial-scale=1.0"&amp;gt; />
    <title>J-Lácteos</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css"
        integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <script language="JavaScript" type="text/javascript" src="ajax.js"></script>
</head>

<body>
    <div class="container" style="background-color: rgb(12, 13, 97);">
        <div class="row ng-scope" ng-controller=" loginController">


            <div class="col-4" style="padding-top:20px; padding-bottom: 30px;">
                <img alt="Image html" width="95%" src="img/colacteos.jpeg"/>
            </div>
            <div class="col-8" style="padding-top: 20px; padding-bottom:30px;">
                <div class="container" style="background-color: rgb(59, 77, 138);">

                    <div class="col">

                            <form action="login_index.php" id="form-index" class="form" method="post">
                                <div class="row justify-content-center" style="padding-top:10px;">
                                    <label class="row justify-content-center"
                                        style="padding-top:10px; padding-bottom:5px; color: aliceblue;"><b>Inicio de
                                        sesiòn.</b></label>
                                </div>
                                <div class="row justify-content-center"
                                    style="border-color: yellow; border-style: solid; border-radius: 10px;">
                                    <input type="email" maxlength="100" name="txtcorreo" id="txtcorreo"
                                        class="form-control" placeholder="E-mail" required>
                                </div>
                                <br>
                                <div class="row justify-content-center"
                                    style="border-color: yellow;border-style: solid;border-radius: 10px;">
                                    <input type="password" class="form-control" name="txtclave" id="txtclave"
                                        placeholder="Contraseña" required>
                                </div>
                                <br>
                                <div>
                                    <label style="color:white;">Tipo de usuario: *</label><br>
                                    <select id="opc_rol" name="opc_rol" class="form-select" text="Tipo de usuario" required>
                                        <option>ELEGIR</option>
                                        <option value="1">Proveedor</option>
                                        <option value="2">Comprador</option>
                                        <option value="3">Administrador</option>
                                    </select>
                                </div>
                                <br>
                                <div class="row justify-content-center" style="box-shadow: 4px 4px rgb(12, 13, 97);">
                                    <button class="button" type="submit" style='cursor: pointer;' ><b>Iniciar sesión</b></button>
                                </div>

                            </form>
                            <div class="row justify-content-center" style="box-shadow: 4px 4px rgb(12, 13, 97);">
                                    <button onclick="<?php echo "location = 'olvidada.php?user1=correo'"; ?>" class="button" style='cursor: pointer;'><b>¿Olvidaste tu contraseña?</b></button>
                                </div>

                                <div align="center" style="padding-top:10px;">
                                    <label style="padding-top:10px; padding-bottom:5px; color: aliceblue;">¿Deseas ser proveedor de J-Lácteos?
                                    <a style="padding-top:10px; padding-bottom:5px; color: rgb(241, 226, 10);"
                                        href="registrarse.php"> Registra tu propuesta.</a></label>
                                </div>

                                <div align="center" style="padding-top:5px;">
                                    <label style="padding-top:10px; padding-bottom:5px; color: aliceblue;">¿Deseas registrarte como comprador?
                                    <a style="padding-top:10px; padding-bottom:5px; color: rgb(241, 226, 10);"
                                        href="registrarse_comprador.php"> Registrate y compra.</a></label>
                                </div>
                                <br>
                    </div>


                </div>
            </div>
        </div>
    </div>

    <script language="JavaScript" type="text/javascript" src="ajax.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>

</html>
<?php
    $user = $_GET['user1'];
?>
<!DOCTYPE html>
    <html>
    <head>
        <meta name="viewport" content="width=device-width" />
        <title>Chat</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css"
            integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
        <link rel="stylesheet" href="style.css">
        <script language="JavaScript" type="text/javascript" src="ajax.js"></script>
        <script src="https://cdn.rawgit.com/zenorocha/clipboard.js/v1.5.3/dist/clipboard.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    </head>
        <body>
            <div class="container" style="background-color: rgb(12, 13, 97);">
        
                <nav class="navbar navbar-expand navbar-light bg-light">
                    <div class="col-4">
                        <nav class="navbar">
                            <button class="button" <?php  
                                include('conecta.php');
                                $bd = conectar();
                            
                                $con_ress2 = "SELECT nombres from persona where nombres like '$user'";
                                $resss3 = mysqli_query($bd,$con_ress2);
                                $ressulta3 = mysqli_fetch_array($resss3);  
                                
                    
                                $con_ress2_2 = "SELECT nombres from persona_comprador where nombres like '$user'";
                                $resss3_2 = mysqli_query($bd,$con_ress2_2);
                                $ressulta3_2 = mysqli_fetch_array($resss3_2);  
                                
                                mysqli_close($bd);
                    
                                if($ressulta3!=NULL){
                                    ?>
                                    onclick="<?php echo "location = 'web_proveedor.php?user1=$user'"; ?>"
                                    <?php
                    
                                }
                                elseif($ressulta3_2!=NULL){
                                    ?>
                                    onclick="<?php echo "location = 'web_comprador.php?user1=$user'"; ?>"
                                    <?php
                                
                                }
                                       
                            ?> style="color:black;box-shadow: 3px 3px rgb(12, 13, 97);cursor:pointer;"><b>Volver a Cuenta</b> </button>                                        
                        </nav>
                    </div>

                    <div class="col-4">
                        <nav class="navbar">                       
                            <button id="btn_logout" onclick="<?php echo "location = 'cerrando.php?user1=$user'"; ?>" style="box-shadow: 3px 3px rgb(12, 13, 97);cursor: pointer;"><b> Cerrar sesión</b> 
                            </button>                       
                        </nav>
                    </div>
                </nav> 
                
                <div class="row">

                    <div align="center" class="col-4" style="padding-top:20px;">
                        <img alt="Image html" width="80%" src="img/colacteos.jpeg"/>
                        <br><br><br><br>
                        <br><br><br><br>
                        <br><br><br>
                        
                    </div>

                    <div class="col-7 order-last" align="center" style="padding-top:20px;">
                        <div class="container" style="background-color: rgb(248, 243, 241);">
                            <div class="row">
                                <iframe src="https://reach.at/jlacteos" frameborder="0" style="overflow:hidden;overflow-x:hidden;overflow-y:hidden;height:100%;width:100%;position:absolute;"></iframe>
                            </div>
                        </div>
                    </div>
                    <br><br><br><br>
                </div>
                <br><br><br><br>
                
            </div>
            
            <script language="JavaScript" type="text/javascript" src="ajax.js"></script>
            <script src="js/popper.min.js"></script>
            <script src="js/bootstrap.min.js"></script>
        </body>
    </html>
    
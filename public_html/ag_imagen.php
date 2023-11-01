<?php
    //sleep(5);
    $correo_comp = $_POST["correo_fl"];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width" />
    <title>Documentos</title>
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
                     
                </div>

                <div class="col-3">
                    <nav class="navbar">
                        
                        <button id="btn_logout" onclick="<?php echo "location = 'cerrando.php?user1=$correo_comp'"; ?>" style="box-shadow: 3px 3px rgb(12, 13, 97);cursor: pointer;"><b> Cerrar sesión</b>    
                        </button>
                        
                        
                    </nav>
                </div>

                
            </nav> 

        <div class="row">

                <div align="center" class="col-4" style="padding-top:20px;">
                    <img alt="Image html" width="80%" src="img/colacteos.jpeg"/>
                </div>
                
                <div class="col-7 order-last" align="center" style="padding-top:20px;">
            
                    <div class="container" style="background-color: rgb(248, 243, 241);">  

                            <div id="ventana3" class='alert alert-success' role='alert'>
                                
                                        <div>
                                            <h5 class="modal-title" style="color:blue;">Tu foto: </h5>
                                        </div>
                                        <div>
                                        <br>
                                        <?php   
                                            
                                            $identif = $_POST['ident'];
                                            $url = $_POST['link'];

                                          $tamanoArchivo = $_FILES['imagen']['size'];
                                          $imagenSubida = fopen($_FILES['imagen']['tmp_name'],'r+');
                                          $binariosImagen = fread($imagenSubida,$tamanoArchivo);

                                          $tipoArc = $_FILES['imagen']['type'];
                                          $bd_prop0 = mysqli_connect("localhost","id19471830_localhost","nrSd9|/<o4}xfl8e","id19471830_registro");

                                          $sql_prop0 = "SELECT nombres from persona_aux where nombres like '$correo_comp'";
                                          $resultt_prop0 = mysqli_query($bd_prop0, $sql_prop0); 
                                          $mostrar00=mysqli_fetch_array($resultt_prop0); 
                                          $correo00 = "".$mostrar00['nombres'];

                                          mysqli_close($bd_prop0); 
        
                                          $bd_experiencia = mysqli_connect("localhost","id19471830_localhost","nrSd9|/<o4}xfl8e","id19471830_registro"); 
                                        
                                          $binariosImagen= mysqli_escape_string($bd_experiencia, $binariosImagen);

                                          $sql_prop000 = "SELECT nombres from persona where nombres like '$correo00'";
                                          $resultt_prop000 = mysqli_query($bd_experiencia, $sql_prop000); 
                                          
                                          if(!$resultt_prop000)
                                          {
                                            echo "<div class='alert alert-danger' role='alert'>No encontrado</div>";
                                          }
                                          else{
                                            
                                            $sqll0 = "update persona set imagen = '".$binariosImagen."' where nombres like '$correo00'";
                                            $resultt0 = mysqli_query($bd_experiencia, $sqll0); 
                                         
                                            $sqll0_1 = "update persona set identificacion = '".$identif."' where nombres like '$correo00'";
                                            $resultt0_1 = mysqli_query($bd_experiencia, $sqll0_1); 

                                            $sqll0_2 = "update persona set url = '".$url."' where nombres like '$correo00'";
                                            $resultt0_1 = mysqli_query($bd_experiencia, $sqll0_2); 

                                            $sql_prop0001 = "SELECT imagen from persona where nombres like '$correo00'";
                                            $resultt_prop0001 = mysqli_query($bd_experiencia, $sql_prop0001); 
                                            $mostrar00001=mysqli_fetch_assoc($resultt_prop0001); 

                                            echo '<img src="data:'.$tipoArc.';base64,'.base64_encode($mostrar00001["imagen"]).'"/>';
                                            echo "<div class='alert alert-danger' role='alert'>Foto almacenada</div>";
                                          }
                                                    
                                          mysqli_close($bd_experiencia);
                                          
                                        ?>
                                        
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" onclick="<?php echo "location = 'web_proveedor.php?user1=$correo_comp'"; ?>" class="btn btn-default" data-dismiss="modal"  style="box-shadow: 4px 4px rgb(12, 13, 97); color:black;font-family:Roboto;"><b>Regresar</b></button>
                                        </div>       
                                   
                            </div>
                                                                    
                    </div>

                </div>              

        </div>
    
        <br><br><br>
        <br><br><br>
        <br><br><br>      
    </div>
    
    <script language="JavaScript" type="text/javascript" src="ajax.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>

</html>